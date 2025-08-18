<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobConnect - Plateforme d'emploi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .transition-slow {
            transition: all 0.3s ease;
        }
        .filter-section {
            scrollbar-width: thin;
            scrollbar-color: #e2e8f0 #f8fafc;
        }
        .filter-section::-webkit-scrollbar {
            width: 6px;
        }
        .filter-section::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        .filter-section::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 20px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-briefcase text-indigo-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-900">JobConnect</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Accueil
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Offres
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Entreprises
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Blog
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Notifications</span>
                        <i class="fas fa-bell h-6 w-6"></i>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Ouvrir le menu utilisateur</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Votre profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Paramètres</a>
                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Se déconnecter</a> --}}
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Se déconnecter</button>
                                </form>
                            @endauth
                        </div>
                    </div>

                    <button class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Publier une offre
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Ouvrir le menu principal</span>
                        <i class="fas fa-bars h-6 w-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Offres</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Entreprises</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Blog</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">Tom Cook</div>
                        <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                    </div>
                    <button class="ml-auto bg-white flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Notifications</span>
                        <i class="fas fa-bell h-6 w-6"></i>
                    </button>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Votre profil</a>
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Paramètres</a>
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Se déconnecter</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="gradient-bg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Trouvez le job de vos rêves
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-indigo-100">
                    Des milliers d'offres d'emploi dans tous les secteurs. Postulez dès maintenant ou publiez votre offre si vous êtes recruteur.
                </p>
                <div class="mt-10 sm:flex sm:justify-center">
                    <div class="rounded-md shadow">
                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Chercher un emploi
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 md:py-4 md:text-lg md:px-10">
                            Publier une offre
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="lg:flex lg:space-x-8">
            <!-- Filters Section -->
            <div class="lg:w-1/4 mb-8 lg:mb-0">
                <div class="bg-white p-6 rounded-lg shadow-sm sticky top-6 filter-section overflow-y-auto" style="max-height: calc(100vh - 100px);">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Filtres</h3>

                    <!-- Search -->
                    <div class="mb-6">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Recherche</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Mots-clés, compétences">
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="mb-6">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Localisation</label>
                        <select id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option selected>Toutes les localisations</option>
                            <option>Paris</option>
                            <option>Lyon</option>
                            <option>Marseille</option>
                            <option>Toulouse</option>
                            <option>Lille</option>
                            <option>Remote</option>
                        </select>
                    </div>

                    <!-- Job Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de contrat</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="cdi" name="job_type" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="cdi" class="ml-3 text-sm text-gray-700">CDI</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cdd" name="job_type" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="cdd" class="ml-3 text-sm text-gray-700">CDD</label>
                            </div>
                            <div class="flex items-center">
                                <input id="stage" name="job_type" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="stage" class="ml-3 text-sm text-gray-700">Stage</label>
                            </div>
                            <div class="flex items-center">
                                <input id="alternance" name="job_type" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="alternance" class="ml-3 text-sm text-gray-700">Alternance</label>
                            </div>
                            <div class="flex items-center">
                                <input id="freelance" name="job_type" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="freelance" class="ml-3 text-sm text-gray-700">Freelance</label>
                            </div>
                        </div>
                    </div>

                    <!-- Salary Range -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Salaire annuel (€)</label>
                        <div class="mt-2">
                            <input type="range" min="25000" max="120000" step="5000" value="50000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>25k</span>
                                <span>120k</span>
                            </div>
                        </div>
                    </div>

                    <!-- Experience Level -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Niveau d'expérience</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="junior" name="experience" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="junior" class="ml-3 text-sm text-gray-700">Junior (0-2 ans)</label>
                            </div>
                            <div class="flex items-center">
                                <input id="mid" name="experience" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="mid" class="ml-3 text-sm text-gray-700">Intermédiaire (3-5 ans)</label>
                            </div>
                            <div class="flex items-center">
                                <input id="senior" name="experience" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="senior" class="ml-3 text-sm text-gray-700">Senior (5+ ans)</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Appliquer les filtres
                    </button>
                </div>
            </div>

            <!-- Jobs List -->
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Dernières offres d'emploi</h2>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-2">Trier par :</span>
                        <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option>Pertinence</option>
                            <option>Date de publication</option>
                            <option>Salaire (croissant)</option>
                            <option>Salaire (décroissant)</option>
                        </select>
                    </div>
                </div>

                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        <!-- Job Listing 1 -->
                        <li>
                            <div class="px-4 py-4 sm:px-6 job-card transition-slow hover:shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="https://logo.clearbit.com/google.com" alt="Google">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-indigo-600">Google</div>
                                            <h3 class="text-lg font-semibold text-gray-900">Développeur Full Stack</h3>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            CDI
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1.5 h-4 w-4 text-gray-400"></i>
                                            Paris (Remote possible)
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-briefcase mr-1.5 h-4 w-4 text-gray-400"></i>
                                            3-5 ans d'expérience
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-clock mr-1.5 h-4 w-4 text-gray-400"></i>
                                        <p>
                                            Publié le <time datetime="2023-05-15">15 mai 2023</time>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-between items-center">
                                    <p class="text-sm font-medium text-gray-900">
                                        <span class="text-gray-500">Salaire:</span>
                                        €60k - €80k
                                    </p>
                                    <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Postuler
                                    </button>
                                </div>
                            </div>
                        </li>

                        <!-- Job Listing 2 -->
                        <li>
                            <div class="px-4 py-4 sm:px-6 job-card transition-slow hover:shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="https://logo.clearbit.com/amazon.com" alt="Amazon">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-indigo-600">Amazon</div>
                                            <h3 class="text-lg font-semibold text-gray-900">Data Scientist</h3>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            CDD
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1.5 h-4 w-4 text-gray-400"></i>
                                            Lyon
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-briefcase mr-1.5 h-4 w-4 text-gray-400"></i>
                                            5+ ans d'expérience
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-clock mr-1.5 h-4 w-4 text-gray-400"></i>
                                        <p>
                                            Publié le <time datetime="2023-05-10">10 mai 2023</time>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-between items-center">
                                    <p class="text-sm font-medium text-gray-900">
                                        <span class="text-gray-500">Salaire:</span>
                                        €70k - €90k
                                    </p>
                                    <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Postuler
                                    </button>
                                </div>
                            </div>
                        </li>

                        <!-- Job Listing 3 -->
                        <li>
                            <div class="px-4 py-4 sm:px-6 job-card transition-slow hover:shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="https://logo.clearbit.com/startup.com" alt="Startup">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-indigo-600">TechStart</div>
                                            <h3 class="text-lg font-semibold text-gray-900">UX/UI Designer</h3>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                            Alternance
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1.5 h-4 w-4 text-gray-400"></i>
                                            Marseille
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-briefcase mr-1.5 h-4 w-4 text-gray-400"></i>
                                            0-2 ans d'expérience
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-clock mr-1.5 h-4 w-4 text-gray-400"></i>
                                        <p>
                                            Publié le <time datetime="2023-05-05">5 mai 2023</time>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-between items-center">
                                    <p class="text-sm font-medium text-gray-900">
                                        <span class="text-gray-500">Salaire:</span>
                                        €30k - €40k
                                    </p>
                                    <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Postuler
                                    </button>
                                </div>
                            </div>
                        </li>

                        <!-- Job Listing 4 -->
                        <li>
                            <div class="px-4 py-4 sm:px-6 job-card transition-slow hover:shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="https://logo.clearbit.com/microsoft.com" alt="Microsoft">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-indigo-600">Microsoft</div>
                                            <h3 class="text-lg font-semibold text-gray-900">Ingénieur DevOps</h3>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            CDI
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1.5 h-4 w-4 text-gray-400"></i>
                                            Toulouse (Remote possible)
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-briefcase mr-1.5 h-4 w-4 text-gray-400"></i>
                                            5+ ans d'expérience
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-clock mr-1.5 h-4 w-4 text-gray-400"></i>
                                        <p>
                                            Publié le <time datetime="2023-04-28">28 avril 2023</time>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-between items-center">
                                    <p class="text-sm font-medium text-gray-900">
                                        <span class="text-gray-500">Salaire:</span>
                                        €80k - €100k
                                    </p>
                                    <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Postuler
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Pagination -->
                <nav class="mt-8 flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
                    <div class="-mt-px flex w-0 flex-1">
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            <i class="fas fa-arrow-left mr-3 h-5 w-5 text-gray-400"></i>
                            Précédent
                        </a>
                    </div>
                    <div class="hidden md:-mt-px md:flex">
                        <a href="#" class="inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600">1</a>
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">2</a>
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">3</a>
                        <span class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span>
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">8</a>
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">9</a>
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">10</a>
                    </div>
                    <div class="-mt-px flex w-0 flex-1 justify-end">
                        <a href="#" class="inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Suivant
                            <i class="fas fa-arrow-right ml-3 h-5 w-5 text-gray-400"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Recruiter Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Vous êtes recruteur ?
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">
                        Publiez vos offres d'emploi et trouvez les meilleurs talents pour votre entreprise. Notre plateforme vous permet de gérer facilement vos candidatures et de suivre votre processus de recrutement.
                    </p>
                    <div class="mt-8 sm:flex">
                        <div class="rounded-md shadow">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Publier une offre
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Formulaire de publication d'offre</h3>
                        <form class="space-y-4">
                            <div>
                                <label for="job-title" class="block text-sm font-medium text-gray-700">Titre du poste</label>
                                <input type="text" id="job-title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Entreprise</label>
                                <input type="text" id="company" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Localisation</label>
                                <input type="text" id="location" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="job-type" class="block text-sm font-medium text-gray-700">Type de contrat</label>
                                <select id="job-type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>CDI</option>
                                    <option>CDD</option>
                                    <option>Stage</option>
                                    <option>Alternance</option>
                                    <option>Freelance</option>
                                </select>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description du poste</label>
                                <textarea id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Publier l'offre
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Témoignages</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Ce que nos utilisateurs disent
            </p>
        </div>
        <div class="mt-10">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Sophie Martin</div>
                            <div class="text-sm text-gray-500">Développeuse Frontend chez TechCorp</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600 italic">"J'ai trouvé mon emploi actuel sur JobConnect en moins d'une semaine ! La plateforme est intuitive et les offres sont de qualité."</p>
                    </div>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Pierre Dubois</div>
                            <div class="text-sm text-gray-500">Responsable RH chez Innovatech</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600 italic">"En tant que recruteur, JobConnect m'a permis de trouver des profils qualifiés rapidement. L'interface de gestion des candidatures est très complète."</p>
                    </div>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Thomas Leroy</div>
                            <div class="text-sm text-gray-500">Data Scientist</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600 italic">"Les filtres avancés m'ont permis de trouver exactement le type d'emploi que je recherchais. J'ai reçu plusieurs propositions intéressantes."</p>
                    </div>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center">
            <div class="lg:w-0 lg:flex-1">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Restez informé
                </h2>
                <p class="mt-3 max-w-3xl text-lg leading-6 text-indigo-200">
                    Recevez les dernières offres d'emploi directement dans votre boîte mail.
                </p>
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-8">
                <form class="sm:flex">
                    <label for="email-address" class="sr-only">Adresse email</label>
                    <input id="email-address" name="email-address" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white focus:border-white sm:max-w-xs rounded-md" placeholder="Votre email">
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white">
                            S'abonner
                        </button>
                    </div>
                </form>
                <p class="mt-3 text-sm text-indigo-200">
                    Nous respectons votre vie privée. Vous pouvez vous désabonner à tout moment.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Accueil
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Offres
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Entreprises
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Blog
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        À propos
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Contact
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Confidentialité
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                        Conditions
                    </a>
                </div>
            </nav>
            <div class="mt-8 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <i class="fab fa-facebook-f h-6 w-6"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <i class="fab fa-twitter h-6 w-6"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">LinkedIn</span>
                    <i class="fab fa-linkedin-in h-6 w-6"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <i class="fab fa-instagram h-6 w-6"></i>
                </a>
            </div>
            <p class="mt-8 text-center text-base text-gray-400">
                &copy; 2023 JobConnect. Tous droits réservés.
            </p>
        </div>
    </footer>

    <!-- Alpine JS for dropdown -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('button[aria-controls="mobile-menu"]');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                mobileMenu.style.display = expanded ? 'none' : 'block';
            });

            // Job card hover effect
            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('transform', 'transition-slow');
                });
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('transform');
                });
            });

            // Apply button click
            const applyButtons = document.querySelectorAll('button:contains("Postuler")');
            applyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    alert('Fonctionnalité de postulation à implémenter avec Laravel/Livewire');
                });
            });
        });
    </script>
</body>
</html>
