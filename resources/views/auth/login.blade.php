<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Espace Emploi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="w-4/5 max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">
        <!-- Section gauche : Image + Slogan -->
        <div class="w-1/2 bg-white text-gray-700 flex flex-col items-center justify-center p-10">
            <h2 class="text-3xl font-bold mb-4 text-center">Trouvez l'emploi de vos rêves !</h2>
            <img src="{{ asset('images/istockphoto-1482651280-612x612.jpg') }}" alt="Image emploi" class="mt-6 rounded-lg">
        </div>

        <!-- Section droite : Formulaire de connexion -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-semibold text-center mb-6">Connexion</h2>
            <div id="error-message" class="text-red-600 text-center mb-4 hidden"></div>
            <form action="{{route('login.store')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Mot de passe</label>
                    <input type="password" name="password" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Votre mot de passe" required>
                </div>
                <button id="loginButton" type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">Se connecter</button>
            </form>
            <p class="text-gray-600 text-center mt-4">
                Pas encore inscrit ? <a href='signup' class="text-blue-600 font-semibold">Créer un compte</a>
            </p>
        </div>
    </div>

    {{-- <script>
    document.getElementById("loginForm").addEventListener("submit", async function(event) {
        event.preventDefault();

        let loginButton = document.getElementById("loginButton");
        let errorMessage = document.getElementById("error-message");

        loginButton.disabled = true;
        loginButton.textContent = "Connexion en cours...";
        errorMessage.classList.add("hidden");

        let formData = {
            email: document.querySelector("input[name='email']").value,
            password: document.querySelector("input[name='password']").value
        };

        try {
            let response = await fetch("http://127.0.0.1:8000/api/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            });

            let data = await response.json();

            if (response.ok) {
                localStorage.setItem("auth_token", data.token);
                localStorage.setItem("user_role", data.role);

                alert("Connexion réussie !");

                if (data.role === "recruteur") {
                    window.location.href = '/dashboardRecru';
                } else if (data.role === "candidat") {
                    window.location.href = '/dashboardCan';
                } else {
                    alert("Rôle inconnu. Redirection vers l'accueil.");
                    window.location.href = '/';
                }
            } else {
                errorMessage.textContent = data.message || "Email ou mot de passe incorrect.";
                errorMessage.classList.remove("hidden");
            }
        } catch (error) {
            errorMessage.textContent = "Une erreur est survenue. Veuillez réessayer.";
            errorMessage.classList.remove("hidden");
        }

        loginButton.disabled = false;
        loginButton.textContent = "Se connecter";
    });
    </script> --}}
</body>
</html>
