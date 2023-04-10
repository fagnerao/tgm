<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class Categorias extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(11);
            if(!$freeToGO){
                    setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        $model = new \App\Models\Admin\Categorias_model();
        $data = ['categorias' => $model->getDados(),
                 'title' => 'Lista de categorias',
        ];

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/categorias/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Categorias_model();
        $data = [
            'categoria' => $model->doCreate($id),
            'cat_pai'   => $model->getDados(),
            'title'    => "Editar/Criar Categoria",
        ];
          
        return view('admin/categorias/modulo' ,$data);
      
    }


    public function core() {
        
        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Categorias_model();
        $rules=['nome' => 'required' ];
        $img  = $this->request->getFile('imagem');

        $nome = NULL;
        if (isset($img)){
            if ($img->isValid() && ! $img->hasMoved())
            {
                  $nome = $img->getRandomName();
                  $img->move('uploads/categorias', $nome);
                 
                };
        }
       
      
        if ($this->validate($rules)){
            $dados_salvar['id']     = $this->request->getVar('id');
            $dados_salvar['id_pai'] = $this->request->getVar('id_pai');
            $dados_salvar['nome']   = $this->request->getVar('nome');
            $dados_salvar['slug']   = slug($this->request->getVar('nome'));
            $dados_salvar['ativo']  = $this->request->getVar('ativo');

            if(isset($nome)){
                $dados_salvar['imagem'] = $nome;
            }
           
            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }
        sg('msg','Registro atualizado' , 'sucesso');
    
        return redirect()->to(base_url().'/admin/categorias'); 

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
        $builder = $db->table('categorias');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}


