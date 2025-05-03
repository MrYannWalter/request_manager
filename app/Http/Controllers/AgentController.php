<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\RequestStatusUpdatedMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestSentToResponsableMail;
use App\Mail\ResponsableNotificationMail;
use App\Models\Message;

class AgentController extends Controller
{
    // Ajout dans RequestController ou un nouveau AgentController
public function showAssignedRequests()
{
    $user = Auth::user();

    // Vérifier que c'est un agent
    if ($user->role !== 'agent') {
        return redirect()->route('home')->with('error', 'Accès réservé aux agents.');
    }

    // Récupérer toutes les requêtes affectées à cet agent
    $assignedRequests = Requests::where('agent_id', $user->id)->get();

    return view('agent.assigned_requests', compact('assignedRequests'));
}




public function edit($id)
{
    $request = Requests::findOrFail($id);

    // Sécurité : l'agent ne peut modifier que ses propres requêtes
    if (auth()->user()->id !== $request->agent_id) {
        abort(403, 'Accès non autorisé.');
    }
    $messages = Message::where('request_id', $id)->orderBy('created_at')->get();

    return view('agent.edit_request', compact('request', 'messages'));
}

public function update(Request $req, $id)
{
    $request = Requests::findOrFail($id);

    if (auth()->user()->id !== $request->agent_id) {
        abort(403, 'Accès non autorisé.');
    }

    $req->validate([
        'request_title' => 'required|string|max:255',
        'request_description' => 'required|string',
        'priority' => 'required|in:urgente,standard',
        'status' => 'required|in:soumise,en cours,traitée,rejetée',
    ]);

   
    $oldStatus = $request->status;


    $request->update([
        'request_title' => $req->request_title,
        'request_description' => $req->request_description,
        'priority' => $req->priority,
        'status' => $req->status,
    ]);

    // Vérifie si le statut a changé
    if ($oldStatus !== $req->status) {
        $etudiant = User::find($request->user_id);
        if ($etudiant) {
            Mail::to($etudiant->email)->send(new RequestStatusUpdatedMail($request));
        }
        return redirect()->route('agent.requests.edit', $request->id)
            ->with('success', 'Requete et Statut mis à jour.');
    }

    return redirect()->route('agent.requests.edit', $request->id)
        ->with('success', 'Requête mise à jour.');
}



public function markAsCompleted($id)
{
    $request = Requests::findOrFail($id);

    // Vérifie si l'agent connecté est celui affecté
    if (auth()->user()->id !== $request->agent_id) {
        abort(403, 'Accès non autorisé.');
    }

   
 //   $request->status = 'traitée';

    // Choisir un responsable aléatoire
    $responsable = User::where('role', 'responsable')->inRandomOrder()->first();

    if ($responsable) {
        $request->responsable_id = $responsable->id;
        $request->save();

        // Envoyer un mail à l'agent connecté
        Mail::to(auth()->user()->email)->send(new RequestSentToResponsableMail($request, $responsable));

        // Envoyer un mail au responsable choisi
        Mail::to($responsable->email)->send(new ResponsableNotificationMail($request));
    } else {
        return redirect()->back()->with('error', 'Aucun responsable disponible pour l\'affectation.');
    }

    return redirect()->back()->with('success', 'La requête a été marquée comme traitée et envoyée à un responsable.');
}

                        

}
