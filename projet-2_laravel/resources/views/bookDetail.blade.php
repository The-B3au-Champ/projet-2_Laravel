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
@auth
    <header>
        <nav class="nav-bar">
            <img onclick='openNavbar()' id="menu-logo" src="{{asset('img/menu.png') }}">
            <img onclick='openNavbar()' id="close-logo" src="{{asset('img/logoX.png') }}">
            <ul id="open_navbar">
                <li><a class="active" href="/">Accueil</a></li>
                <li><a href="nouveautes">Nouveautés</a></li>
                <li><a href="contactez-nous">Contactez-nous</a></li>
                <li><a href="messages">Mes messages</a></li>
                <li><a href="recherche">Rechercher un livre</a></li>
                <li>{{ auth()->user()->name }}</li>
                <form action="/logout" method="POST">
                    @csrf
                    <button>Log out</button>
                </form>
                <li><a href="cart">Panier</a></li>
            </ul>
        </nav>
    </header>
@else
    <header>
        <nav class="nav-bar">
            <img onclick='openNavbar()' id="menu-logo" src="{{asset('img/menu.png') }}">
            <img onclick='openNavbar()' id="close-logo" src="{{asset('img/logoX.png') }}">
            <ul id="open_navbar">
                <li><a class="active" href="/">Accueil</a></li>
                <li><a href="nouveautes">Nouveautés</a></li>
                <li><a href="contactez-nous">Contactez-nous</a></li>
                <li><a href="messages">Mes messages</a></li>
                <li><a href="recherche">Rechercher un livre</a></li>
                <li><a href="login">Connexion</a></li>
                <li><a href="cart">Panier</a></li>
            </ul>
        </nav>
    </header>
@endauth


    <h1 class="titre">Détails du livre : {{ $book->title }}</h1>
        <div class='book-card-detail'>
            <p>Titre : {{ $book->title }}</p>
            <p>Auteur : {{ $book->author }}</p>
            <p>Résumé : {{ $book->description }}</p>
            <p>Date de publication : {{ $book->publication_date }}</p>
            <p>Prix : {{ $book->price }} $</p>
            <br>
            <button onclick="addToCart({{ $book->id }})" class="btn">Ajouter au panier</button>
            <br>
            <form action="/delete-book/{{ $book->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?');">Supprimer</button>
            </form>
            <br>
            <button onclick='window.location.href="/edit-book/{{$book->id}}"' >Modifier le livre</button>
       </div>
    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>

</html>