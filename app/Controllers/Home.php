<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Afficher le tableau de bord si l'utilisateur est connecté
        return view('home');
    }
}
