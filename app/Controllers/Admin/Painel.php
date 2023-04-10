<?php namespace App\Controllers\Admin;
use App\Models\Admin\Todo_model;
use CodeIgniter\Controller;

class Painel extends Controller{
    protected $helpers = ['auth','Funcoes'];
    public function index()    {

        $freeToGO = pageAutorize(255);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model_todo     = new Todo_model();
            
        $session = session();
        $id_user = $session->get('id');

        $data['title'] = "Painel Principal";   
        $data['todo']  = $model_todo->getDados($id_user);
        
        
        return view('admin/painel/index', $data);
        
    }
}