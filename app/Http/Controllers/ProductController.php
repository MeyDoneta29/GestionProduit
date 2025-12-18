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
