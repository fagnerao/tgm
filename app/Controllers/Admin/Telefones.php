<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Telefones extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(11);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        

        $model = new \App\Models\Admin\Telefones_model();
        $data = ['telefones' => $model->getDados(),
                 'title' => 'Lista de Telefones',
        ];
    

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/telefones/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Telefones_model();
        $data = [
            'telefone' => $model->doCreate($id),
            'title'    => "Editar/Criar Telefone",
        ];
          
        return view('admin/telefones/modulo' ,$data);
      
    }


    public function core() {
        
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Telefones_model();
        $rules=['name' => 'required' ];
      
        if ($this->validate($rules)){
            $dados_salvar['id']           = $this->request->getVar('id');
            $dados_salvar['name']         = $this->request->getVar('name');
            $dados_salvar['departamento'] = $this->request->getVar('departamento');
            $dados_salvar['fones']        = $this->request->getVar('fones');

            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }
        setMsg('msg', 'Registro atualizado com sucesso','sucesso');
    
        return redirect()->to(base_url().'/admin/telefones'); 

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
        $builder = $db->table('int_telefones');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}


