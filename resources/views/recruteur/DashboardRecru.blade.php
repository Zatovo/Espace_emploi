<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tableau de bord</title>
        <script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
        <link rel="stylesheet" href="{{ asset("css/dashboard.css") }}"/>
        {{-- <link rel="stylesheet" href="static/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="staticcss/add.css"> --}}
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="{{ asset("images/dashboard.png") }}" alt="logo">
                        <h2>Espace emploi</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp" ><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
                    </div>
                </div>
                <div class="sidebar">
                    <a href="recruteur.html"class="active">
                        <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg></span>
                        <h3>Mes publications</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp" ><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg></span>
                        <h3>Publier</h3>
                    </a>
                    {{-- <a href="#">
                        <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></span>
                        <h3>Deconnexion</h3>
                    </a> --}}
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></span>
                                <h3>Deconnexion</h3>
                            </button>
                        </form>
                    @endauth
                </div>
            </aside>
            <main>
                <!--Eto daholo ny publication Recruteur rehetra mipoitraaaaaaaaaaaaaaaaaaa-->
                <h1>Mes publications</h1>

                <div class="publications-container">
                    <div class="publication-box">
                        <h2>Nom de publication 1</h2>
                        <p><strong>Date de publication :</strong> 2025-03-24</p>
                        <p><strong>Description :</strong> Ceci est une description de publication.</p>
                        <p><strong>Date limite :</strong> 2025-03-31</p>
                        <button class="fin-btn">Fin</button>
                    </div>

                    <div class="publication-box">
                        <h2>Nom de publication 2</h2>
                        <p><strong>Date de publication :</strong> 2025-03-23</p>
                        <p><strong>Description :</strong> Description d'une autre publication.</p>
                        <p><strong>Date limite :</strong> 2025-04-05</p>
                        <button class="fin-btn">Fin</button>
                    </div>

                    <div class="publication-box">
                        <h2>Nom de publication 3</h2>
                        <p><strong>Date de publication :</strong> 2025-03-22</p>
                        <p><strong>Description :</strong> Une autre description de publication.</p>
                        <p><strong>Date limite :</strong> 2025-04-10</p>
                        <button class="fin-btn">Fin</button>
                    </div>

                    <div class="publication-box">
                        <h2>Nom de publication 4</h2>
                        <p><strong>Date de publication :</strong> 2025-03-20</p>
                        <p><strong>Description :</strong> Une publication à propos de quelque chose.</p>
                        <p><strong>Date limite :</strong> 2025-04-12</p>
                        <button class="fin-btn">Fin</button>
                    </div>

                    <div class="publication-box">
                        <h2>Nom de publication 5</h2>
                        <p><strong>Date de publication :</strong> 2025-03-18</p>
                        <p><strong>Description :</strong> Détails d'une autre publication.</p>
                        <p><strong>Date limite :</strong> 2025-04-15</p>
                        <button class="fin-btn">Fin</button>
                    </div>

                    <div class="publication-box">
                        <h2>Nom de publication 6</h2>
                        <p><strong>Date de publication :</strong> 2025-03-15</p>
                        <p><strong>Description :</strong> Encore une publication avec une description.</p>
                        <p><strong>Date limite :</strong> 2025-04-20</p>
                        <button class="fin-btn">Fin</button>
                    </div>
                </div>
                <!--==================================SI PAS ENCORE D'OFFRE DISPO(condition zany azafady)=========================-->
                <h2>Pas encore de publication. <a class="popup-a" href="">Cliquez ici pour Ajouter!</a></h2>
            </main>

            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></span>
                    </button>
                    <div class="theme-toggler">
                        <span class="active"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" style="fill: #fff;"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" style="fill: var(--color-dark);"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg></span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Salut chers</p>
                                <small class="text-muted"><b>Recruteur</b></small>
                        </div>
                        <div class="profile-photo">
                            <img src="{{asset("images/profile.png")}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="sales-analytics">
                    <h2>Historique de publication</h2>
                    <div class="item online">
                        <div class="icon">
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" ><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg></span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Developpeur Web</h3>
                                <small class="text-muted">15/12/25</small><!--DAte de publication-->
                            </div>
                        </div>
                    </div>
                    <div class="item online">
                        <div class="icon">
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" ><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg></span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Developpeur Web</h3>
                                <small class="text-muted">15/12/25</small><!--DAte de publication-->
                            </div>
                        </div>
                    </div>
                    <div class="item online">
                        <div class="icon">
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" ><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg></span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Developpeur Web</h3>
                                <small class="text-muted">15/12/25</small><!--DAte de publication-->
                            </div>
                        </div>
                    </div>
                    <!--==================================SI PAS ENCORE D'OFFRE DISPO(condition zany azafady)=========================-->
                <h2>Pas encore de publication. <a class="popup-a" href="">Cliquez ici pour Ajouter!</a></h2>
                </div>
            </div>
        </div>
    </body>
    <script>
    const sideMenu = document.querySelector("aside");
    const menuBtn = document.querySelector("#menu-btn");
    const closeBtn = document.querySelector("#close-btn");
    const themeToggler = document.querySelector(".theme-toggler");

    menuBtn.addEventListener('click', () =>{
        sideMenu.style.display='block';
    })

    closeBtn.addEventListener('click', () =>{
        sideMenu.style.display='none';
    })

    themeToggler.addEventListener('click', () =>{
        document.body.classList.toggle('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
        themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
    })


    document.addEventListener('DOMContentLoaded', () => {
        // Affiche le Dashboard par défaut
        const defaultLink = document.querySelector('.sidebar a:first-child');
        showContent('dashboard', defaultLink);
    });

    function showContent(sectionId, linkElement) {
        // Masquer toutes les sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.style.display = 'none');

        // Afficher la section correspondante
        document.getElementById(sectionId).style.display = 'block';

        // Supprimer l'état actif de tous les liens du menu
        const links = document.querySelectorAll('.sidebar a');
        links.forEach(link => link.classList.remove('active'));

        // Ajouter la classe active au lien cliqué
        linkElement.classList.add('active');
    }
    </script>

</html>
