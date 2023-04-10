<?php namespace App\Controllers\Front;
    use CodeIgniter\Controller;
    use App\Models\Front\Telefones_model;
    use App\Models\Front\siteConfig_model;

class Telefones extends Controller

{
    protected $helpers = ['auth','Funcoes'];

	
    public function index()	{
        
        $pesquisa         = $this->request->getVar('pesquisa');

        $model            = new siteConfig_model();
        $model_pagina      = new Telefones_model();
        
        $data = [
            'dados'        => $model->getDados(),
            'telefones'    =>$model_pagina->getPesquisa($pesquisa),
            'pesquisa'     =>$pesquisa
        ];
      


        return view('front/telefones/index', $data);
		
	}

  
   
}
