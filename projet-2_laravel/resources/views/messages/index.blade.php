@extends('layouts.app')
@section('content')
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
@endsection
</body>