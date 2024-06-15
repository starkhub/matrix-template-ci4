<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Afficher le tableau de bord si l'utilisateur est connecté
        return view('home', ['title' => 'Dashboard']);
    }
}
