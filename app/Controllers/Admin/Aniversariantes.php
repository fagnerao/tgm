<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Aniversariantes extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(31);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        

        $model = new \App\Models\Admin\Aniversariantes_model();
        $data = ['aniversariantes' => $model->getDados(),
                 'title' => 'Lista de Aniversariantes',
        ];
    

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/aniversariantes/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(31);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Aniversariantes_model();
        $data = [
            'aniversariante' => $model->doCreate($id),
            'title'    => "Editar/Criar Aniversário",
        ];
          
        return view('admin/aniversariantes/modulo' ,$data);
      
    }


    public function core() {
        
        $freeToGO = pageAutorize(31);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Aniversariantes_model();
        $rules=['nome' => 'required' ];
      
        if ($this->validate($rules)){
            $dados_salvar['id']           = $this->request->getVar('id');
            $dados_salvar['nome']         = $this->request->getVar('nome');
            $dados_salvar['data']         = $this->request->getVar('data');
       

            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }
        setMsg('msg', 'Registro atualizado com sucesso','sucesso');
    
        return redirect()->to(base_url().'/admin/aniversariantes'); 

    }

    public function del($id=NULL) {
        $freeToGO = pageAutorize(31);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_aniversariantes');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}


