<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConfigTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'application_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('global_configuration');
    }

    public function down()
    {
        $this->forge->dropTable('global_configuration');
    }
}
