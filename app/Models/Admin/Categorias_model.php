<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Categorias_model extends Model{
    protected $table      = 'categorias';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_pai','nome','slug','imagem','ativo'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->asObject()->findAll();
        }
        return $this->where('id',$id)->asObject()->first();
    }

    public function getCatPai($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   

    
}

