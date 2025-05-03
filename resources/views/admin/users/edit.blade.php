@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Modifier l'utilisateur</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.users.partials.form', ['user' => $user])

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
