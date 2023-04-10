<?php namespace App\Controllers\Front;
    use CodeIgniter\Controller;
    use App\Models\Front\Categorias_model;
    use App\Models\Front\Pagina_model;
    use App\Models\Front\siteConfig_model;
    use App\Models\Front\Banners_model;

class Categoria extends BaseController
{
    protected $helpers = ['Funcoes','text'];

	public function index()
	{
		
        $model            = new siteConfig_model();
        $model_banner     = new Banners_model();
        $model_pagina     = new Pagina_model();
        $model_categoria  = new Categorias_model();
               
       $slug = $this->request->uri->getSegment(2); 
             
        if (!$slug) {
           
             return redirect()->to(base_url('/')); 
        }

        $data = [
            'dados'       => $model->getDados(),
            'banner_topo'  => $model_banner->getDados('1'),
            'noticias'     => $model_categoria->getNewsCat($slug,20,'desc'),
            'maisLidas'    => $model_pagina->getMaisLidas(7,3,'desc'),
            'menu'         => $model->getLinks(),
        ];
        
    //   echo'<pre>';
    //   print_r($data['noticias']);
    //   echo'</pre>';exit;
        if (!$data['noticias']) {
            return redirect()->to(base_url('/')); 
        }
        
        return view('front/categoria/index', $data);
    }
    
     
  
   
}
