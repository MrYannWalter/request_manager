@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">Soumettre une Nouvelle Requête</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
        @csrf

        <div class="mb-3">
            <label for="request_title" class="form-label">Titre de la requête</label>
            <input type="text" name="request_title" id="request_title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="request_description" class="form-label">Description</label>
            <textarea name="request_description" id="request_description" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priorité</label>
            <select name="priority" id="priority" class="form-select" required>
                <option value="standard" selected>Standard</option>
                <option value="urgente">Urgente</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Type de Requête</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="attachment_path" class="form-label">Pièce Jointe (PDF, image)</label>
            <input type="file" name="attachment_path" id="attachment_path" class="form-control" accept="application/pdf,image/*">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
@endsection
