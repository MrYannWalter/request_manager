<div class="mb-3">
    <label for="name">Nom</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
</div>

@if (!isset($user))
<div class="mb-3">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
    <label for="password_confirmation">Confirmation mot de passe</label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>
@endif

<div class="mb-3">
    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" value="{{ old('telephone', $user->telephone ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="sexe">Sexe</label>
    <select name="sexe" class="form-control" required>
        <option value="">Choisir...</option>
        <option value="Masculin" {{ (old('sexe', $user->sexe ?? '') == 'Masculin') ? 'selected' : '' }}>Masculin</option>
        <option value="Féminin" {{ (old('sexe', $user->sexe ?? '') == 'Féminin') ? 'selected' : '' }}>Féminin</option>
    </select>
</div>

<div class="mb-3">
    <label for="service_code">Service</label>
    <input type="text" name="service_code" value="{{ old('service_code', $user->service_code ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="role">Rôle</label>
    <select name="role" class="form-control" required>
        <option value="">Choisir...</option>
        @foreach(['etudiant', 'agent', 'responsable', 'admin'] as $role)
            <option value="{{ $role }}" {{ (old('role', $user->role ?? '') == $role) ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
        @endforeach
    </select>
</div>
