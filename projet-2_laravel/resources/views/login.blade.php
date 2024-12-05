@extends('layouts.app')
@section('content')
    @auth
        <h1>Bienvenue, {{ auth()->user()->name }} !</h1>
        <p>Vous êtes connecté.</p>

        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

    @else
        <div>
        <h2>Enregistrer</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Nom">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Mon de passe">
            <button>Enregistrer</button>
        </form>
    </div>
    <div>
        <h2>Connection</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginEmail" type="text" placeholder="Email">
            <input name="loginPassword" type="password" placeholder="Mon de passe">
            <button>Connexion</button>
        </form>
    </div>
    @endauth
@endsection
