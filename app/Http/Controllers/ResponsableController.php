<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use App\Mail\DecisionNotificationMail;
use Illuminate\Support\Facades\Mail;

class ResponsableController extends Controller
{
    public function index()
    {
        $responsable = Auth::user();

        $requests = Requests::where('responsable_id', $responsable->id)
                            ->where('status', 'traitée')
                            ->with('category', 'user')
                            ->get();

        return view('responsable.requests.index', compact('requests'));
    }

    public function makeDecision(Request $request, $id)
    {
        // Validation de la décision et du texte de la réponse
        $validated = $request->validate([
            'decision' => 'required|in:Approuver,Refuser',
            'response_text' => 'nullable|string',
        ]);

        $requete = Requests::findOrFail($id);

        // Vérifier si une réponse a déjà été donnée
        if ($requete->responses()->exists()) {
            return redirect()->back()->with('error', 'Une décision a déjà été prise pour cette requête.');
        }

        // Créer une nouvelle réponse
        Response::create([
            'response_text' => $validated['response_text'] ?? $validated['decision'],
            'request_id' => $requete->id,
            'decision' => $validated['decision'], 
        ]);

        // Mettre à jour le statut de la requête selon la décision
        if ($validated['decision'] === 'Approuver') {
            $requete->status = 'traitée';
        } else {
            $requete->status = 'rejetée';
        }
        $requete->save();

        if ($requete->user) {
    
            Mail::to($requete->user->email)->send(new DecisionNotificationMail($requete, $validated['decision'], $validated['response_text'] ?? ''));
        }

        return redirect()->back()->with('success', 'Décision enregistrée et notification envoyée.');
    }
}
