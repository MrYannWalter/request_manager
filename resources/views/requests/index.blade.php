@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">Mes Requêtes</h2>

    <!-- Bouton pour créer une nouvelle requête -->
    <div class="mb-4 text-end">
        <a href="{{ route('requests.create') }}" class="btn btn-success">
            + Soumettre une nouvelle requête
        </a>
    </div>


    <div id="loader" class="d-flex justify-content-center align-items-center" style="height: 200px;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

    <!-- Tableau (caché tant que le loader est visible) -->
    <div id="requests-table" class="table-responsive" style="display: none; animation: fadeIn 1s;">
        @if($requests->isEmpty())
            <div class="alert alert-info text-center">
                Vous n'avez soumis aucune requête pour l'instant.
            </div>
        @else
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Soumis le</th>
                        {{-- <th>Pièce jointe</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td class="fw-bold">{{ $request->request_title }}</td>
                            <td>{{ Str::limit($request->request_description, 50) }}</td>
                            <td>
                                @if($request->status == 'soumise')
                                    <span class="badge bg-primary">{{ ucfirst($request->status) }}</span>
                                @elseif($request->status == 'en cours')
                                    <span class="badge bg-warning text-dark">{{ ucfirst($request->status) }}</span>
                                @elseif($request->status == 'traitée')
                                    <span class="badge bg-success">{{ ucfirst($request->status) }}</span>
                                @else
                                    <span class="badge bg-danger">{{ ucfirst($request->status) }}</span>
                                @endif
                            </td>
                            <td><span class="badge bg-info text-dark">{{ ucfirst($request->priority) }}</span></td>
                            {{-- <td>{{ $request->submitted_at ? $request->submitted_at->format('d/m/Y H:i') : '-' }}</td> --}}
                            <td>
                                @if($request->submitted_at)
                                    {{ \Carbon\Carbon::parse($request->submitted_at)->format('d/m/Y H:i') }}
                                @else
                                    -
                                @endif
                            </td>
                            
                            {{-- <td>
                                @if ($request->attachment_path)
                                    @if(Str::endsWith($request->attachment_path, ['.jpg', '.jpeg', '.png']))
                                        <img src="{{ asset($request->attachment_path) }}" alt="Image attachée" width="100">
                                    @elseif(Str::endsWith($request->attachment_path, '.pdf'))
                                        <a href="{{ asset($request->attachment_path) }}" target="_blank">Voir le PDF</a>
                                    @else
                                        Pièce jointe disponible
                                    @endif
                                @else
                                    Aucune pièce jointe
                                @endif
                            </td> --}}
                            <td>
                                <!-- Bouton de suppression -->
                                <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette requête ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<!-- Animation CSS -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- Script pour le loader -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('requests-table').style.display = 'block';
    }, 1000); // simulate 1 second loading
});
</script>
@endsection
