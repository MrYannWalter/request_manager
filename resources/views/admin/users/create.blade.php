@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Ajouter un utilisateur</h2>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        @include('admin.users.partials.form', ['user' => null])

        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>
@endsection
