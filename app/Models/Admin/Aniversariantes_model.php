<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Aniversariantes_model extends Model{
    protected $table      = 'int_aniversariantes';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','nome','data'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->db->table('int_aniversariantes')
            ->get()->getResultObject();
        }
        
        return $this->db->table('int_aniversariantes')
        ->select('int_aniversariantes.*')
        ->where('id',$id)
        ->get()->getResultObject();
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   

    
}

