<?php 

namespace App\Controllers\Admin;
use CodeIgniter\API\ResponseTrait;
use App\Models\Admin\Shop\Produtos_model;

class Api extends \CodeIgniter\Controller{

    use ResponseTrait;

    public function index()
    {
        $model = new Produtos_model();
        $data = $model->getDados();
         
        return $this->respond($data);
    }

    public function url()    {

        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://reqres.in/api/users?page=2');

        echo "<pre>";
        $dados = json_decode($response->getBody());
        print_r($dados->data);
             
    }

}