<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class tb_users extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'username'  => 'admin',
                'password'  => password_hash('admin',PASSWORD_BCRYPT),
                'fullname'  => 'Administrator',
                'level'     => 5
            ),
        );

        // Using Query Builder
        $this->db->table('tb_users')->insertBatch($data);
    }
}
