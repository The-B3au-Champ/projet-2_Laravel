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
<h1>Messages</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<ul>
    @foreach($messages as $message)
        <li>
            <strong>{{ $message->nom }}</strong> ({{ $message->email }})<br>
            <strong>Sujet:</strong> {{ $message->sujet }}<br>
            <p>{{ $message->message }}</p>
            @if($message->created_at)
                <small><strong>Année:</strong> {{ $message->created_at->format('Y') }}</small>
            @else
                <small><strong>Année:</strong> Non disponible</small>
            @endif
            <form action="{{ route('messages.markAsRead', $message->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <label class="{{ $message->read ? 'read' : 'unread' }}">
                    <input type="checkbox" {{ $message->read ? 'checked' : '' }} onclick="this.form.submit()">
                    {{ $message->read ? 'Lu' : 'Non lu' }}
                </label>
            </form>
            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

    </section>
    <footer>
        <p>© 2024 Charles Beauchamp et Étiene Gagnon</p>
    </footer>
</body>

</html>