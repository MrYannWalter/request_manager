@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Requêtes à traiter</h2>

    @forelse($requests as $request)
        <div class="card mb-4">
            <div class="card-header">
                <strong>{{ $request->request_title }}</strong>
                <span class="badge bg-primary">{{ ucfirst($request->priority) }}</span>
            </div>
            <div class="card-body">
                <p><strong>Soumis par :</strong> {{ $request->user->name ?? 'Inconnu' }}</p>
                <p><strong>Catégorie :</strong> {{ $request->category->name ?? 'Non défini' }}</p>
                <p><strong>Description :</strong> {{ $request->request_description }}</p>
                <p><strong>Status actuel :</strong> 
                    @if($request->responses->count())
                        <span class="badge bg-success">Décision prise</span>
                    @else
                        <span class="badge bg-warning text-dark">En attente</span>
                    @endif
                </p>

                @if(!$request->responses->count())
                    <a href="{{ route('responsable.requests.decision', $request->id) }}" class="btn btn-primary mt-2">
                        Prendre une décision
                    </a>
                @else
                    <p><strong>Réponse :</strong> {{ $request->responses->first()->response_text }}</p>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-info">Aucune requête à traiter pour l'instant.</div>
    @endforelse
</div>
@endsection
