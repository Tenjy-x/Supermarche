<?php

namespace App\Models;

use CodeIgniter\Model;

class Produit_AchatModel extends Model {
    protected $table = 'Produit_Achat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produit' , 'Quantite_achetee'];

    public function getAllProduit_Achat() {
        return $this->findAll();
    }

    public function getSommeTotal() {
        $produits = $this->findAll();
        $total = 0;
        foreach ($produits as $produit) {
            $total += $produit['Quantite_achetee'] * $this->getPrixProduit($produit['id_produit']);
        }
        return $total;
    }

    private function getPrixProduit($id_produit) {
        $produitModel = new ProduitModel();
        $produit = $produitModel->find($id_produit);
        return $produit ? $produit['Prix'] : 0;
    }

}