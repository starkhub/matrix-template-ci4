<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminUser extends Migration
{
    public function up()
    {
        // Insert the admin user
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT), // Change 'admin123' to a secure password
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('users')->insert($data);
    }

    public function down()
    {
        // Remove the admin user
        $this->db->table('users')->where('username', 'admin')->delete();
    }
}
