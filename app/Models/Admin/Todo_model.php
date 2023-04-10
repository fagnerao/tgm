<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Todo_model extends Model {
    protected $table      = 'int_todo';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_user','task','done'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        else{

            return $this->where(['id_user'=>$id])->findAll();
        }
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   
    
}

