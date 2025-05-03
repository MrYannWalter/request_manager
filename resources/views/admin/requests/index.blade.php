@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des Requêtes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                {{-- <th>ID</th> --}}
                <th>Étudiant</th>
                <th>Service (Agent)</th>
                <th>Responsable</th>
                <th>Type</th>
                <th>Statut</th>
                {{-- <th>Décision</th> --}}
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
                <tr>
                    {{-- <td>{{ $req->id }}</td> --}}
                    <td>{{ $req->user->name ?? 'N/A' }}</td>
                    <td>{{ $req->agent->name ?? 'Non Assigné' }}</td>
                    <td>{{ $req->responsable->name ?? 'Non Assigné' }}</td>
                    <td>{{ $req->category->category_name ?? 'N/A' }}</td>
                    <td>
                        <span class="badge 
                            @if($req->status == 'en attente') bg-warning 
                            @elseif($req->status == 'traitée') bg-success 
                            @else bg-danger 
                            @endif">
                            {{ ucfirst($req->status) }}
                        </span>
                    </td>
                    {{-- <td>
                        @if($req->response && $req->response->decision === 'Approuver')
                            <span class="badge bg-success">Approuvée</span>
                        @elseif($req->response && $req->response->decision === 'Refuser')
                            <span class="badge bg-danger">Rejetée</span>
                        @else
                            <span class="badge bg-secondary">En attente</span>
                        @endif
                    </td> --}}
                    
                    {{-- <td>{{ optional($req->responses->first())->response_text ?? 'Aucune' }}</td> --}}
                    <td>{{ $req->created_at->format('d/m/Y H:i') }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('admin.requests.show', $req->id) }}" class="btn btn-sm btn-info">Détails</a>
                        
                        <form action="{{ route('admin.requests.destroy', $req->id) }}" method="POST" onsubmit="return confirm('Supprimer cette requête ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">Aucune requête trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
