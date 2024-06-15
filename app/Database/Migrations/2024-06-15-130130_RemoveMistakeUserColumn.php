<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveMistakeUserColumn extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('users', 'param_value');
    }

    public function down()
    {

    }
}
