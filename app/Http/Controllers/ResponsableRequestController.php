<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use Illuminate\Support\Facades\Auth;

class ResponsableRequestController extends Controller
{
    public function index()
    {
        $responsableId = Auth::id();

        // On récupère toutes les requêtes où responsable_id est ce user
        $requests = Requests::where('responsable_id', $responsableId)
                            ->whereIn('status', ['en cours', 'soumise'])
                            ->with('user', 'category')
                            ->latest()
                            ->get();

        return view('responsable.assigned_requests', compact('requests'));
    }
}
