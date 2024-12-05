<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche avancée</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/search-books">Recherche avancée</a></li>
            </ul>
        </nav>
    </header>

    <h1>Recherche avancée</h1>

    <form method="GET" action="/search-books" class="form">
        <label for="title">Nom du livre :</label>
        <input type="text" id="title" name="title" placeholder="Nom du livre" value="{{ request('title') }}"><br>

        <label for="author">Auteur :</label>
        <input type="text" id="author" name="author" placeholder="Auteur" value="{{ request('author') }}"><br>

        <label for="publication_year">Année de publication :</label>
        <input type="text" id="publication_year" name="publication_year" placeholder="Année" value="{{ request('publication_year') }}"><br>

        <label for="price_min">Prix minimum :</label>
        <input type="number" step="0.01" id="price_min" name="price_min" placeholder="Prix minimum" value="{{ request('price_min') }}"><br>

        <label for="price_max">Prix maximum :</label>
        <input type="number" step="0.01" id="price_max" name="price_max" placeholder="Prix maximum" value="{{ request('price_max') }}"><br>

        <button type="submit">Rechercher</button>
    </form>

    <h2>Résultats :</h2>
    @if($books->isEmpty())
        <p>Aucun livre trouvé pour ces critères.</p>
    @else
        <ul>
            @foreach($books as $book)
                <li>
                    <strong>{{ $book->title }}</strong> par {{ $book->author }} ({{ $book->publication_date }}) - ${{ $book->price }}
                </li>
            @endforeach
        </ul>
    @endif>

    <footer>
        <p>© 2024 Charles Beauchamp et Étienne Gagnon</p>
    </footer>
</body>
</html>
