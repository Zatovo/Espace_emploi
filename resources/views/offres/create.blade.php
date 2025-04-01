@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer une Offre</h2>

    <form method="POST" action="{{ route('offres.store') }}">
        @csrf

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="date_limit" class="form-label">Date limite</label>
            <input type="date" class="form-control" name="date_limit" required>
        </div>

        <div class="mb-3">
            <label for="entreprise" class="form-label">Entreprise</label>
            <input type="text" class="form-control" name="entreprise" required>
        </div>

        <div class="mb-3">
            <label for="contrat" class="form-label">Type de contrat</label>
            <input type="text" class="form-control" name="contrat" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('offres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
