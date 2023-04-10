<?php 
namespace App\Controllers\Front;  
use CodeIgniter\Controller;
use App\Models\Front\siteConfig_model;
use App\Models\Front\Pagina_model;
use App\Models\Front\Users_model;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $model            = new siteConfig_model();
        $model_pagina     = new Pagina_model();
        $userModel        = new Users_model();

       $data = [
           'dados'        => $model->getDados(),
           'servicos'     => $model_pagina->getNews(8,30,'ASC'),
           'groups'       => $userModel->getGroups(),
       ];

        echo view('front/login/signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
 
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[vz_users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        
        if($this->validate($rules)){
            $userModel = new Users_model();
            $dataUser = [
                'unique_id'  => uniqid(),
                'name'       => $this->request->getVar('name'),
                'email'      => $this->request->getVar('email'),
                'status'     => 'Off-line',
                'nascimento' => $this->request->getVar('nascimento'),
                'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $group = array_sum($this->request->getVar('group'));
            echo $group;
            $userModel->insert($dataUser);
            $last_insert_id = $userModel->getInsertID();

            $db = \Config\Database::connect();
            $db = db_connect();

            $db->query("insert into vz_usersgroup (id_group, id_user) values($group,$last_insert_id)");
           
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('front/login/signup', $data);
        }
          
    
    }
  
}