<?php namespace App\Controllers\Front;
use CodeIgniter\Controller;
use App\Models\Front\siteConfig_model;
use App\Models\Front\Pagina_model;

class Pesquisa extends Controller
{
    
    
    protected $helpers = ['auth','Funcoes','text'];

    public function index()	{
        
        
        $pesquisa         = $this->request->getVar('pesquisa');

        $model            = new siteConfig_model();
        $model_pagina      = new Pagina_model();
        
        $data = [
            'dados'        => $model->getDados(),
            'resultado'    => $model_pagina->getPesquisa($pesquisa),
            'pesquisa'     => $pesquisa
        ];
      
        return view('front/pesquisa/index', $data);
		
	}

	
   
}
