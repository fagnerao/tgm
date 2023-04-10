<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Banners extends Controller{

    protected $helpers = ['auth','Funcoes'];
    
    public function index() {
       
        $model = new \App\Models\Admin\Banners_model();
        $data = ['banners' => $model->getDados(),
                'title'    => "Lista de Banners - Marketing"
            ];
    
        return view('admin/banners/index', $data);

    }

    public function create($id=NULL) {
      
        $model = new \App\Models\Admin\Banners_model();
        $data = ['banners' => $model->doCreate($id),
                 'title'    => "Lista de Banners - Marketing"
    ];
        
        return view('admin/banners/modulo' ,$data);

    }

    public function core() {
       
        $model = new \App\Models\Admin\Banners_model();
        $rules=['ativo' => 'required' ];
        $img  = $this->request->getFile('imagem');
       
        $nome = NULL;
        if (isset($img)){
            if ($img->isValid() && ! $img->hasMoved())
            {
                  $nome = $img->getRandomName();
                  $img->move('uploads/banners', $nome);
                };
        }
        
        if ($this->validate($rules)){
        $dados_salvar['id']  = $this->request->getVar('id');
        $dados_salvar['link']    = $this->request->getVar('link');
        $dados_salvar['titulo']  = $this->request->getVar('titulo'); 
        $dados_salvar['local']   = $this->request->getVar('local');
        $dados_salvar['ativo']   = $this->request->getVar('ativo');
           
            if(isset($nome)){
                $dados_salvar['imagem'] = $nome;
            }
               
            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }

        $session = session();
        $session->setFlashdata('msg', 'Registro atualizado com sucesso', 'sucesso');
    
        return redirect()->to(base_url().'/admin/banners'); 

    }

    public function del($id=NULL) {
       
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
}