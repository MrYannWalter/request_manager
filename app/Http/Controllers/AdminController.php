<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Requests;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

public function index()
{
    $users = User::all(); // Récupérer tous les utilisateurs
    return view('admin.users.index', compact('users'));
}

public function create()
    {
        return view('admin.users.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'sexe' => 'required',
            'telephone' => 'required',
            'service_code' => 'required',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:etudiant,agent,responsable,admin'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'service_code' => $request->service_code,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    // Éditer un utilisateur
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Mettre à jour l'utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'sexe' => 'required',
            'telephone' => 'required',
            'service_code' => 'required',
            'role' => 'required|in:etudiant,agent,responsable,admin'
        ]);

        $user->update($request->only('name', 'email', 'sexe', 'telephone', 'service_code', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
    }


    public function requestsIndex()
    {
        // $requests = Requests::with(['user', 'agent', 'responsable', 'category', 'responses'])->latest()->get();
        $requests = Requests::with(['user', 'agent', 'responsable', 'category', 'responses'])->get();
        return view('admin.requests.index', compact('requests'));
    }

    public function destroyRequest($id)
    {
        $req = Requests::findOrFail($id);
        $req->delete();
    
        return redirect()->route('admin.requests.index')->with('success', 'Requête supprimée avec succès.');
    }

    public function show($id)
    {
        $request = Requests::with(['user', 'agent', 'responsable', 'category'])->findOrFail($id);
        return view('admin.requests.show', compact('request'));
    }
    
    
    
}
