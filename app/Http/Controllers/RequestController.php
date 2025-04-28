<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestSubmittedMail;
use App\Mail\AgentAssignedMail;
use Carbon\Carbon;

class RequestController extends Controller
{
    // Affichage des requêtes de l'étudiant connecté
    public function index()
    {
        $user = Auth::user();

        // Vérifier que c'est un étudiant
        if ($user->role !== 'etudiant') {
            return redirect()->route('home')->with('error', 'Accès réservé aux étudiants.');
        }

        // Récupérer les requêtes de l'étudiant connecté
        $requests = Requests::where('user_id', $user->id)->get();

        return view('requests.index', compact('requests'));
    }

    // Affichage du formulaire de création de requête
    public function create()
    {
        $categories = Category::all();
        return view('requests.create', compact('categories'));
    }

    // Stockage de la requête soumise
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'request_title' => 'required|string|max:255',
            'request_description' => 'required|string',
            'priority' => 'required|in:urgente,standard',
            'category_id' => 'required|exists:categories,id',
            'attachment' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:10240', // Max 10MB
        ]);

        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Déplacer dans public/pdf
            $file->move(public_path('pdf'), $filename);

            // Stocker le chemin relatif
            $attachmentPath = 'pdf/' . $filename;
        }

        // Sélectionner un agent aléatoirement
        $agent = User::where('role', 'agent')->inRandomOrder()->first();

        if (!$agent) {
            return back()->with('error', 'Aucun agent disponible pour traiter votre requête.');
        }

        // Créer la requête
        $userRequest = Requests::create([
            'request_title'      => $request->request_title,
            'request_description'=> $request->request_description,
            'priority'           => $request->priority,
            'category_id'        => $request->category_id,
            'user_id'            => Auth::id(),
            'attachment_path'    => $attachmentPath,
            'status'             => 'soumise',
            'submitted_at'       => Carbon::now(),
            'agent_id'           => $agent->id, // Assigner l'agent ici directement
        ]);

       
Mail::to(Auth::user()->email)->send(new RequestSubmittedMail($userRequest, $agent->name));

Mail::to($agent->email)->send(new AgentAssignedMail($userRequest));


        return redirect()->route('requests.index')->with('success', 'Votre requête a été soumise avec succès.');
    }

    // Suppression d'une requête
    public function destroy($id)
    {
        $request = Requests::findOrFail($id);

        // Suppression
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'La requête a été supprimée avec succès.');
    }
}
