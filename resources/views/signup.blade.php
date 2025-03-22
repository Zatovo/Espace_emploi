<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Espace Emploi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="w-4/5 max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">
        <!-- Section gauche : Image + Slogan -->
        <div class="w-1/2 bg-white text-gray-700 flex flex-col items-center justify-center p-10">
            <h2 class="text-3xl font-bold mb-4 text-center">Rejoignez-nous dès aujourd'hui !</h2>
            <p class="text-lg text-center">Que vous soyez un candidat ou un recruteur, trouvez votre opportunité idéale.</p>
            <img src="{{ asset('images/recrute.png') }}" alt="Image emploi" class="mt-6 rounded-lg">
        </div>

        <!-- Section droite : Formulaire d'inscription -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-semibold text-center mb-6">Créer un compte</h2>
            <form action="#" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700">Nom</label>
                    <input type="text" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre nom">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Prénom</label>
                    <input type="text" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre prénom">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Mot de passe</label>
                    <input type="password" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre mot de passe">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Téléphone</label>
                    <input type="tel" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre téléphone">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Vous êtes :</label>
                    <select class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300">
                        <option value="candidat">Candidat</option>
                        <option value="recruteur">Recruteur</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">S'inscrire</button>
            </form>
            <p class="text-gray-600 text-center mt-4">
                Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Connectez-vous</a>
            </p>
        </div>
    </div>
</body>
</html>
