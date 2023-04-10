<?php 
namespace App\Controllers\Front;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\Front\Events_model;

class Events extends Controller{

    use ResponseTrait;

    public function index(){
        
        $id_user = 0;
        
        $session = session();

        if (session()->get('isLoggedIn')){
            $id_user = $session->get('id');
        }
        
        $model = new Events_model();
        $data = $model->getDados($id_user);
        
        return $this->respond($data);
    }



}