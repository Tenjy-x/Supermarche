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
        $produitAchatModel = new Produit_AchatModel();
        $total = $produitAchatModel->getSommeTotal();

        $produits = $produitModel->findAll();
        return view('saisie',[
            'produits' => $produits,
            'caisse' => $caisse,
            'total' => $total
        ]);
        
    }

    public function AddPanier() {
        $ProduitAchatModel = new Produit_AchatModel();
        $AchatModel = new AchatModel();
        $produitModel = new ProduitModel();
        $ProduitId = $this->request->getPost('produit');
        $quantite = $this->request->getPost('quantite');

        $session = session();
        $idAchat = $session->get('idAchat');

        if (!$idAchat) {
            $caisse = $session->get('caisse');
            $idCaisse = is_array($caisse) ? ($caisse['id'] ?? null) : $caisse;

            $idAchat = $AchatModel->insert([
                'id_client'   => 1,
                'id_caisse'   => $idCaisse ?? 1,
                'Date_achat'  => date('Y-m-d H:i:s')
            ]);

            $session->set('idAchat', $idAchat);
        }

        $data = [
            'id_produit'      => $ProduitId,
            'Quantite_achetee'=> $quantite,
            'idAchat'         => $idAchat
        ];

        $ProduitAchatModel->insert($data);
        return redirect()->to('/achat/index');
    }
}
