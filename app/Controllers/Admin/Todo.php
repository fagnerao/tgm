<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Todo extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(255);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }
      
        $model = new \App\Models\Admin\Todo_model();
        $data = ['eventos' => $model->getDados(),
                 'title' => 'Minha Agenda',
        ];
       

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/eventos/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(255);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Todo_model();
        $data = [
            'evento'   => $model->doCreate($id),
            'title'    => "Editar/Criar Evento",
        ];
          
        return view('admin/eventos/modulo' ,$data);
      
    }


    public function core() {
        
        $freeToGO = pageAutorize(255);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $session = session();
        $id_user = $session->get('id');

        if ($this->request->isAJAX()) {

            $dados_salvar['id_user']= $id_user;
            $dados_salvar['task']   = $this->request->getVar('task');
        }

        $model = new \App\Models\Admin\Todo_model();

        $id = $model->insert($dados_salvar);
        if($id){
            
            $retorno = [
                'erro' => 0,
                'msg'  => 'tarefa inserida',
                'id'   =>$id
                ];
        }else{
            $retorno = [
            'erro' => 10,
            'msg'  => validation_errors()
            ];
        }

        print json_encode($retorno);

    }

    public function update($id=NULL) {
       
        $freeToGO = pageAutorize(255);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
            $done = service('request')->getPost('done');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_todo');
        
        $builder->set('done', $done);
        $builder->where('id', $id);
        $update = $builder->update();

        if ($update){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }


    public function del($id=NULL) {
        $freeToGO = pageAutorize(255);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_todo');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}


