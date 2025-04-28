@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Mes Requêtes Affectées</h1>

    @if($assignedRequests->isEmpty())
        <div class="alert alert-info">
            Aucune requête ne vous a été affectée pour le moment.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Soumis le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignedRequests as $request)
                        <tr>
                            <td>{{ $request->request_title }}</td>
                            <td>{{ Str::limit($request->request_description, 50) }}</td>
                            <td>
                                @if($request->priority == 'urgente')
                                    <span class="badge bg-danger text-white">Urgente</span>
                                @else
                                    <span class="badge bg-primary text-white">Standard</span>
                                @endif
                            </td>
                            <td>
                                @if($request->status == 'soumise')
                                    <span class="badge bg-warning text-dark">Soumise</span>
                                @elseif($request->status == 'en cours')
                                    <span class="badge bg-info text-dark">En cours</span>
                                @elseif($request->status == 'traitée')
                                    <span class="badge bg-success text-white">Traitée</span>
                                @elseif($request->status == 'rejetée')
                                    <span class="badge bg-danger text-white">Rejetée</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($request->submitted_at)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('agent.requests.edit', $request->id) }}" class="btn btn-sm btn-outline-primary">Voir Détails</a>                                
                                <form action="{{ route('agent.requests.markAsCompleted', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-success">Marquer Terminé</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
