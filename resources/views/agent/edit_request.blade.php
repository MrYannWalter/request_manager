@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Details de la Requête</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('agent.requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="request_title" class="form-control" value="{{ old('request_title', $request->request_title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="request_description" class="form-control" rows="5" required>{{ old('request_description', $request->request_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Priorité</label>
            <select name="priority" class="form-select" required>
                <option value="urgente" {{ $request->priority == 'urgente' ? 'selected' : '' }}>Urgente</option>
                <option value="standard" {{ $request->priority == 'standard' ? 'selected' : '' }}>Standard</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="status" class="form-select" required>
                <option value="soumise" {{ $request->status == 'soumise' ? 'selected' : '' }}>Soumise</option>
                <option value="en cours" {{ $request->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="traitée" {{ $request->status == 'traitée' ? 'selected' : '' }}>Traitée</option>
                <option value="rejetée" {{ $request->status == 'rejetée' ? 'selected' : '' }}>Rejetée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="/agent/assigned-requests" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
