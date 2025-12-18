<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    /**
     * Enregistrer un nouveau produit
     */
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
}
