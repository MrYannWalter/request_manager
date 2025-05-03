@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Détails de la Requête #{{ $request->id }}</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Étudiant :</strong> {{ $request->user->name ?? 'N/A' }}</p>
            <p><strong>Service (Agent) :</strong> {{ $request->agent->name ?? 'Non Assigné' }}</p>
            <p><strong>Responsable :</strong> {{ $request->responsable->name ?? 'Non Assigné' }}</p>
            <p><strong>Type de Requête :</strong> {{ $request->category->category_name ?? 'N/A' }}</p>
            <p><strong>Description :</strong> {{ $request->request_description ?? 'Aucune description fournie' }}</p>
            <p><strong>Priorité :</strong> 
                @if($request->priority == 'urgente')
                    <span class="badge bg-danger">Urgente</span>
                @elseif($request->priority == 'standard')
                    <span class="badge bg-warning text-dark">Standard</span>
                @else
                    <span class="badge bg-secondary">Aucune priorite</span>
                @endif
            </p>
            <p><strong>Statut :</strong> 
                <span class="badge 
                    @if($request->status == 'en attente') bg-warning 
                    @elseif($request->status == 'traitée') bg-success 
                    @else bg-danger 
                    @endif">
                    {{ ucfirst($request->status) }}
                </span>
            </p>
            {{-- <p><strong>Décision :</strong> 
                @if($request->decision == 'approuvée')
                    <span class="badge bg-success">Approuvée</span>
                @elseif($request->decision == 'rejetée')
                    <span class="badge bg-danger">Rejetée</span>
                @else
                    <span class="badge bg-secondary">En attente</span>
                @endif
            </p> --}}
            <p><strong>Réponse du Responsable :</strong> {{ $request->response_text ?? 'Aucune réponse' }}</p>
            <p><strong>Date de Création :</strong> {{ $request->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
</div>
@endsection
