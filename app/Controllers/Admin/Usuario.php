<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Usuario extends Controller{

    protected $helpers = ['auth','Funcoes'];

    public function index()    {

        $freeToGO = pageAutorize(255);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Usuario_model();

        $session = session();  
        $id = $session->get('id'); 

        $data['title'] = "Meus Dados";   
        $data['dados'] = $model->getDados($id); 
       
            return view('admin/usuario/index', $data);
        
    }

    public function core() {
        $freeToGO = pageAutorize(255);
            if(!$freeToGO){
               setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        helper(['form']);
            $senha = $this->request->getVar('password');
            $id = $this->request->getVar('id');
            if(!empty($senha)) {
                $rules = [
                    'name'          => 'required|min_length[2]|max_length[50]',
                    'password'      => 'required|min_length[4]|max_length[50]',
                    'password2'     => 'matches[password]',
                ];
            }else{
                
                $rules = [ 'name'  => 'required|min_length[2]|max_length[50]'];
            }
           
            if($this->validate($rules)){
                
                $data = [
                    'name' => $this->request->getVar('name'),
                    'nascimento' => $this->request->getVar('nascimento'),
                ];

                if(!empty($senha)) {
                    $data['password']= password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                }

                $db = \Config\Database::connect();
                $builder = $db->table('vz_users');
                $builder->where('id', $id);
                $builder->update($data);
                
                setMsg('msg','Dados atualizados' , 'sucesso');
                return redirect()->to('/admin/usuario');

            }else{

                            
                setMsg('msg',"Dados não validados", 'erro');
                return redirect()->to('/admin/usuario');
            }
        }

}