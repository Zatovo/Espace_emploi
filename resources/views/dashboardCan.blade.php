@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('candidatures.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>CV (PDF/DOC) :</label>
    <input type="file" name="cv" required>
    
    <label>Lettre de motivation :</label>
    <input type="text" name="lm" required>

    <label>Adresse :</label>
    <input type="text" name="adresse" required>

    <label>Niveau :</label>
    <input type="text" name="niveau" required>

    <label>Expérience :</label>
    <input type="text" name="exp">

    <label>Date de naissance :</label>
    <input type="date" name="date_naiss" required>

    <button type="submit">Envoyer</button>
</form>

<h2>Mes Candidatures</h2>
@foreach ($candidatures as $candidature)
    <p>{{ $candidature->lm }} - <a href="{{ asset('storage/' . $candidature->cv) }}" target="_blank">Voir CV</a></p>
    <form action="{{ route('candidatures.destroy', $candidature->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endforeach
