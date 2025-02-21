<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    public function create()
    {
        return view('cours.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Cours::create($validated);
        return redirect('/accueil')->with('success', 'Cours créé avec succès');
    }

    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit', compact('cours'));
    }

    public function update(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $cours->update($validated);
        return redirect('/accueil')->with('success', 'Cours mis à jour avec succès');
    }

    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect('/accueil')->with('success', 'Cours supprimé avec succès');
    }
}
