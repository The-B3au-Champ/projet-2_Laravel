<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <title>Accueil</title>
    <script src="{{asset('js/script.js') }}" defer></script>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <img onclick='openNavbar()' id="menu-logo" src="{{asset('img/menu.png') }}">
            <img onclick='openNavbar()' id="close-logo" src="{{asset('img/logoX.png') }}">
            <ul id="open_navbar">
                <li><a class="active" href="accueil">Accueil</a></li>
                <li><a href="nouveautes">Nouveautés</a></li>
                <li><a href="contactez-nous">Contactez-nous</a></li>
                <li><a href="messages">Mes messages</a></li>
                <li><a href="recherche">Rechercher un livre</a></li>
                <li><a href="login">Connexion</a></li>
                <li><a href="cart">Panier</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="titre">Voici notre sélection de livres</h1>
    <div id="add-book" onclick="window.location.href='nouveau-livre'"><a>+</a></div>

    <section class="books-container">
        {{-- <?php // include($basePath . "/app/Http/Controllers/fetch_livres.php");?> --}}
    </section>
    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>

</html>