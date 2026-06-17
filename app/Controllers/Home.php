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
        $caisseModel=new CaisseModel();
        $caisseId = $this->request->getPost('caisse');
        $caisse = $caisseModel->find($caisseId);
        session()->set('caisse' , $caisse);
        return redirect()->to('/achat/index');
    }
}
