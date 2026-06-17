<?php

namespace App\Controllers;
use App\Models\CaisseModel;


class Home extends BaseController
{
    public function index(): string
    {   $caisse = new CaisseModel();
        $caisses = $caisse->findAll();
        return view('choix_caisse', [
            'caisses' => $caisses
        ]);    
    }

    public function Achat() {
        $caisse = $this->request->getPost('caisse');
        session()->set('caisse' , $caisse);
        return redirect()->to('/achat/index');
    }
}
