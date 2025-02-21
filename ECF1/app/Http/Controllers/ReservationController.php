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

        return redirect()->route('dashboard')->with('success', 'Votre réservation a bien été enregistrée');
    }

    public function destroy(Reservation $reservation)
    {
        if (auth()->id() !== $reservation->user_id) {
            abort(403);
        }

        $reservation->delete();

        return redirect()->route('dashboard')->with('success', 'La réservation a été annulée');
    }

    public function edit(Reservation $reservation)
    {
        if (auth()->id() !== $reservation->user_id) {
            abort(403);
        }

        $cours = $reservation->cours;
        $creneaux = Creneau::where('cours_id', $cours->id)->get();

        return view('reservation.edit', compact('reservation', 'cours', 'creneaux'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        if (auth()->id() !== $reservation->user_id) {
            abort(403);
        }

        $validated = $request->validate([
            'creneaux_id' => 'required|exists:creneaux,id'
        ]);

        $creneau = Creneau::findOrFail($validated['creneaux_id']);
        $reservation->update([
            'creneaux_id' => $validated['creneaux_id'],
            'cours_id' => $creneau->cours_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Votre réservation a été modifiée');
    }


}
