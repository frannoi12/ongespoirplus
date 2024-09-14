<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Simple landind page" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />

        <title>OngEspoirPlus</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />


        @vite('resources/css/app.css')

        <!-- Styles -->
        <style>
            .gradient {
                background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            }
        </style>
    </head>
    <body class="antialiased leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <!--Nav-->
        <nav id="header" class="fixed w-full z-50 top-0 text-white m-auto" style="background-color: rgba(0, 0, 0, 0.7);">
            <div>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'inscrire</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2 px-4 max-w-5xl">
                <div class="pl-4 flex items-center">
                    <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                        href="#">
                        <img src="images/espoirplus.png" alt="logo" class="h-12 fill-current inline">
                    </a>
                </div>
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle"
                        class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                    id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center py-2 px-4">
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-gray-300 font-bold no-underline" href="#">Accueil</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-gray-200 no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#Detail">Détail</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-gray-200 no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#Tarif">Tarif</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
        </nav>
    
       <!--Hero-->
<div id="slideshow" class="relative w-full h-screen overflow-hidden" style="background-color: rgba(255, 255, 255, 0.1);">
    <!-- Diapositive 1 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/fad.jpeg') }}');">
        <!-- Texte explicatif sur l'hygiène -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Respecter l'hygiène est essentiel pour préserver notre santé et l'environnement.
            </div>
        </div>
    </div>

    <!-- Diapositive 2 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/fran.jpeg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Le respect des règles d'hygiène contribue à un environnement sain et propre.
            </div>
        </div>
    </div>

    <!-- Diapositive 3 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/vibrant-recycling-station-promoting-effective-environmental-awareness_1039005-13843.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Chaque geste compte pour maintenir la propreté et protéger la planète.
            </div>
        </div>
    </div>

    <!-- Diapositive 4 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/IMG-20200529-WA0132-768x432.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Protégeons notre communauté en adoptant des pratiques hygiéniques.
            </div>
        </div>
    </div>

    <!-- Diapositive 5 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/IMG-20200529-WA0145-768x432.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                L'hygiène est un pilier fondamental pour une vie en bonne santé.
            </div>
        </div>
    </div>

    <!-- Diapositive 6 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/IMG-20220509-WA0015-768x576.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Un environnement propre est le reflet d'une société en bonne santé.
            </div>
        </div>
    </div>

    <!-- Diapositive 7 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out"
        style="background-image: url('{{ asset('images/fille.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                La propreté commence par des gestes simples d'hygiène quotidienne.
            </div>
        </div>
    </div>

    <!-- Diapositive 8 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out opacity-0"
        style="background-image: url('{{ asset('images/groupe-volontaires-africains-heureux-sacs-ordures-zone-nettoyage-dans-parc-afrique-benevolat-charite-personnes-concept-ecologique_627829-13629.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Ensemble, nous pouvons améliorer les conditions d'hygiène pour tous.
            </div>
        </div>
    </div>

    <!-- Diapositive 9 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out opacity-0"
        style="background-image: url('{{ asset('images/gens-qui-font-du-service-communautaire-ramassant-ordures-exterieur_23-2149109146.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Nettoyer notre environnement est une question de responsabilité partagée.
            </div>
        </div>
    </div>

    <!-- Diapositive 10 -->
    <div class="slide absolute w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out opacity-0"
        style="background-image: url('{{ asset('images/groupe-volontaires-africains-heureux-sacs-ordures-zone-nettoyage-dans-parc-afrique-benevolat-charite-personnes-concept-ecologique_627829-13630.jpg') }}');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-3xl font-bold text-center bg-black bg-opacity-50 p-4 rounded-md">
                Un environnement propre est un droit pour tous, préservons-le.
            </div>
        </div>
    </div>
</div>

    </body>
    
    <script>
        // JavaScript for slideshow
        // Sélectionne toutes les diapositives (éléments avec la classe 'slide' dans le div ayant l'ID 'slideshow')
        const slides = document.querySelectorAll('#slideshow .slide');
        
        // Initialise un compteur pour suivre la diapositive actuellement affichée
        let currentSlide = 0;
    
        // Déclare la durée entre chaque changement de diapositive (ici 30 secondes, soit 30 000 ms)
        const intervalTime = 10000; // 30 seconds
    
        // Fonction qui affiche la diapositive suivante
        function showNextSlide() {
            // Masque la diapositive actuelle en ajoutant la classe 'opacity-0' (qui rend la diapositive transparente)
            slides[currentSlide].classList.add('opacity-0');
    
            // Passe à la diapositive suivante. Si on atteint la fin, on revient à la première diapositive grâce à l'opérateur %
            currentSlide = (currentSlide + 1) % slides.length;
    
            // Affiche la nouvelle diapositive en retirant la classe 'opacity-0'
            slides[currentSlide].classList.remove('opacity-0');
        }
    
        // Lance un changement automatique de diapositive toutes les 30 secondes
        setInterval(showNextSlide, intervalTime);
    </script>
    

        
        <div class="pt-24">
            <div class="container px-24 mx-auto flex flex-wrap flex-col md:flex-row  items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                    <h1 class="my-4 text-5xl font-bold leading-tight">
                        Bienvenue chez EspoirPlus
                    </h1>
                    <p class="leading-normal text-2xl mb-8">
                        Commencer par travailler avec nous. Nous nous chargerons de gérer tout vos ordures ! Si vous n'avez pas encore un compte faites le en cliquant sur commencé
                    </p>
                    <a href="{{ route('register') }}">
                        <button
                            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Commencer
                        </button>
                    </a>
                </div>
                <!--Right Col-->
                <div class="w-full md:w-3/5 py-6 text-center flex justify-end">
                    <img class="w-full md:w-4/5 z-20" src="images/welcome.png" />
                </div>
            </div>
        </div>
        <div class="relative -mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            id="Path-4" opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    ONG EspoirPlus
                </h2>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div id="Detail" class="flex flex-wrap">
                    <div class="w-5/6 sm:w-1/2 p-6">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Description
                        </h3>
                        <p class="text-gray-600 mb-8">
                            Espoir Plus est née de l’Assemblée Générale Constitutive du 20 Décembre 2007 à Sokodé, chef-lieu de la Préfecture. Elle a été d’abord enregistrée en tant qu’association sous le N° 0034/MATDCL-SG-DAPOC-DOCA depuis 2009, avant d’être qualifiée ONG de développement enregistrée sous le N° 949/MPD/2018 du 02 Octobre 2018.
                            <br />
                            <br />
                        </p>
                    </div>
                    <div class="w-full sm:w-1/2 p-6">
                        <img src="images/descript.svg" alt="" class="w-full sm:h-64 mx-auto">
                    </div>
                </div>
                <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <img src="images/objectif.svg" alt="objectif" class="w-5/6 sm:h-64 mx-auto">
                    </div>
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <div class="align-middle">
                            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                                Objectifs
                            </h3>
                            <p class="text-gray-600 mb-8">
                                L’Association Espoir Plus a pour objectifs de  Contribuer à développer les activités de coopération entre les peuples, de formation, de recherche-action au bénéfice des acteurs de développement social, économique et environnemental en mettant un accent particulier sur leur  réelle participation.
                                <br />
                                <br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white border-b py-8">
            <div class="container mx-auto flex flex-wrap pt-4 pb-12">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Activités
                </h2>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                            <div class="w-full font-bold text-xl text-gray-800 px-6">
                                Signalement.
                            </div>
                            <p class="text-gray-800 text-base px-6 mb-5">
                                Nous vous offrons la possibilité de nous signaler une zone d'ordure à travers le bouton ci-dessous.
                            </p>
                        </a>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                        <div class="flex items-center justify-start">
                            <a href="#">
                                <button
                                    class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Signaler
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline">

                            <div class="w-full font-bold text-xl text-gray-800 px-6">
                                Achat d'ordure.
                            </div>
                            <p class="text-gray-800 text-base px-6 mb-5">
                                EspoirPlus vous offre la possibilité de racheter auprès des ménages les ordures de type suivante : Papier Carton, Sacher pure water, etc ...
                            </p>
                        </a>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                        <div class="flex items-center justify-center">
                            <a href="#">
                                <button
                                    class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Vendre
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                            <div class="w-full font-bold text-xl text-gray-800 px-6">
                                Faire un don.
                            </div>
                            <p class="text-gray-800 text-base px-6 mb-5">
                                Pour soutenir l'activité ou l'entreprise, nous vous encouragons à faire des dons.
                            </p>
                        </a>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                        <div class="flex items-center justify-end">
                            <a href="#">
                                <button
                                    class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Dons
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-100 py-8">
            <div id="Tarif" class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Tarifs
                </h2>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
                    <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                        <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                            <div class="p-8 text-3xl font-bold text-center border-b-4">
                                Basique
                            </div>
                            <ul class="w-full text-center text-sm">
                                <li class="border-b py-4">1/7 par semaine</li>
                                <li class="border-b py-4">7/7 disponible</li>
                                <p>Soit une collecte par semaine</p>
                            </ul>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                                XOF 1000
                            </div>
                            <div class="flex items-center justify-center">
                                <a href="{{ route("register") }}">
                                    <button href="mailto:dermanefad1@gmail.com"
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Commencer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                            <div class="w-full p-8 text-3xl font-bold text-center">Moyen</div>
                            <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                            <ul class="w-full text-center text-base font-bold">
                                <li class="border-b py-4">3/7 par semaine</li>
                                <li class="border-b py-4">7/7 disponible</li>
                                <p>Soit 3 collectes par semaine</p>
                            </ul>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="w-full pt-6 text-4xl font-bold text-center">
                                XOF 3000
                            </div>
                            <div class="flex items-center justify-center">
                                <a href="{{ route("register") }}">
                                    <button
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Commencer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                        <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                            <div class="p-8 text-3xl font-bold text-center border-b-4">
                                Pro
                            </div>
                            <ul class="w-full text-center text-sm">
                                <li class="border-b py-4">5/7 par semaine</li>
                                <li class="border-b py-4">7/7 disponible</li>
                                <p>Soit 5 collectes par semaine</p>
                            </ul>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                                XOF 5000
                            </div>
                            <div class="flex items-center justify-center">
                                <a href="{{ route("register") }}">
                                    <button
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Commencer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Change the colour #f8fafc to match the previous section colour -->
        <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                    <g class="wave" fill="#f8fafc">
                        <path
                            d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                        </path>
                    </g>
                    <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                        <g
                            transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                            <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"></path>
                            <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"></path>
                            <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                opacity="0.200000003"></path>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        <section class="container mx-auto text-center py-6 mb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
                Nous Contacter
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <h3 class="my-4 text-3xl leading-tight">
                Laissez nous un message !
            </h3>
            <a href="mailto:dermanefad1@gmail.com">
                <button
                    class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    C'est partie !
                </button>
            </a>            

        </section>
        <!--Footer-->
        <footer class="bg-green-800 text-white py-8 mt-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="w-full md:w-1/3">
                        <h3 class="text-xl font-semibold">Espoir Plus</h3>
                        <p class="mt-4 text-gray-300">Espoir Plus est une entreprise spécialisée dans le ramassage et la gestion
                            des déchets à Sokodé, Togo. Nous visons à améliorer l'hygiène et la qualité de vie dans chaque
                            quartier.</p>
                    </div>
                    <div class="w-full md:w-1/3 mt-8 md:mt-0 text-center">
                        <h4 class="text-lg font-semibold">Suivez-nous</h4>
                        <div class="flex justify-center space-x-4 mt-4">
                            <!-- Logos des applications avec liens -->
                            <a href="https://www.facebook.com/profile.php?id=61552210329384" target="_blank">
                                <img src="{{ asset('images/fesbook.png') }}" alt="Facebook" class="w-8 h-8">
                            </a>
                            
                            <a href="https://www.twitter.com" target="_blank">
                                <img src="{{ asset('images/tiwter.png') }}" alt="Twitter" class="w-8 h-8">
                            </a>
                            <a href="https://www.instagram.com" target="_blank">
                                <img src="{{ asset('images/instagram.jpeg') }}" alt="Instagram" class="w-8 h-8">
                            </a>
                            <a href="https://www.linkedin.com" target="_blank">
                                <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" class="w-8 h-8">
                            </a>
                            <a href="https://www.youtube.com" target="_blank">
                                <img src="{{ asset('images/youtube.jpg') }}" alt="YouTube" class="w-8 h-8">
                            </a>
                            <a href="https://wa.me/22892588651" target="_blank">
                                <img src="{{ asset('images/whatsapp.jpeg') }}" alt="WhatsApp" class="w-8 h-8">
                            </a>                            
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 mt-8 md:mt-0 text-right">
                        <h4 class="text-lg font-semibold">Contact</h4>
                        <p class="mt-4">+228 90 00 00 00</p>
                        <p class="mt-2">contact@espoirplus.tg</p>
                        <p class="mt-2">Sokodé, Togo</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery if you need it
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        -->
        <script>
            var scrollpos = window.scrollY;
            var header = document.getElementById("header");
            var navcontent = document.getElementById("nav-content");
            var navaction = document.getElementById("navAction");
            var brandname = document.getElementById("brandname");
            var toToggle = document.querySelectorAll(".toggleColour");

            document.addEventListener("scroll", function() {
                /*Apply classes for slide in bar*/
                scrollpos = window.scrollY;

                if (scrollpos > 10) {
                    header.classList.add("bg-white");
                    navaction.classList.remove("bg-white");
                    navaction.classList.add("gradient");
                    navaction.classList.remove("text-gray-800");
                    navaction.classList.add("text-white");
                    //Use to switch toggleColour colours
                    for (var i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-gray-800");
                        toToggle[i].classList.remove("text-white");
                    }
                    header.classList.add("shadow");
                    navcontent.classList.remove("bg-gray-100");
                    navcontent.classList.add("bg-white");
                } else {
                    header.classList.remove("bg-white");
                    navaction.classList.remove("gradient");
                    navaction.classList.add("bg-white");
                    navaction.classList.remove("text-white");
                    navaction.classList.add("text-gray-800");
                    //Use to switch toggleColour colours
                    for (var i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-white");
                        toToggle[i].classList.remove("text-gray-800");
                    }

                    header.classList.remove("shadow");
                    navcontent.classList.remove("bg-white");
                    navcontent.classList.add("bg-gray-100");
                }
            });
        </script>
        <script>
            /*Toggle dropdown list*/
            /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

            var navMenuDiv = document.getElementById("nav-content");
            var navMenu = document.getElementById("nav-toggle");

            document.onclick = check;

            function check(e) {
                var target = (e && e.target) || (event && event.srcElement);

                //Nav Menu
                if (!checkParent(target, navMenuDiv)) {
                    // click NOT on the menu
                    if (checkParent(target, navMenu)) {
                        // click on the link
                        if (navMenuDiv.classList.contains("hidden")) {
                            navMenuDiv.classList.remove("hidden");
                        } else {
                            navMenuDiv.classList.add("hidden");
                        }
                    } else {
                        // click both outside link and outside menu, hide menu
                        navMenuDiv.classList.add("hidden");
                    }
                }
            }

            function checkParent(t, elm) {
                while (t.parentNode) {
                    if (t == elm) {
                        return true;
                    }
                    t = t.parentNode;
                }
                return false;
            }
        </script>
    </body>
</html>