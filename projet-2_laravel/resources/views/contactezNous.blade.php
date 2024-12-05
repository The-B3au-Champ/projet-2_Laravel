
    @extends('layouts.app')

    @section('title', 'Contactez-nous')

    @section('content')
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
    @endsection
