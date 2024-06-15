<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnConfig extends Migration
{
    public function up()
    {
        // Ajouter une nouvelle colonne 'profile_picture'
        $fields = [
            'param_value' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null'  => true,
                'after' => 'param_name' // Place la colonne après 'avatar'
            ],
        ];
        $this->forge->addColumn('global_configuration', $fields);

    }

    public function down()
    {
        // Supprimer la colonne 'profile_picture'
        $this->forge->dropColumn('global_configuration', 'param_value');

    }
}
