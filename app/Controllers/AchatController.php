<?php

namespace App\Controllers;
use App\Models\AchatModel;
use App\Models\Produit_AchatModel;
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

    public function AddPanier() {
        $ProduitAchatModel = new Produit_AchatModel();
        $produitModel = new ProduitModel();
        $ProduitId = $this->request->getPost('produit');
        // $Produit = $produitModel->find($ProduitId);

        $quantite = $this->request->getPost('quantite');

        $data = [
            'id_produit' => $ProduitId,
            'Quantite_achetee'   => $quantite
        ];
        print_r($data);
        $ProduitAchatModel->insert($data);
        return redirect()->to('/achat/index');

    }
}
