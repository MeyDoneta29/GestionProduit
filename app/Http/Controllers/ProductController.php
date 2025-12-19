<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produits = product::all();
        return view('products.index', compact('produits'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit($id)
    {
        $produit = product::findOrFail($id);
        return view('products.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
        ]);

        $produit = product::findOrFail($id);
        $produit->update($validated);

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès !');
    }

    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
        ]);

        // Créer le produit
        product::create($validated);
        return redirect()->route('products.create')->with('success', 'Produit ajouté avec succès !');
    }

        public function delete($id)
    {
        $produit = product::find($id);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable');
        }
        $produit->delete();
        return redirect()->back()->with('success', 'Produit supprimé avec succès');
    }


}