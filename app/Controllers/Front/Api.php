<?php namespace App\Controllers\Front;

use App\Models\Front\Users_model;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
    use ResponseTrait;
   

	public function index()
	{
        return view('/');
    }
    
  	
	public function LoginApi()
    {
                
        $userModel = new Users_model();
        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
       
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if($authenticatePassword){
                $res = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE,
					          ];
                                    
            }else{
                $res=['msg'=> 'Senha inválida'];
                }

        }else{
            $res=['msg'=> 'Email inválido'];
        }
                
        Header('Access-Control-Allow-Origin: *'); 
        Header('Access-Control-Allow-Headers: *'); 
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); 
        
        return $this->respond($res);
    }
    
     
  
   
}
