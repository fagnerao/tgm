<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Configuracao extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
    
        public function index() {
            $freeToGO = pageAutorize(11);
            if(!$freeToGO){
                    setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

            $model = new \App\Models\Admin\Configuracao_model();
            $data = ['config' => $model->doCreate('1'),
                     'title'  => "Configurações",
            ];
            
            return view('admin/configuracao/index',$data);
           
    }

   
    public function core() {

        $freeToGO = pageAutorize(11);
        if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Configuracao_model();
        $rules=['empresa' => 'required' ];
        $img  = $this->request->getFile('logo');
        $nome=null;

        if (isset($img)){
            if ($img->isValid() && ! $img->hasMoved())
            {
                 $nome = $img->getRandomName();
                 $img->move('uploads/', $nome);
            };
           
        } 
        $dados=[
            'id'             => $this->request->getVar('id'),
            'empresa'        => $this->request->getVar('empresa'),
            'endereco'       => $this->request->getVar('endereco'),
            'cidade'         => $this->request->getVar('cidade'),
            'bairro'         => $this->request->getVar('bairro'),
            'email'          => $this->request->getVar('email'),
            'estado'         => $this->request->getVar('estado'),
            'telefone'       => $this->request->getVar('telefone'),
            'whatsapp'       => $this->request->getVar('whatsapp'),
            'instagram'      => $this->request->getVar('instagram'),
            'facebook'       => $this->request->getVar('facebook'),
            'youtube'        => $this->request->getVar('youtube'),
            'complemento'    => $this->request->getVar('complemento'),
            'cep'            => $this->request->getVar('cep'),
            'meta_descricao' => $this->request->getVar('meta_descricao'),
            'msg_topo'       => $this->request->getVar('msg_topo'),
           
        ];
       
        if(isset($nome)){
            $dados['logo'] = $nome;
        }
      
        if ($this->validate($rules)){
            $model->save($dados);

        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');    
        }

        $session = session();
        $session->setFlashdata('msg', '<div class="alert alert-success w-75 mx-auto" role="alert">Registro atualizado com sucesso !</div>');
    
        return redirect()->to(base_url('/admin/configuracao/')); 

    }

   
}


