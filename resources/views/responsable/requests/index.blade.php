@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Requêtes à Décider</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($requests as $request)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <strong>{{ $request->request_title }}</strong> (Priorité: {{ ucfirst($request->priority) }})
            @if($request->responses->count())
                <span class="badge bg-secondary">Décision prise</span>
            @else
                <span class="badge bg-warning text-dark">En attente</span>
            @endif
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $request->request_description }}</p>
            <p><strong>Soumis par :</strong> {{ $request->user->name ?? 'Inconnu' }}</p>

            @if(!$request->responses->count())
                <form action="{{ route('responsable.requests.decision', $request->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="response_text_{{ $request->id }}" class="form-label">Commentaire (optionnel)</label>
                        <textarea name="response_text" id="response_text_{{ $request->id }}" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="decision" value="Approuver" class="btn btn-success">Approuver</button>
                        <button type="submit" name="decision" value="Refuser" class="btn btn-danger">Refuser</button>
                    </div>
                </form>
            @else
                <p><strong>Réponse :</strong> {{ $request->responses->first()->response_text }}</p>
            @endif
        </div>
    </div>
@empty
    <div class="alert alert-info">Aucune requête à traiter.</div>
@endforelse

</div>
@endsection
