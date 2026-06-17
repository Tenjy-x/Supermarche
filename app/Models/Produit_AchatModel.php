<?php

namespace App\Models;

use CodeIgniter\Model;

class Produit_AchatModel extends Model {
    protected $table = 'Produit_Achat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produit' , 'Quantite_achetee'];
}