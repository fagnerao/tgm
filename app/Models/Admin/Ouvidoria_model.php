<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Ouvidoria_model extends Model{
    protected $table      = 'int_ouvidoria';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','protocolo','nome','categoria','mensagem','resposta','status','file','created_at','updated_at','deleted_at'];
   
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
        else{

            return $this->where(['protocolo'=>$id])->findAll();
        }
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }

    public function getProtocolo($id=NULL) {
  
        return $this->select('protocolo')->where(['id'=>$id])->first();

    }
   
    public function getProtocoloDados($id=NULL) {
  
        return $this->where(['protocolo'=>$id])->first();

    }
   
    
}

