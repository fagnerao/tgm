<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Arquivos_model extends Model{
    protected $table      = 'int_arquivos';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_user','id_doc','titulo', 'file','created_at','updated_at','deleted_at'];
   
    // Dates 
    protected $useSoftDeletes = true;
    protected $useTimestamps = true; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 


    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->asObject()->findAll();
        }
        return $this->where('id_doc',$id)->asObject()->findAll();
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }

     

    
}

