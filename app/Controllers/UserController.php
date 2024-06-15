<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = 'Liste utilisateurs';

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];

        $model->insert($data);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        $data['title'] = 'Modification utilisateur';

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];

        // Gérer le téléchargement de l'avatar
        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            // Générer un nom unique pour le fichier
            $newName = $avatar->getRandomName();
            // Déplacer le fichier vers le répertoire public/uploads/avatars
            $avatar->move(FCPATH  . 'uploads/avatars', $newName);
            // Ajouter le chemin de l'avatar dans les données à mettre à jour
            $data['avatar'] = 'uploads/avatars/' . $newName;

            // Mise à jour avatar en session si nécessaire
            $session = session();
            if($session->get('avatar') !== $data['avatar'])
            {
                session()->set(['avatar' => $data['avatar']]);
            }
        }

        $model->update($id, $data);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/users');
    }
}
