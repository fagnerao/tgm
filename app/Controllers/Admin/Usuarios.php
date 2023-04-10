<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Usuarios extends Controller{

    protected $helpers = ['auth','Funcoes', 'form'];

    public function index()    {

        $freeToGO = pageAutorize(1);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Usuarios_model();

        $session = session();  
        $id = $session->get('id'); 

        $data['title']    = "Listagem de Usuarios";
        $data['usuarios'] = $model->getDados();
       
        return view('admin/usuarios/index', $data);
        
    }


    public function create($id=NULL) {

        $freeToGO = pageAutorize(1);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Usuarios_model();
        $data['title']    = "Editar Usuario";
        $data['usuario']  = $model->getDados($id);
        $data['groups']   = $model->getGroups();
        
        return view('admin/usuarios/modulo' ,$data);
       
    }



    public function core() {

        $freeToGO = pageAutorize(1);
            if(!$freeToGO){
               setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

            $senha = $this->request->getVar('password');
                    $id = $this->request->getVar('id');

            if(!empty($senha)) {
                $rules = [
                    'name'          => 'required|min_length[2]|max_length[50]',
                    'password'      => 'required|min_length[4]|max_length[50]',
                    'confirm_password'     => 'matches[password]',
                ];
            }else{
                $rules = [ 'name'  => 'required|min_length[2]|max_length[50]'];
            }
       
        if($this->validate($rules)){
            
            $model = new \App\Models\Admin\Usuarios_model();

            $dataUser = [
                'id'         => $this->request->getVar('id'),
                'name'       => $this->request->getVar('name'),
                'nascimento' => $this->request->getVar('nascimento'),
            ];

            if($senha) {
                $dataUser['password'] = password_hash(($senha), PASSWORD_DEFAULT);
            }

            $group = array_sum($this->request->getVar('group'));
            $model->save($dataUser);

                     
            $db = \Config\Database::connect();
            $db = db_connect();
            $sql = "UPDATE `vz_usersgroup` SET `id_group`=".$group." WHERE `id_user`=".$id."";
            $db->query($sql);

          
            setMsg('msg','Registro atualizado' , 'sucesso');
            return redirect()->to(base_url().'/admin/usuarios/create/'.$id); 

        }else{
            setMsg('msg','Os dados não foram validados' , 'erro');
            return redirect()->to(base_url().'/admin/usuarios/create/'.$id); 
        }
          
    
    }

    public function del($id=NULL) {

        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }
        
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $model = new \App\Models\Admin\Usuarios_model();
        
        if ($model->delete($id)){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }

}