<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    
    protected $table            = 'tb_player';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['auth','password','access','flags','id','user_created','isUserLoggedIn'];   
    
    public function register_user($data){     
        $builder = $this->db->table('tb_player');
        $query   = $builder->insert($data);

        return $query;
    }
    public function register($data,$table){     
        $builder = $this->db->table($table);
        $query   = $builder->insert($data);
        return $query;
    }
    public function checknick(){
        $query = $this->db->table('tb_player')->select();
        return $query;
    }
}
