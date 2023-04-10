<?php namespace App\Controllers\Front;
    use CodeIgniter\Controller;
    use App\Models\Front\Pagina_model;
    use App\Models\Front\Telefones_model;
    use App\Models\Front\siteConfig_model;
    use \App\Models\Front\Shop\GetDados_model;

class Pagina extends Controller

{
    protected $helpers = ['auth','Funcoes'];

	public function index($slug=NULL)
	{
        $cart = \Config\Services::cart();    
               
        $model            = new siteConfig_model();
 		$model_pagina     = new Pagina_model();
                
        $slug = $this->request->uri->getSegment(2); 
      
        if (!$slug) {
             return redirect()->to(base_url('/')); 
        }
        $data = [
            'noticia'     => $model_pagina->getSlug($slug),
            'dados'       => $model->getDados(),
            'servicos'    => $model_pagina->getNews(8,30,'ASC'),
        ];
             
        if (!$data['noticia']) {
            return redirect()->to(base_url('/')); 
        }

        $update = $model_pagina->addVisitas($slug);

        return view('front/pagina/index', $data);
    }
    
    public function AllNews()	{

        helper('text','Funcoes');
       
 		$model            = new siteConfig_model();
 		$model_categorias = new Categorias_model();
 		$model_pagina      = new Pagina_model();

        $data = [
            'dados'     => $model->getDados(),
            'menu'      => $model->getLinks(),
            'noticias'  => $model_pagina->getTodas(6,50)
        
        ];
      
        return view('front/pagina/todas', $data);
		
	}

    
   
}
