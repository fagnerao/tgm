<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Banners_model extends Model{
    protected $table      = 'banners';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','titulo','link','imagem','local','ativo'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->asObject()->findAll();
        }
        return $this->where('id',$id)->asObject()->first();
    }

    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }

    public function getBanners($local=NULL,$limite=NULL) {

        return $this->where(['local'=>$local,'ativo'=>1])->limit($limite)->findAll();
    }
        
}

