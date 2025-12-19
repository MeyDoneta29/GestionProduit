<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function delete($id)
    {
        $produit = Product::find($id);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable');
        }
        $produit->delete();
        return redirect()->back()->with('success', 'Produit supprimé avec succès');
    }
}
