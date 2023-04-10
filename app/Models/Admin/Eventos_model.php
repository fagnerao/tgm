<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Eventos_model extends Model {
    protected $table      = 'int_events';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_user','title','start','end','color','private'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        else{

            return $this->where(['id'=>$id])->first();
        }
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   
    
}

