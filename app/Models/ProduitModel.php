<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model {
    protected $table = 'Produits';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Nom' , 'Prix' , 'Quantite_en_stock'];
}