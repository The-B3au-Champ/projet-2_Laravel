<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un livre</title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <script src="{{asset('js/script.js') }}" defer></script>
</head>
<body>
    <header>
        <nav  class="nav-bar">
            <ul>
                <li><a class="active" href="/">Accueil</a></li>
                <li><a href="nouveautes">Nouveautés</a></li>
                <li><a href="contactez-nous">Contactez-nous</a></li>
                <li><a href="messages">Mes messages</a></li>
                <li><a href="recherche">Rechercher un livre</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="titre">Modifier un livre</h1>
    <form class="form" method="POST" action="/edit-book/{{ $book->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="title" value="{{ $book->title }}" required><br>

    <label for="auteur">Auteur:</label>
    <input type="text" id="auteur" name="author" placeholder="Nom de l'auteur" value="{{ $book->author }}" required><br>

    <label for="annee_publication">Année de publication:</label>
    <input type="text" id="annee_publication" placeholder="Année de publication du livre" value="{{ $book->publication_date }}" name="publication_date" required><br>

    <label for="resume">Résumé:</label>
    <textarea id="resume" name="description" placeholder="Résumé du livre" required>{{ $book->description }}</textarea><br>

    <label for="prix">Prix:</label>
    <input type="number" id="prix" name="price" placeholder="Le prix du livre" value="{{ $book->price }}" step="0.01" required><br>

    <button type="submit">Modifier le livre</button>
    <a class="center" href="/">Revenir en arrière</a>
</form>


    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>
</html>