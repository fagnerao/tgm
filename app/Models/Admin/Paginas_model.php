<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Paginas_model extends Model{

    protected $table      = 'paginas';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id','titulo','texto','slug','imagem','ativo','id_categoria','log'];
   
   // Dates 
   protected $useSoftDeletes = true;
   protected $useTimestamps = true; 
   protected $createdField = 'created_at'; 
   protected $updatedField = 'updated_at'; 
   protected $deletedField = 'deleted_at'; 
   
    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        return $this->asObject()->where(['id'=>$id])->first();
    }

    public function doCreate($id=NULL) {
  
        return $this->asObject()->where(['id'=>$id])->first();

    }

    public function getFotosGalerias($id=NULL){
        if ($id) {
            
            return $this->db->table('galerias')
            ->where('id_pagina', $id)
            ->get()->getResultObject();        
        }
    }



   
}

