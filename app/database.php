<?php
/**
 * Script de gestion de la base de données pour Sous-GEC
 * Création automatique de la BD, des tables et utilisateur par défaut
 */

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'sous_gec_db';
    private $connection = null;
    
    public function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'sous_gec_db') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    
    /**
     * Connexion à MySQL (sans spécifier de base de données)
     */
    private function connectToMySQL() {
        try {
            $pdo = new PDO("mysql:host={$this->host}", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion MySQL: " . $e->getMessage());
        }
    }
    
    /**
     * Connexion à la base de données spécifique
     */
    public function connect() {
        try {
            if ($this->connection === null) {
                $this->connection = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4",
                    $this->username,
                    $this->password
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            return $this->connection;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }
    
    /**
     * Vérifier si la base de données existe
     */
    private function databaseExists() {
        try {
            $pdo = $this->connectToMySQL();
            $stmt = $pdo->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
            $stmt->execute([$this->database]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Créer la base de données
     */
    private function createDatabase() {
        try {
            $pdo = $this->connectToMySQL();
            $sql = "CREATE DATABASE IF NOT EXISTS `{$this->database}` 
                    CHARACTER SET utf8mb4 
                    COLLATE utf8mb4_unicode_ci";
            $pdo->exec($sql);
            echo "Base de données '{$this->database}' créée avec succès.\n";
        } catch (PDOException $e) {
            die("Erreur lors de la création de la base de données: " . $e->getMessage());
        }
    }
    
    /**
     * Créer toutes les tables
     */
    private function createTables() {
        $pdo = $this->connect();
        
        try {
            // Table des utilisateurs (gestionnaires du système)
            $sql = "CREATE TABLE IF NOT EXISTS utilisateurs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL,
                email VARCHAR(150) UNIQUE NOT NULL,
                mot_de_passe VARCHAR(255) NOT NULL,
                role ENUM('president', 'tresorier', 'secretaire', 'membre') DEFAULT 'membre',
                actif BOOLEAN DEFAULT TRUE,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                derniere_connexion TIMESTAMP NULL
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des membres du groupe d'épargne
            $sql = "CREATE TABLE IF NOT EXISTS membres (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL,
                prenom VARCHAR(100) NOT NULL,
                contact VARCHAR(150) NOT NULL,
                date_inscription DATE NOT NULL,
                actif BOOLEAN DEFAULT TRUE,
                epargne_totale DECIMAL(15,2) DEFAULT 0.00,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX idx_nom (nom),
                INDEX idx_actif (actif)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des types de caisses
            $sql = "CREATE TABLE IF NOT EXISTS caisses (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL UNIQUE,
                type ENUM('sociale', 'tahiry', 'fivoriana') NOT NULL,
                montant_fixe DECIMAL(10,2) NULL,
                montant_min DECIMAL(10,2) NULL,
                montant_max DECIMAL(10,2) NULL,
                solde_total DECIMAL(15,2) DEFAULT 0.00,
                description TEXT,
                actif BOOLEAN DEFAULT TRUE,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des épargnes/cotisations
            $sql = "CREATE TABLE IF NOT EXISTS epargnes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_membre INT NOT NULL,
                id_caisse INT NOT NULL,
                montant DECIMAL(10,2) NOT NULL,
                date_epargne DATE NOT NULL,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                note TEXT,
                FOREIGN KEY (id_membre) REFERENCES membres(id) ON DELETE CASCADE,
                FOREIGN KEY (id_caisse) REFERENCES caisses(id) ON DELETE CASCADE,
                INDEX idx_membre (id_membre),
                INDEX idx_caisse (id_caisse),
                INDEX idx_date (date_epargne)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des emprunts
            $sql = "CREATE TABLE IF NOT EXISTS emprunts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_membre INT NOT NULL,
                montant_emprunte DECIMAL(10,2) NOT NULL,
                taux_interet DECIMAL(5,2) NOT NULL,
                date_emprunt DATE NOT NULL,
                date_limite_remboursement DATE NOT NULL,
                montant_total_a_rembourser DECIMAL(10,2) NOT NULL,
                montant_rembourse DECIMAL(10,2) DEFAULT 0.00,
                statut ENUM('en_cours', 'rembourse', 'annule', 'en_retard') DEFAULT 'en_cours',
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (id_membre) REFERENCES membres(id) ON DELETE CASCADE,
                INDEX idx_membre (id_membre),
                INDEX idx_statut (statut),
                INDEX idx_date_limite (date_limite_remboursement)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des absences
            $sql = "CREATE TABLE IF NOT EXISTS absences (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_membre INT NOT NULL,
                date_reunion DATETIME NOT NULL,
                motif TEXT NOT NULL,
                justifie BOOLEAN DEFAULT FALSE,
                penalite_appliquee DECIMAL(8,2) DEFAULT 0.00,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (id_membre) REFERENCES membres(id) ON DELETE CASCADE,
                INDEX idx_membre (id_membre),
                INDEX idx_date_reunion (date_reunion),
                INDEX idx_justifie (justifie)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des dettes
            $sql = "CREATE TABLE IF NOT EXISTS dettes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_membre INT NOT NULL,
                origine ENUM('absence', 'emprunt', 'penalite', 'retard', 'autre') NOT NULL,
                montant DECIMAL(10,2) NOT NULL,
                date_dette DATE NOT NULL,
                rembourse BOOLEAN DEFAULT FALSE,
                date_remboursement DATE NULL,
                id_absence INT NULL,
                id_emprunt INT NULL,
                description TEXT,
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (id_membre) REFERENCES membres(id) ON DELETE CASCADE,
                FOREIGN KEY (id_absence) REFERENCES absences(id) ON DELETE SET NULL,
                FOREIGN KEY (id_emprunt) REFERENCES emprunts(id) ON DELETE SET NULL,
                INDEX idx_membre (id_membre),
                INDEX idx_origine (origine),
                INDEX idx_rembourse (rembourse)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des activités collectives
            $sql = "CREATE TABLE IF NOT EXISTS activites (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(200) NOT NULL,
                description TEXT NOT NULL,
                montant_gagne DECIMAL(10,2) NOT NULL,
                date_activite DATE NOT NULL,
                id_caisse INT NOT NULL,
                participants JSON,
                statut ENUM('planifiee', 'en_cours', 'terminee', 'annulee') DEFAULT 'terminee',
                date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (id_caisse) REFERENCES caisses(id) ON DELETE CASCADE,
                INDEX idx_caisse (id_caisse),
                INDEX idx_date_activite (date_activite),
                INDEX idx_statut (statut)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            // Table des transactions (historique complet)
            $sql = "CREATE TABLE IF NOT EXISTS transactions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                type ENUM('epargne', 'emprunt', 'remboursement', 'activite', 'penalite') NOT NULL,
                id_membre INT NULL,
                id_caisse INT NULL,
                montant DECIMAL(10,2) NOT NULL,
                description TEXT,
                reference_id INT NULL,
                reference_table VARCHAR(50) NULL,
                date_transaction TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (id_membre) REFERENCES membres(id) ON DELETE SET NULL,
                FOREIGN KEY (id_caisse) REFERENCES caisses(id) ON DELETE SET NULL,
                INDEX idx_type (type),
                INDEX idx_membre (id_membre),
                INDEX idx_caisse (id_caisse),
                INDEX idx_date (date_transaction)
            ) ENGINE=InnoDB";
            $pdo->exec($sql);
            
            echo "Toutes les tables ont été créées avec succès.\n";
            
        } catch (PDOException $e) {
            die("Erreur lors de la création des tables: " . $e->getMessage());
        }
    }
    
    /**
     * Insérer les données par défaut
     */
    private function insertDefaultData() {
        $pdo = $this->connect();
        
        try {
            // Vérifier si l'utilisateur par défaut existe déjà
            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
            $stmt->execute(['dahyoldon@gmail.com']);
            
            if ($stmt->rowCount() == 0) {
                // Créer l'utilisateur par défaut
                $hashedPassword = password_hash('12345678', PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)");
                $stmt->execute(['oldon', 'dahyoldon@gmail.com', $hashedPassword, 'president']);
                echo "Utilisateur par défaut créé: oldon (dahyoldon@gmail.com)\n";
            }
            
            // Insérer les types de caisses par défaut
            $caisses = [
                ['Caisse Sociale', 'sociale', 500.00, null, null, 125000.00, 'Cotisation sociale obligatoire de 500 Ar par semaine'],
                ['Caisse Tahiry', 'tahiry', null, 1000.00, 5000.00, 450000.00, 'Épargne libre entre 1000 et 5000 Ar par semaine'],
                ['Caisse Fivoriana', 'fivoriana', 1000.00, null, null, 85000.00, 'Cotisation développement de 1000 Ar par mois']
            ];
            
            foreach ($caisses as $caisse) {
                $stmt = $pdo->prepare("SELECT id FROM caisses WHERE nom = ?");
                $stmt->execute([$caisse[0]]);
                
                if ($stmt->rowCount() == 0) {
                    $stmt = $pdo->prepare("INSERT INTO caisses (nom, type, montant_fixe, montant_min, montant_max, solde_total, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute($caisse);
                }
            }
            echo "Caisses par défaut créées.\n";
            
            // Insérer quelques membres exemples
            $membres = [
                ['Rakoto', 'Jean', 'rakoto@email.com', '2024-01-15'],
                ['Rabe', 'Marie', 'rabe@email.com', '2024-01-20'],
                ['Andry', 'Paul', 'andry@email.com', '2024-02-01'],
                ['Hery', 'Sophie', 'hery@email.com', '2024-02-10']
            ];
            
            foreach ($membres as $membre) {
                $stmt = $pdo->prepare("SELECT id FROM membres WHERE nom = ? AND prenom = ?");
                $stmt->execute([$membre[0], $membre[1]]);
                
                if ($stmt->rowCount() == 0) {
                    $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, contact, date_inscription) VALUES (?, ?, ?, ?)");
                    $stmt->execute($membre);
                }
            }
            echo "Membres exemples créés.\n";
            
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion des données par défaut: " . $e->getMessage());
        }
    }
    
    /**
     * Méthode principale d'initialisation
     */
    public function initialize() {
        echo "=== Initialisation de la base de données Sous-GEC ===\n";
        
        // Vérifier et créer la base de données si nécessaire
        if (!$this->databaseExists()) {
            echo "La base de données n'existe pas. Création en cours...\n";
            $this->createDatabase();
        } else {
            echo "La base de données existe déjà.\n";
        }
        
        // Créer les tables
        echo "Création/vérification des tables...\n";
        $this->createTables();
        
        // Insérer les données par défaut
        echo "Insertion des données par défaut...\n";
        $this->insertDefaultData();
        
        echo "=== Initialisation terminée avec succès ===\n";
    }
    
    /**
     * Méthodes utilitaires pour l'application
     */
    
    // Obtenir tous les membres actifs
    public function getMembresActifs() {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM membres WHERE actif = TRUE ORDER BY nom, prenom");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    // Obtenir toutes les caisses actives
    public function getCaisses() {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM caisses WHERE actif = TRUE ORDER BY id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    // Calculer le total des épargnes d'un membre
    public function calculerEpargneMembre($id_membre) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM epargnes WHERE id_membre = ?");
        $stmt->execute([$id_membre]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }
    
    // Mettre à jour le solde d'une caisse
    public function mettreAJourSoldeCaisse($id_caisse) {
        $pdo = $this->connect();
        
        // Calculer le total des épargnes
        $stmt = $pdo->prepare("SELECT SUM(montant) as total_epargnes FROM epargnes WHERE id_caisse = ?");
        $stmt->execute([$id_caisse]);
        $epargnes = $stmt->fetch()['total_epargnes'] ?? 0;
        
        // Calculer le total des gains d'activités
        $stmt = $pdo->prepare("SELECT SUM(montant_gagne) as total_activites FROM activites WHERE id_caisse = ?");
        $stmt->execute([$id_caisse]);
        $activites = $stmt->fetch()['total_activites'] ?? 0;
        
        // Calculer le total des emprunts en cours (à soustraire)
        $stmt = $pdo->prepare("SELECT SUM(montant_emprunte - montant_rembourse) as total_emprunts FROM emprunts WHERE statut = 'en_cours'");
        $stmt->execute();
        $emprunts = $stmt->fetch()['total_emprunts'] ?? 0;
        
        $nouveau_solde = $epargnes + $activites - $emprunts;
        
        // Mettre à jour le solde
        $stmt = $pdo->prepare("UPDATE caisses SET solde_total = ? WHERE id = ?");
        $stmt->execute([$nouveau_solde, $id_caisse]);
        
        return $nouveau_solde;
    }
    
    // Fermer la connexion
    public function close() {
        $this->connection = null;
    }
}

// Utilisation du script
if (basename($_SERVER['PHP_SELF']) == 'database.php') {
    // Ce code s'exécute seulement si le fichier est appelé directement
    $db = new Database();
    $db->initialize();
}

// Fonction globale pour obtenir une instance de connexion
function getDatabase() {
    static $instance = null;
    if ($instance === null) {
        $instance = new Database();
    }
    return $instance;
}

?>