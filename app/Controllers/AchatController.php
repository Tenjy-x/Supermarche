<?php

namespace App\Controllers;
use App\Models\AchatModel;

class AchatController extends BaseController
{
    public function Index() {
        return view('saisie');
    }
}
