<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPlayer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'auth'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'password'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'access'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'flags'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'user_created'  => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'isUserLogged'  => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'           => 0,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_player');
    }

    public function down()
    {
        $this->forge->dropTable('tb_player');
    }
}
