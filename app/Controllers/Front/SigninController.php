<?php 
namespace App\Controllers\Front;  
use CodeIgniter\Controller;
use App\Models\Front\siteConfig_model;
use App\Models\Front\Pagina_model;
use App\Models\Front\Users_model;
  
class SigninController extends Controller
{   protected $helpers = ['auth','Funcoes'];
    public function index()
    {
        
        $model            = new siteConfig_model();
        $model_pagina     = new Pagina_model();

       $data = [
           'dados'        => $model->getDados(),
            'servicos'     => $model_pagina->getNews(8,30,'ASC'),
       ];

        return view('/front/login/signin', $data);

    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new Users_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        //$data = $userModel->where('email', $email)->first();
        $data = $userModel->getUser($email);

        if($data){
            $pass = $data[0]['password'];
            $authenticatePassword = password_verify($password, $pass);

            $db      = \Config\Database::connect();
            $builder = $db->table('vz_users');
            $builder->where('unique_id', $data[0]['unique_id']);
            $builder->update(['status' => 'On-line']);
            
            (!empty($data[0]->img)) ? $avatar= $data[0]->img : $avatar = "user.png";
            
            if($authenticatePassword){
                $ses_data = [
                    'id'         => $data[0]['id'],
                    'unique_id'  => $data[0]['unique_id'],
                    'name'       => $data[0]['name'],
                    'email'      => $data[0]['email'],
                    'img'        => $avatar,
                    'group'      => $data[0]['id_group'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                //if profile is only chat
                if($data[0]['id_group']==8){
                    return redirect()->to('/');
                }
                
                return redirect()->to('/admin/painel');
            
            }else{
                setMsgFront('msg', 'Senha inválida','erro');
                return redirect()->to('/login');
            }
        }else{
            setMsgFront('msg', 'Email inválido','erro');
            return redirect()->to('/login');
        }
    }

    public function logout (){
        
        $Uid = session()->get('unique_id');
        
        $db = \Config\Database::connect();

        $builder = $db->table('vz_users');
        $builder->where('unique_id', $Uid);
        $builder->update(['status' => 'Off-line']);

        session()->remove('id');
        session()->remove('unique_id');
        session()->remove('name');
        session()->remove('email');
        session()->remove('group');
        session()->remove('isLoggedIn');

        
        return redirect()->to('/');


    }
}