<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter ou Modifier une Offre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-100">

    <!-- Navbar -->
<!-- Navbar -->
<nav class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('offres.index') }}" class="text-xl font-bold">Bienvenue recruteur</a>
        <div class="flex items-center">
            <!-- Vérifier si l'utilisateur est connecté avant d'afficher son nom -->
            @auth
                <span class="mr-4">{{ auth()->user()->name }}</span>
            @endauth

            <!-- Bouton de déconnexion -->
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 px-4 py-2 rounded hover:bg-red-700">
                        Se déconnecter
                    </button>
                </form>
            @endauth

            <!-- Si non authentifié, afficher "Invité" et proposer de se connecter -->
            @guest
                <a href="{{ route('login') }}" class="text-white px-4 py-2 rounded hover:bg-gray-700">Se déconnecter</a>
            @endguest
        </div>
    </div>
</nav>


    <!-- Message de succès -->
    @if(session('success'))
        <div class="p-4 mb-6 bg-green-500 text-white text-center rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire d'ajout ou de modification de l'offre -->
    <div class="w-4/5 max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex flex-col p-10 mt-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Ajouter ou Modifier une Offre</h2>

        <!-- Formulaire -->
        <form action="{{ route('store') }}" method="POST">
                @csrf

            <!-- Nom de l'entreprise -->
            <div class="mb-4">
                <label for="entreprise" class="block text-gray-700">Nom de l'entreprise</label>
                <input type="text" id="entreprise" name="entreprise" value="{{ old('entreprise', $offre->entreprise ?? '') }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Nom de l'entreprise" required>
            </div>

            <!-- Type de contrat -->
            <div class="mb-4">
                <label for="contrat" class="block text-gray-700">Type de contrat</label>
                <input type="text" id="contrat" name="contrat" value="{{ old('contrat', $offre->contrat ?? '') }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Type de contrat" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Description de l'offre" required>{{ old('description', $offre->description ?? '') }}</textarea>
            </div>

            <!-- Date limite -->
            <div class="mb-4">
                <label for="date_limit" class="block text-gray-700">Date limite</label>
                <input type="date" id="date_limit" name="date_limit" value="{{ old('date_limit', $offre->date_limit ?? '') }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">Ajouter l'offre</button>
        </form>

        <!-- Lien retour vers la liste des offres -->
        <p class="text-gray-600 text-center mt-4">
            <a href="{{ route('offres.index') }}" class="text-blue-600 font-semibold">Retour à la liste des offres</a>
        </p>
    </div>

</body>
</html>
