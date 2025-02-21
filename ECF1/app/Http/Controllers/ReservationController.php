<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Creneau;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($cours_id)
    {
        $cours = Cours::with('creneaux')->findOrFail($cours_id);
        return view('reservation.create', compact('cours'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'creneaux_id' => 'required|exists:creneaux,id'
        ]);

        $creneau = Creneau::findOrFail($validated['creneaux_id']);
        $validated['cours_id'] = $creneau->cours_id;

        Reservation::create($validated);

        return redirect()->route('cours.index')
            ->with('success', 'Réservation effectuée avec succès');
    }
}
