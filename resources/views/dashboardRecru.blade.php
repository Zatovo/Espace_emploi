@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Offres</h2>

    <a href="{{ route('offres.create') }}" class="btn btn-primary mb-3">Créer une Offre</a>

    @if(isset($offres) && $offres->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Type de Contrat</th>
                    <th>Description</th>
                    <th>Date limite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offres as $offre)
                <tr>
                    <td>{{ $offre->entreprise }}</td>
                    <td>{{ $offre->contrat }}</td>
                    <td>{{ $offre->description }}</td>
                    <td>{{ $offre->date_limit }}</td>
                    <td>
                        <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune offre créée.</p>
    @endif
</div>
@endsection
