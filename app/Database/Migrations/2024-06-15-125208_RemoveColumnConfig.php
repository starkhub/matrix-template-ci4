<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveColumnConfig extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('global_configuration', 'id');
    }

    public function down()
    {
        // Ajouter la colonne 'avatar' à la table 'users' pour la réversibilité
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ]
        ];
        $this->forge->addColumn('global_configuration', $fields);
    }
}
