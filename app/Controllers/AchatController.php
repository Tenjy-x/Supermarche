<?php

namespace App\Controllers;
use App\Models\AchatModel;
use App\Models\ProduitModel;

class AchatController extends BaseController
{
    public function Index() {
        $produitModel = new ProduitModel();
        $caisse = session()->get('caisse');

        $produits = $produitModel->findAll();
        return view('saisie',[
            'produits' => $produits,
            'caisse' => $caisse
        ]);
        
    }
}
