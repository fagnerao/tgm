<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Paginas extends Controller{

    protected $helpers = ['auth','Funcoes'];

    public function index()    {
        $freeToGO = pageAutorize(11);
            if(!$freeToGO){
               setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        $model = new \App\Models\Admin\Paginas_model();

        $data['title'] = "Notícias / Textos Fixos";  
        $data['paginas'] = $model->getDados();  
        
        return view('admin/paginas/index', $data);

    }

    public function create($id=NULL) {

        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Paginas_model();
        $data = [
            'title'    => "Editar/Criar Página",
            'conteudo' => $model->doCreate($id),
        ];

        
        return view('admin/paginas/modulo' ,$data);
       
    }

    public function core() {

        $freeToGO = pageAutorize(11);
            if(!$freeToGO){
               setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        $model = new \App\Models\Admin\Paginas_model();
        $rules=['titulo' => 'required' ];

        $id = $this->request->getVar('id');

            if ($this->validate($rules)){
                $url = $this->request->getVar('titulo');
                
                $dados['titulo']       = $this->request->getVar('titulo');
                $dados['ativo']        = $this->request->getVar('ativo');
                $dados['id_categoria'] = $this->request->getVar('id_categoria');
                $dados['data']         = $this->request->getVar('data');        
                $dados['texto']        = $this->request->getVar('texto');
                $dados['slug']         = slug($this->request->getVar('titulo'));

                $data = date("d-m-Y h:i:sa");
                $id_user = session()->get('id');

                $obj ['id']   = $id_user;
                $obj ['date'] = $data;
                $json = [$obj];

                if (!empty($id)){ 
                    $dados['id']  = $id;
                    $model->save($dados);

                    $db      = \Config\Database::connect();
                    $db->query('Update paginas set log=JSON_ARRAY_APPEND(log, "$", CAST(\'{"id": "'.$id_user.'","date": "'.$data.'"}\' AS JSON)) where id='.$id.'');

                }else { 

                    $dados['log'] = json_encode($json);

                    $id = $model->insert($dados);
                    
                }
                
                setMsg('msg','Registro atualizado' , 'sucesso');
                return redirect()->to(base_url().'/admin/paginas/create/'.$id); 

            }
            else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro ao gravar os registros');    
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
        $model = new \App\Models\Admin\Paginas_model();
        
        if ($model->delete($id)){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }
     

    public function removeGal(){
        if (isset($_POST['file'])) {
            $file = 'uploads/galerias/' . str_replace(array('/', '\\'), '', $_POST['file'] . '.txt');
            
            if(file_exists($file))
                unlink($file);
        }
    }

}



