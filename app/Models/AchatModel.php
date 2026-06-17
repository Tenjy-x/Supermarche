<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model {
    protected $table = 'Achat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produit' , 'id_client' , 'id_caisse' , 'Quantite_achetee' , 'Date_achat'];
}