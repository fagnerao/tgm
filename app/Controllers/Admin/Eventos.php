<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Eventos extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(11);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }
      
        $model = new \App\Models\Admin\Eventos_model();
        $data = ['eventos' => $model->getDados(),
                 'title' => 'Minha Agenda',
        ];
       

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/eventos/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Eventos_model();
        $data = [
            'evento'   => $model->doCreate($id),
            'title'    => "Editar/Criar Evento",
        ];
          
        return view('admin/eventos/modulo' ,$data);
      
    }


    public function core() {

     
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $private = $this->request->getVar('private');

        if ($private=='1'){
            $session = session();
            $id_user = $session->get('id');
            $color = '#f5634a';
        }else{
            $color = '#7ed321';
            $id_user = 0;
        }

        $model = new \App\Models\Admin\Eventos_model();
        $rules=['title' => 'required' ];
      
        if ($this->validate($rules)){
            $dados_salvar['id']      = $this->request->getVar('id');
            $dados_salvar['id_user'] = $id_user;
            $dados_salvar['title']   = $this->request->getVar('title');
            $dados_salvar['start']   = $this->request->getVar('start');
            $dados_salvar['end']     = $this->request->getVar('end');
            $dados_salvar['color']   = $color;
            $dados_salvar['private'] = $this->request->getVar('private');

            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }
        setMsg('msg', 'Registro atualizado com sucesso','sucesso');
    
        return redirect()->to(base_url().'/admin/eventos'); 

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
        $db      = \Config\Database::connect();
        $builder = $db->table('int_events');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}


