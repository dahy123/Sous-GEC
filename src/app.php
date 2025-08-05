<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sous-GEC - Gestion d'Épargne Communautaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#064e3b',
                        'primary-light': '#065f46',
                        'primary-dark': '#022c22',
                        'accent': '#10b981',
                        'tahiry': '#10b981',
                        'fivoriana': '#059669',
                        'social': '#34d399'
                    }
                }
            }
        }
    </script>
    <style>
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-primary-dark to-primary min-h-screen">
    <!-- Header -->
    <header class="bg-primary shadow-lg border-b-4 border-accent">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 sm:py-4">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="bg-accent text-white p-1.5 sm:p-2 rounded-lg">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-xl lg:text-2xl font-bold text-white">Sous-GEC</h1>
                        <p class="text-xs sm:text-sm text-green-200">Sous-Groupe d'Épargne Communautaire Étudiant</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs sm:text-sm text-green-200">Connecté en tant que</p>
                        <p class="text-sm font-semibold text-white">Président</p>
                    </div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-accent rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">
                        P
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-primary-light shadow-sm border-b border-accent">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex space-x-2 sm:space-x-4 lg:space-x-8 overflow-x-auto py-2 sm:py-3">
                <button onclick="showSection('dashboard')" class="nav-btn active whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    📊 Tableau de bord
                </button>
                <button onclick="showSection('members')" class="nav-btn whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    👥 Membres
                </button>
                <button onclick="showSection('caisses')" class="nav-btn whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    💳 Caisses
                </button>
                <button onclick="showSection('emprunts')" class="nav-btn whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    💸 Emprunts
                </button>
                <button onclick="showSection('dettes')" class="nav-btn whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    💼 Dettes
                </button>
                <button onclick="showSection('activites')" class="nav-btn whitespace-nowrap px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors">
                    🤝 Activités
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
        
        <!-- Dashboard Section -->
        <div id="dashboard" class="section fade-in">
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">Tableau de bord</h2>
                <p class="text-xs sm:text-sm lg:text-base text-green-200">Vue d'ensemble de votre groupe d'épargne</p>
            </div>

            <!-- Total Summary Card -->
            <div class="bg-gradient-to-r from-primary to-primary-light rounded-xl shadow-lg p-4 sm:p-6 mb-4 sm:mb-6 text-white border border-accent">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm sm:text-base lg:text-lg font-medium text-green-100 mb-1 sm:mb-2">💰 Total Général des Caisses</h3>
                        <p class="text-xl sm:text-2xl lg:text-4xl font-bold mb-1 sm:mb-2">660 000 Ar</p>
                        <p class="text-green-200 text-xs sm:text-sm">Somme de toutes les caisses du groupe</p>
                    </div>
                    <div class="bg-accent bg-opacity-20 p-2 sm:p-4 rounded-full">
                        <svg class="w-8 h-8 sm:w-12 sm:h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 sm:gap-4 mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-accent">
                    <div class="text-center">
                        <p class="text-base sm:text-lg lg:text-2xl font-bold">125 000</p>
                        <p class="text-xs text-green-200">Sociale</p>
                    </div>
                    <div class="text-center">
                        <p class="text-base sm:text-lg lg:text-2xl font-bold">450 000</p>
                        <p class="text-xs text-green-200">Tahiry</p>
                    </div>
                    <div class="text-center">
                        <p class="text-base sm:text-lg lg:text-2xl font-bold">85 000</p>
                        <p class="text-xs text-green-200">Fivoriana</p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">
                <div class="bg-white rounded-xl shadow-md p-3 sm:p-4 lg:p-6 card-hover border-l-4 border-social">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-600">Caisse Sociale</p>
                            <p class="text-sm sm:text-lg lg:text-2xl font-bold text-social">125 000 Ar</p>
                        </div>
                        <div class="bg-social bg-opacity-10 p-2 sm:p-3 rounded-full">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-social" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-3 sm:p-4 lg:p-6 card-hover border-l-4 border-tahiry">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-600">Caisse Tahiry</p>
                            <p class="text-sm sm:text-lg lg:text-2xl font-bold text-tahiry">450 000 Ar</p>
                        </div>
                        <div class="bg-tahiry bg-opacity-10 p-2 sm:p-3 rounded-full">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-tahiry" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-3 sm:p-4 lg:p-6 card-hover border-l-4 border-fivoriana">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-600">Caisse Fivoriana</p>
                            <p class="text-sm sm:text-lg lg:text-2xl font-bold text-fivoriana">85 000 Ar</p>
                        </div>
                        <div class="bg-fivoriana bg-opacity-10 p-2 sm:p-3 rounded-full">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-fivoriana" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-3 sm:p-4 lg:p-6 card-hover border-l-4 border-accent">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-600">Membres Actifs</p>
                            <p class="text-sm sm:text-lg lg:text-2xl font-bold text-primary">25</p>
                        </div>
                        <div class="bg-accent bg-opacity-10 p-2 sm:p-3 rounded-full">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Activités Récentes</h3>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-center space-x-2 sm:space-x-3 p-2 sm:p-3 bg-gray-50 rounded-lg">
                            <div class="w-2 h-2 bg-tahiry rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-xs sm:text-sm font-medium text-gray-900">Cotisation Tahiry - Rakoto</p>
                                <p class="text-xs text-gray-600">Il y a 2 heures</p>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-tahiry">+3 000 Ar</span>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 p-2 sm:p-3 bg-gray-50 rounded-lg">
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-xs sm:text-sm font-medium text-gray-900">Emprunt approuvé - Rabe</p>
                                <p class="text-xs text-gray-600">Il y a 5 heures</p>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-red-600">-15 000 Ar</span>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 p-2 sm:p-3 bg-gray-50 rounded-lg">
                            <div class="w-2 h-2 bg-fivoriana rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-xs sm:text-sm font-medium text-gray-900">Activité collective - Vente</p>
                                <p class="text-xs text-gray-600">Hier</p>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-fivoriana">+25 000 Ar</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Alertes</h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex items-center space-x-2 sm:space-x-3 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
                            </svg>
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-red-800">3 membres en retard de cotisation</p>
                                <p class="text-xs text-red-600">Action requise</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 p-2 sm:p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                            </svg>
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-yellow-800">Réunion prévue demain</p>
                                <p class="text-xs text-yellow-600">14h00 - Salle habituelle</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Members Section -->
        <div id="members" class="section hidden">
            <div class="mb-4 sm:mb-6 lg:mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">Gestion des Membres</h2>
                    <p class="text-xs sm:text-sm lg:text-base text-green-200">Gérez les informations des membres du groupe</p>
                </div>
                <button onclick="openAddMemberModal()" class="bg-accent hover:bg-green-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors">
                    + Ajouter un membre
                </button>
            </div>

            <div class="bg-primary-light rounded-xl shadow-md overflow-hidden border border-accent">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-accent">
                        <thead class="bg-primary">
                            <tr>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Membre</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">ID</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Statut</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Épargne Totale</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-primary-light divide-y divide-accent">
                            <tr class="hover:bg-primary transition-colors">
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-accent rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">
                                            R
                                        </div>
                                        <div class="ml-3 sm:ml-4">
                                            <div class="text-xs sm:text-sm font-medium text-white">Rakoto Jean</div>
                                            <div class="text-xs text-green-200">rakoto@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-white">SGC-001</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-accent text-white">Actif</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-white">45 000 Ar</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <button class="text-accent hover:text-green-300 mr-2 sm:mr-3">Voir</button>
                                    <button class="text-red-400 hover:text-red-300">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-primary transition-colors">
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-pink-600 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">
                                            R
                                        </div>
                                        <div class="ml-3 sm:ml-4">
                                            <div class="text-xs sm:text-sm font-medium text-white">Rabe Marie</div>
                                            <div class="text-xs text-green-200">rabe@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-white">SGC-002</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-600 text-white">En retard</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-white">32 000 Ar</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <button class="text-accent hover:text-green-300 mr-2 sm:mr-3">Voir</button>
                                    <button class="text-red-400 hover:text-red-300">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Caisses Section -->
        <div id="caisses" class="section hidden">
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Gestion des Caisses</h2>
                <p class="text-sm sm:text-base text-gray-600">Suivi des cotisations et épargnes</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-social">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Caisse Sociale</h3>
                        <div class="bg-social bg-opacity-10 p-2 rounded-full">
                            <svg class="w-5 h-5 text-social" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xl sm:text-2xl font-bold text-social mb-2">125 000 Ar</p>
                    <p class="text-xs sm:text-sm text-gray-600 mb-4">500 Ar/semaine obligatoire</p>
                    <button onclick="openContributionModal('sociale')" class="w-full bg-social hover:bg-yellow-600 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                        Enregistrer cotisation
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-tahiry">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Caisse Tahiry</h3>
                        <div class="bg-tahiry bg-opacity-10 p-2 rounded-full">
                            <svg class="w-5 h-5 text-tahiry" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-tahiry mb-2">450 000 Ar</p>
                    <p class="text-sm text-gray-600 mb-4">1 000 - 5 000 Ar/semaine</p>
                    <button onclick="openContributionModal('tahiry')" class="w-full bg-tahiry hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                        Enregistrer épargne
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-fivoriana">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Caisse Fivoriana</h3>
                        <div class="bg-fivoriana bg-opacity-10 p-2 rounded-full">
                            <svg class="w-5 h-5 text-fivoriana" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-fivoriana mb-2">85 000 Ar</p>
                    <p class="text-sm text-gray-600 mb-4">1 000 Ar/mois développement</p>
                    <button onclick="openContributionModal('fivoriana')" class="w-full bg-fivoriana hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                        Enregistrer cotisation
                    </button>
                </div>
            </div>
        </div>

        <!-- Emprunts Section -->
        <div id="emprunts" class="section hidden">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Gestion des Emprunts</h2>
                    <p class="text-sm sm:text-base text-gray-600">Suivi des prêts et remboursements</p>
                </div>
                <button onclick="openLoanModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    + Nouveau prêt
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Simulateur d'Emprunt</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Montant souhaité</label>
                            <input type="number" id="loanAmount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 50000">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Durée (mois)</label>
                            <select id="loanDuration" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="1">1 mois</option>
                                <option value="2">2 mois</option>
                                <option value="3">3 mois</option>
                            </select>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-600">Intérêt mensuel: <span class="font-semibold">10%</span></p>
                            <p class="text-sm text-gray-600">Montant à rembourser: <span id="totalRepayment" class="font-semibold text-indigo-600">-</span></p>
                        </div>
                        <button onclick="calculateLoan()" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Calculer
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Emprunts en Cours</h3>
                    <div class="space-y-3">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-medium text-gray-900">Rakoto Jean</p>
                                    <p class="text-sm text-gray-600">Emprunté le 15/11/2024</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En cours</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-600">Montant initial</p>
                                    <p class="font-semibold">50 000 Ar</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Reste à payer</p>
                                    <p class="font-semibold text-red-600">35 000 Ar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dettes Section -->
        <div id="dettes" class="section hidden">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Gestion des Dettes</h2>
                    <p class="text-sm sm:text-base text-gray-600">Suivi des dettes et pénalités</p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="openAbsenceModal()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        + Enregistrer absence
                    </button>
                    <button onclick="openDetteModal()" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        + Nouvelle dette
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Absences -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Absences Récentes</h3>
                    <div class="space-y-3">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-medium text-gray-900">Rabe Marie</p>
                                    <p class="text-sm text-gray-600">Réunion du 20/11/2024</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Non justifiée</span>
                            </div>
                            <p class="text-sm text-gray-600">Motif: Maladie</p>
                        </div>
                    </div>
                </div>

                <!-- Dettes -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Dettes en Cours</h3>
                    <div class="space-y-3">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-medium text-gray-900">Rabe Marie</p>
                                    <p class="text-sm text-gray-600">Origine: Absence</p>
                                </div>
                                <span class="text-lg font-bold text-red-600">2 000 Ar</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-600">Date: 20/11/2024</p>
                                <button class="text-green-600 hover:text-green-900 text-sm font-medium">Marquer payé</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-primary-light rounded-xl shadow-md overflow-hidden border border-accent">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-accent">
                        <thead class="bg-primary">
                            <tr>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Membre</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Origine</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Montant</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Date</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Statut</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-green-200 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-primary-light divide-y divide-accent">
                            <tr class="hover:bg-primary transition-colors">
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="text-xs sm:text-sm font-medium text-white">Rabe Marie</div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-600 text-white">Absence</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-white">2 000 Ar</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-green-200">20/11/2024</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-600 text-white">Non remboursée</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <button class="text-accent hover:text-green-300">Marquer payé</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Activités Section -->
        <div id="activites" class="section hidden">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Activités Collectives</h2>
                    <p class="text-sm sm:text-base text-gray-600">Gestion des activités génératrices de revenus</p>
                </div>
                <button onclick="openActivityModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    + Nouvelle activité
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Enregistrer une Activité</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'activité</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: Vente de gâteaux">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Revenus générés</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Montant en Ar">
                        </div>
                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer l'activité
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Historique des Activités</h3>
                    <div class="space-y-3">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-medium text-gray-900">Vente de pâtisseries</p>
                                    <p class="text-sm text-gray-600">15/11/2024</p>
                                </div>
                                <span class="text-lg font-bold text-green-600">+25 000 Ar</span>
                            </div>
                            <p class="text-sm text-gray-600">Revenus ajoutés à la Caisse Tahiry</p>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-medium text-gray-900">Vente de boissons</p>
                                    <p class="text-sm text-gray-600">08/11/2024</p>
                                </div>
                                <span class="text-lg font-bold text-green-600">+18 000 Ar</span>
                            </div>
                            <p class="text-sm text-gray-600">Revenus ajoutés à la Caisse Tahiry</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <div id="modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modal-title" class="text-lg font-semibold text-gray-900">Modal Title</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="modal-content">
                    <!-- Modal content will be inserted here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation functionality
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById(sectionId).classList.add('fade-in');
            
            // Update navigation buttons
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-accent', 'text-white');
                btn.classList.add('text-green-200', 'hover:text-white');
            });
            
            event.target.classList.add('active', 'bg-accent', 'text-white');
            event.target.classList.remove('text-green-200', 'hover:text-white');
        }

        // Loan calculator
        function calculateLoan() {
            const amount = parseFloat(document.getElementById('loanAmount').value);
            const duration = parseInt(document.getElementById('loanDuration').value);
            
            if (amount && duration) {
                const interest = amount * 0.1 * duration;
                const total = amount + interest;
                document.getElementById('totalRepayment').textContent = total.toLocaleString() + ' Ar';
            }
        }

        // Modal functions
        function openAddMemberModal() {
            document.getElementById('modal-title').textContent = 'Ajouter un nouveau membre';
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                        <input type="text" id="member-nom" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: Rakoto" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prénom *</label>
                        <input type="text" id="member-prenom" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: Jean" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact *</label>
                        <input type="text" id="member-contact" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Téléphone ou email" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date d'inscription *</label>
                        <input type="date" id="member-date-inscription" value="${new Date().toISOString().split('T')[0]}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                        <select id="member-actif" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="true">Actif</option>
                            <option value="false">Inactif</option>
                        </select>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <p class="text-xs text-blue-600">L'ID membre sera généré automatiquement lors de l'enregistrement</p>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="addMember()" class="flex-1 bg-accent hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Ajouter
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function openLoanModal() {
            document.getElementById('modal-title').textContent = 'Nouveau Emprunt';
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Membre *</label>
                        <select id="emprunt-id-membre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner un membre</option>
                            <option value="1">Rakoto Jean (ID: 1)</option>
                            <option value="2">Rabe Marie (ID: 2)</option>
                            <option value="3">Andry Paul (ID: 3)</option>
                            <option value="4">Hery Sophie (ID: 4)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Montant emprunté (Ar) *</label>
                        <input type="number" id="emprunt-montant" min="1000" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Montant en Ar" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Taux d'intérêt (%) *</label>
                        <input type="number" id="emprunt-taux" value="10" min="0" max="100" step="0.1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date d'emprunt *</label>
                        <input type="date" id="emprunt-date" value="${new Date().toISOString().split('T')[0]}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date limite de remboursement *</label>
                        <input type="date" id="emprunt-date-limite" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                        <select id="emprunt-statut" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="En cours">En cours</option>
                            <option value="Remboursé">Remboursé</option>
                            <option value="Annulé">Annulé</option>
                            <option value="En retard">En retard</option>
                        </select>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <p class="text-xs text-blue-600">L'ID emprunt sera généré automatiquement lors de l'enregistrement</p>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="saveEmprunt()" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer Emprunt
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function openContributionModal(caisseType) {
            let title, placeholder, minAmount, maxAmount, bgColor, textColor, caisseId;
            
            switch(caisseType) {
                case 'sociale':
                    title = 'Enregistrer Épargne - Caisse Sociale';
                    placeholder = '500';
                    minAmount = 500;
                    maxAmount = 500;
                    bgColor = 'bg-yellow-500';
                    textColor = 'text-yellow-600';
                    caisseId = 1;
                    break;
                case 'tahiry':
                    title = 'Enregistrer Épargne - Caisse Tahiry';
                    placeholder = 'Entre 1 000 et 5 000';
                    minAmount = 1000;
                    maxAmount = 5000;
                    bgColor = 'bg-green-500';
                    textColor = 'text-green-600';
                    caisseId = 2;
                    break;
                case 'fivoriana':
                    title = 'Enregistrer Épargne - Caisse Fivoriana';
                    placeholder = '1 000';
                    minAmount = 1000;
                    maxAmount = 1000;
                    bgColor = 'bg-blue-500';
                    textColor = 'text-blue-600';
                    caisseId = 3;
                    break;
            }
            
            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Membre *</label>
                        <select id="epargne-id-membre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner un membre</option>
                            <option value="1">Rakoto Jean (ID: 1)</option>
                            <option value="2">Rabe Marie (ID: 2)</option>
                            <option value="3">Andry Paul (ID: 3)</option>
                            <option value="4">Hery Sophie (ID: 4)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Montant (Ar) *</label>
                        <input type="number" id="epargne-montant" min="${minAmount}" max="${maxAmount}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               placeholder="${placeholder}" required>
                        <p class="text-xs ${textColor} mt-1">
                            ${caisseType === 'tahiry' ? 'Montant entre ' + minAmount.toLocaleString() + ' et ' + maxAmount.toLocaleString() + ' Ar' : 
                              'Montant fixe: ' + minAmount.toLocaleString() + ' Ar'}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date d'épargne *</label>
                        <input type="date" id="epargne-date" value="${new Date().toISOString().split('T')[0]}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">ID Caisse:</span>
                            <span class="font-semibold ${textColor}">${caisseId}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm mt-2">
                            <span class="text-gray-600">Type de caisse:</span>
                            <span class="font-semibold ${textColor} capitalize">${caisseType}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm mt-2">
                            <span class="text-gray-600">Timestamp:</span>
                            <span class="text-xs text-gray-500">Généré automatiquement</span>
                        </div>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="saveEpargne('${caisseType}', ${caisseId})" class="flex-1 ${bgColor} hover:opacity-90 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer Épargne
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function openActivityModal() {
            document.getElementById('modal-title').textContent = 'Nouvelle Activité Collective';
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'activité *</label>
                        <input type="text" id="activite-nom" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: Vente de gâteaux" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea id="activite-description" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" rows="3" placeholder="Détails ou but de l'activité..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Montant gagné (Ar) *</label>
                        <input type="number" id="activite-montant-gagne" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Gain ajouté à la caisse" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date de l'activité *</label>
                        <input type="date" id="activite-date" value="${new Date().toISOString().split('T')[0]}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Caisse bénéficiaire *</label>
                        <select id="activite-id-caisse" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner une caisse</option>
                            <option value="1">Caisse Sociale (ID: 1)</option>
                            <option value="2">Caisse Tahiry (ID: 2)</option>
                            <option value="3">Caisse Fivoriana (ID: 3)</option>
                        </select>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg">
                        <p class="text-xs text-green-600">L'ID activité sera généré automatiquement lors de l'enregistrement</p>
                        <p class="text-xs text-green-600 mt-1">Les gains seront ajoutés au solde de la caisse sélectionnée</p>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="saveActivite()" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer Activité
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal-overlay').classList.add('hidden');
        }

        function addMember() {
            const nom = document.getElementById('member-nom').value;
            const prenom = document.getElementById('member-prenom').value;
            const contact = document.getElementById('member-contact').value;
            const dateInscription = document.getElementById('member-date-inscription').value;
            const actif = document.getElementById('member-actif').value;
            
            if (!nom || !prenom || !contact || !dateInscription) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Simulation de sauvegarde avec ID auto-généré
            const newId = Math.floor(Math.random() * 1000) + 1;
            alert(`Membre ajouté avec succès!\n\nID: ${newId}\nNom: ${nom}\nPrénom: ${prenom}\nContact: ${contact}\nDate d'inscription: ${dateInscription}\nStatut: ${actif === 'true' ? 'Actif' : 'Inactif'}`);
            closeModal();
        }

        function saveEmprunt() {
            const idMembre = document.getElementById('emprunt-id-membre').value;
            const montant = document.getElementById('emprunt-montant').value;
            const taux = document.getElementById('emprunt-taux').value;
            const dateEmprunt = document.getElementById('emprunt-date').value;
            const dateLimite = document.getElementById('emprunt-date-limite').value;
            const statut = document.getElementById('emprunt-statut').value;
            
            if (!idMembre || !montant || !taux || !dateEmprunt || !dateLimite) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Simulation de sauvegarde avec ID auto-généré
            const newId = Math.floor(Math.random() * 1000) + 1;
            const memberName = document.getElementById('emprunt-id-membre').selectedOptions[0].text.split(' (')[0];
            alert(`Emprunt enregistré avec succès!\n\nID Emprunt: ${newId}\nMembre: ${memberName}\nMontant: ${parseFloat(montant).toLocaleString()} Ar\nTaux: ${taux}%\nDate: ${dateEmprunt}\nDate limite: ${dateLimite}\nStatut: ${statut}`);
            closeModal();
        }

        function saveEpargne(caisseType, caisseId) {
            const idMembre = document.getElementById('epargne-id-membre').value;
            const montant = document.getElementById('epargne-montant').value;
            const date = document.getElementById('epargne-date').value;
            
            if (!idMembre || !montant || !date) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Validation des montants selon le type de caisse
            const amountNum = parseFloat(montant);
            let isValid = true;
            let errorMsg = '';
            
            switch(caisseType) {
                case 'sociale':
                    if (amountNum !== 500) {
                        isValid = false;
                        errorMsg = 'Le montant pour la caisse sociale doit être exactement 500 Ar';
                    }
                    break;
                case 'tahiry':
                    if (amountNum < 1000 || amountNum > 5000) {
                        isValid = false;
                        errorMsg = 'Le montant pour la caisse Tahiry doit être entre 1 000 et 5 000 Ar';
                    }
                    break;
                case 'fivoriana':
                    if (amountNum !== 1000) {
                        isValid = false;
                        errorMsg = 'Le montant pour la caisse Fivoriana doit être exactement 1 000 Ar';
                    }
                    break;
            }
            
            if (!isValid) {
                alert(errorMsg);
                return;
            }
            
            // Simulation de sauvegarde avec ID et timestamp auto-générés
            const newId = Math.floor(Math.random() * 1000) + 1;
            const timestamp = Date.now();
            const memberName = document.getElementById('epargne-id-membre').selectedOptions[0].text.split(' (')[0];
            alert(`Épargne enregistrée avec succès!\n\nID Épargne: ${newId}\nMembre: ${memberName}\nCaisse: ${caisseType.charAt(0).toUpperCase() + caisseType.slice(1)} (ID: ${caisseId})\nMontant: ${amountNum.toLocaleString()} Ar\nDate: ${date}\nTimestamp: ${timestamp}`);
            closeModal();
        }

        function saveActivite() {
            const nom = document.getElementById('activite-nom').value;
            const description = document.getElementById('activite-description').value;
            const montantGagne = document.getElementById('activite-montant-gagne').value;
            const date = document.getElementById('activite-date').value;
            const idCaisse = document.getElementById('activite-id-caisse').value;
            
            if (!nom || !description || !montantGagne || !date || !idCaisse) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Simulation de sauvegarde avec ID auto-généré
            const newId = Math.floor(Math.random() * 1000) + 1;
            const caisseName = document.getElementById('activite-id-caisse').selectedOptions[0].text.split(' (')[0];
            alert(`Activité enregistrée avec succès!\n\nID Activité: ${newId}\nNom: ${nom}\nDescription: ${description}\nMontant gagné: ${parseFloat(montantGagne).toLocaleString()} Ar\nDate: ${date}\nCaisse bénéficiaire: ${caisseName} (ID: ${idCaisse})`);
            closeModal();
        }

        function openAbsenceModal() {
            document.getElementById('modal-title').textContent = 'Enregistrer une Absence';
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Membre *</label>
                        <select id="absence-id-membre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner un membre</option>
                            <option value="1">Rakoto Jean (ID: 1)</option>
                            <option value="2">Rabe Marie (ID: 2)</option>
                            <option value="3">Andry Paul (ID: 3)</option>
                            <option value="4">Hery Sophie (ID: 4)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date de la réunion *</label>
                        <input type="datetime-local" id="absence-date-reunion" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Motif de l'absence *</label>
                        <textarea id="absence-motif" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" rows="3" placeholder="Raison de l'absence..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Justification</label>
                        <select id="absence-justifie" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="false">Non justifiée</option>
                            <option value="true">Justifiée</option>
                        </select>
                    </div>
                    <div class="bg-red-50 p-3 rounded-lg">
                        <p class="text-xs text-red-600">L'ID absence sera généré automatiquement lors de l'enregistrement</p>
                        <p class="text-xs text-red-600 mt-1">Une dette peut être créée automatiquement selon les règles du groupe</p>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="saveAbsence()" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer Absence
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function openDetteModal() {
            document.getElementById('modal-title').textContent = 'Nouvelle Dette';
            document.getElementById('modal-content').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Membre *</label>
                        <select id="dette-id-membre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner un membre</option>
                            <option value="1">Rakoto Jean (ID: 1)</option>
                            <option value="2">Rabe Marie (ID: 2)</option>
                            <option value="3">Andry Paul (ID: 3)</option>
                            <option value="4">Hery Sophie (ID: 4)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Origine de la dette *</label>
                        <select id="dette-origine" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Sélectionner l'origine</option>
                            <option value="absence">Absence</option>
                            <option value="emprunt">Emprunt</option>
                            <option value="penalite">Pénalité</option>
                            <option value="retard">Retard de cotisation</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Montant (Ar) *</label>
                        <input type="number" id="dette-montant" min="0" step="100" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Montant de la dette" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date de la dette *</label>
                        <input type="date" id="dette-date" value="${new Date().toISOString().split('T')[0]}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statut de remboursement</label>
                        <select id="dette-rembourse" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="false">Non remboursée</option>
                            <option value="true">Remboursée</option>
                        </select>
                    </div>
                    <div class="bg-orange-50 p-3 rounded-lg">
                        <p class="text-xs text-orange-600">L'ID dette sera généré automatiquement lors de l'enregistrement</p>
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button onclick="closeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                            Annuler
                        </button>
                        <button onclick="saveDette()" class="flex-1 bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                            Enregistrer Dette
                        </button>
                    </div>
                </div>
            `;
            document.getElementById('modal-overlay').classList.remove('hidden');
        }

        function saveAbsence() {
            const idMembre = document.getElementById('absence-id-membre').value;
            const dateReunion = document.getElementById('absence-date-reunion').value;
            const motif = document.getElementById('absence-motif').value;
            const justifie = document.getElementById('absence-justifie').value;
            
            if (!idMembre || !dateReunion || !motif) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Simulation de sauvegarde avec ID auto-généré
            const newId = Math.floor(Math.random() * 1000) + 1;
            const memberName = document.getElementById('absence-id-membre').selectedOptions[0].text.split(' (')[0];
            alert(`Absence enregistrée avec succès!\n\nID Absence: ${newId}\nMembre: ${memberName}\nDate réunion: ${dateReunion}\nMotif: ${motif}\nJustifiée: ${justifie === 'true' ? 'Oui' : 'Non'}`);
            closeModal();
        }

        function saveDette() {
            const idMembre = document.getElementById('dette-id-membre').value;
            const origine = document.getElementById('dette-origine').value;
            const montant = document.getElementById('dette-montant').value;
            const date = document.getElementById('dette-date').value;
            const rembourse = document.getElementById('dette-rembourse').value;
            
            if (!idMembre || !origine || !montant || !date) {
                alert('Veuillez remplir tous les champs obligatoires!');
                return;
            }
            
            // Simulation de sauvegarde avec ID auto-généré
            const newId = Math.floor(Math.random() * 1000) + 1;
            const memberName = document.getElementById('dette-id-membre').selectedOptions[0].text.split(' (')[0];
            alert(`Dette enregistrée avec succès!\n\nID Dette: ${newId}\nMembre: ${memberName}\nOrigine: ${origine}\nMontant: ${parseFloat(montant).toLocaleString()} Ar\nDate: ${date}\nRemboursée: ${rembourse === 'true' ? 'Oui' : 'Non'}`);
            closeModal();
        }

        // Initialize navigation
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.nav-btn.active').classList.add('bg-accent', 'text-white');
            document.querySelectorAll('.nav-btn:not(.active)').forEach(btn => {
                btn.classList.add('text-green-200', 'hover:text-white');
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96a4890890ce8a3d',t:'MTc1NDM3ODQ2Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
