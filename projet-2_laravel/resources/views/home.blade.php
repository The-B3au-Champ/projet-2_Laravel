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
                @if(auth()->user()->hasRole('admin'))
                <li><a href="messages">Mes messages</a></li>
                @endif
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
                @if(auth()->user()->hasRole('admin'))
                <li><a href="messages">Mes messages</a></li>
                @endif
                <li><a href="recherche">Rechercher un livre</a></li>
                <li><a href="login">Connexion</a></li>
                <li><a href="cart">Panier</a></li>
            </ul>
        </nav>
    </header>
@endauth


    <h1 class="titre">Voici notre sélection de livres</h1>
    <div id="add-book" onclick="window.location.href='/nouveau-livre'"><a>+</a></div>

        @if($books->isEmpty())
            <p>Aucun livre trouvés.</p>
        @else
        <div class='books-container'>  
                @foreach($books as $book)
                    <div class='book-card' onclick='window.location.href="/show-detail/{{$book->id}}"'>
                        <p>{{ $book->title }}</p>
                        <p>{{ $book->author }}</p>
                        <p>{{ $book->description }}</p>
                        <p>{{ $book->publication_date }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>

</html>