<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use Config\Services; 

class Home extends BaseController
{
    protected $m_register;
    protected $session;
    protected $db;
    public function __construct(){
        $this->m_register = new RegisterModel();
        $this->session = Services::session();
        $this->db = \Config\Database::connect();           
    }
    public function index()
    {
        $this->session->remove('message');
        $data['judul'] = "Home";
        return view('home/index',$data);
    }
    public function success(){
        $data['judul']      = "Register Success!";
        if(!isset($_SESSION['message']) || $_SESSION['message'] == null) return redirect()->to('../');
        else $data['message']    = $_SESSION['message'];
        
        return view ('home/success',$data);
    }
    public function checkuser(){
        $query = $this->db->query("select lower(auth) from tb_player");
        $data = array();
        foreach ($query->getResultArray() as $row) {
            $data[] = $row['lower(auth)'];
        }
        echo json_encode($data);

    }
    public function test(){
        $nick = "thefik";
        $check = strtolower($nick);
        $q = $this->db->query("select lower(auth) from tb_player where lower(auth)='$check'");
    }
    public function register(){
        $nick = $this->request->getPost("nickname");
        $check = strtolower($nick);
        $q = $this->db->query("select lower(auth) from tb_player where lower(auth)='$check'");
        if($q->getNumRows()>0)  return redirect()->to('../'); 
        $pass = $this->request->getPost("pass");
        $tanggal = date("Y-m-d H:i:s"); 
        $data = [
            'auth'              => $nick,
            'password'          => md5($pass),
            'access'            => 'z',
            'flags'             => 'a',
            'user_created'      => $tanggal,
            'isUserLoggedIn'    => 0,
        ];
        $query = $this->m_register->register_user($data);
        if($query){
            $this->session->setFlashdata(["message"=>1]);
            return redirect()->to('../success');
        }
        else{
            $this->session->setFlashdata(["message"=>0]);
            return redirect()->to('../');            
        }
    }
}
