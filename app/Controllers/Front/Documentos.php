<?php namespace App\Controllers\Front;
    use CodeIgniter\Controller;
    use App\Models\Front\Documentos_model;
    use App\Models\Front\siteConfig_model;

class Documentos extends Controller

{
    protected $helpers = ['auth','Funcoes'];

	
    public function index()	{
        
        $pesquisa         = $this->request->getVar('pesquisa');

        $model            = new siteConfig_model();
        $model_docs       = new Documentos_model();
        
        $data = [
            'dados'        => $model->getDados(),
            'documentos'   =>$model_docs->getPesquisa($pesquisa),
            'pesquisa'     =>$pesquisa
        ];

         
        return view('front/documentos/index', $data);
		
	}


    public function getFiles($id=NULL) {

        if ($this->request->isAJAX()) {
            $id   = service('request')->getPost('id');
        } 

        $model  = new Documentos_model();
        $data = $model->getFiles($id);

        print json_encode($data);

    }

    public function detalhes($id=NULL) {

        $file = $this->request->uri->getSegment(2); 

        $model            = new siteConfig_model();

        $data = [
            'dados'       => $model->getDados(),
            'menu'        => $model->getLinks(),
            'file'=>$file,
        ];

        return view('front/documentos/detalhes', $data);

    }

 
   
}
