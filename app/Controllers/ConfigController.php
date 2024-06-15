<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ConfigModel;
use CodeIgniter\Database\Config;


class ConfigController extends Controller
{
    public function index()
    {
        $model = new ConfigModel();
        $settings = $model->findAll();

        $data['settings'] = [];
        foreach ($settings as $setting) {
            $data['settings'][$setting['param_name']] = $setting['param_value'];
        }

        return view('config/index', $data);
    }

    public function update()
    {
        $model = new ConfigModel();

        // Récupérer tous les paramètres envoyés via le formulaire
        $postData = $this->request->getPost();

        foreach ($postData as $param_name => $param_value) {
            // Vérifier si le paramètre existe déjà
            $existingParam = $model->where('param_name', $param_name)->first();

            if ($existingParam) {
                // Mettre à jour le paramètre existant
                $model->where('param_name', $param_name)->set(['param_value' => $param_value])->update();
            } else {
                // Insérer un nouveau paramètre
                $model->insert([
                    'param_name' => $param_name,
                    'param_value' => $param_value
                ]);
            }
        }

        return redirect()->to('/config');
    }

}
