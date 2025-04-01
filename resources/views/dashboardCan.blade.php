@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Offres</h2>

    @foreach($offres as $offre)
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">{{ $offre->titre }}</h5>
                <p class="card-text">{{ $offre->description }}</p>
                <button class="btn btn-primary" onclick="showForm({{ $offre->id }})">Envoyer ma candidature</button>
            </div>
        </div>
    @endforeach

    <h2>Mon Historique de Candidatures</h2>
    <ul class="list-group">
        @foreach($candidatures as $candidature)
            <li class="list-group-item">
                Candidature pour l'offre ID: {{ $candidature->id }} - Envoyée le {{ $candidature->created_at->format('d/m/Y') }}
            </li>
        @endforeach
    </ul>
</div>

<!-- Formulaire caché -->
<div id="candidatureForm" class="container mt-4" style="display: none;">
    <h3>Postuler à une offre</h3>
    <form method="POST" action="{{ route('candidature.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="offre_id" id="offre_id">

        <div class="mb-3">
            <label for="cv" class="form-label">CV (PDF, DOC, DOCX)</label>
            <input type="file" class="form-control" name="cv" required>
        </div>
        
        <div class="mb-3">
            <label for="lm" class="form-label">Lettre de motivation (optionnelle)</label>
            <input type="file" class="form-control" name="lm">
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" required>
        </div>

        <div class="mb-3">
            <label for="niveau" class="form-label">Niveau</label>
            <input type="text" class="form-control" name="niveau" required>
        </div>

        <div class="mb-3">
            <label for="exp" class="form-label">Expérience</label>
            <input type="text" class="form-control" name="exp" required>
        </div>

        <div class="mb-3">
            <label for="date_naiss" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" name="date_naiss" required>
        </div>

        <button type="submit" class="btn btn-success">Envoyer</button>
        <button type="button" class="btn btn-secondary" onclick="hideForm()">Annuler</button>
    </form>
</div>

<script>
    function showForm(offreId) {
        document.getElementById('offre_id').value = offreId;
        document.getElementById('candidatureForm').style.display = 'block';
    }

    function hideForm() {
        document.getElementById('candidatureForm').style.display = 'none';
    }
</script>
@endsection
