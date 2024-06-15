<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddModifyConfigColumns extends Migration
{
    public function up()
    {
        // Ajouter une nouvelle colonne 'profile_picture'
        $fields = [
            'param_value' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null'  => false,
                'after' => 'application_name' // Place la colonne après 'avatar'
            ],
        ];
        $this->forge->addColumn('users', $fields);

        // Modifier la colonne 'username'
        $modifyFields = [
            'application_name' => [
                'name' => 'param_name',
                'type' => 'VARCHAR',
                'constraint' => '255', // Nouvelle contrainte
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('global_configuration', $modifyFields);
    }

    public function down()
    {
        // Supprimer la colonne 'profile_picture'
        $this->forge->dropColumn('global_configuration', 'param_value');

        // Revenir à l'ancienne définition de la colonne 'username'
        $revertFields = [
            'param_name' => [
                'name' => 'application_name',
                'type' => 'VARCHAR',
                'constraint' => '255', // Ancienne contrainte
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('global_configuration', $revertFields);
    }
}
