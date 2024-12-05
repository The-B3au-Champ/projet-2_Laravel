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

    @extends('layouts.app')
    @section('content')

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
    @endsection

</body>

</html>