<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constacez-nous</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <script src="{{asset('js/script.js') }}" defer></script>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <li><a class="active" href="/">Accueil</a></li>
                <li><a href="nouveautes">Nouveautés</a></li>
                <li><a href="contactez-nous">Contactez-nous</a></li>
                <li><a href="messages">Mes messages</a></li>
                <li><a href="recherche">Rechercher un livre</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="titre">Contactez-nous</h1>
    <form class="form" method="post" action="{{ route('messages.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="Nom" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        
        <label for="sujet">Sujet:</label>
        <input type="text" id="sujet" name="sujet" placeholder="Sujet" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Entrez votre message" required></textarea><br>

        <button type="submit">Envoyer le message</button>
        <a class="center" href="accueil">Revenir en arrière</a>
    </form>

    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>
</html>