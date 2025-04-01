@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Offres</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(auth()->user()->role === 'recruteur')
        <a href="{{ route('offres.create') }}" class="btn btn-success mb-3">Créer une Offre</a>
    @endif

    @foreach($offres as $offre)
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">{{ $offre->entreprise }} - {{ $offre->contrat }}</h5>
                <p class="card-text">{{ $offre->description }}</p>
                <p class="text-muted">Date limite: {{ $offre->date_limit }}</p>

                @if(auth()->user()->role === 'recruteur' && auth()->id() === $offre->id_recru)
                    <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
