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
                <li><a href="recherche">Rechercher un livre</a></li>
                <li><a href="login">Connexion</a></li>
                <li><a href="cart">Panier</a></li>
            </ul>
        </nav>
    </header>
@endauth