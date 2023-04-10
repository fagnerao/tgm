<?php

namespace App\Controllers\Front;
use \App\Models\Front\Categorias_model;

use CodeIgniter\API\ResponseTrait;

class Response extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Categorias_model();
        $categorias  = $model->getDados();

        // Respond with 201 status code
        return $this->respond($categorias, 200);
    }
}