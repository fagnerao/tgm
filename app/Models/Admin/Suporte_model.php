<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Suporte_model extends Model{
    protected $table      = 'int_suporte';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','protocolo','id_user','mensagem','resposta','status','file','created_at','updated_at','deleted_at'];
   
    // Dates 
   protected $useSoftDeletes = true;
   protected $useTimestamps = true; 
   protected $createdField = 'created_at'; 
   protected $updatedField = 'updated_at'; 
   protected $deletedField = 'deleted_at'; 

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->db->table('int_suporte')
            ->select('int_suporte.*, vz_users.name as nameUser,')
            ->join('vz_users', 'vz_users.id = int_suporte.id_user','left')
            ->get()->getResultObject();
        }
        else{
            return $this->db->table('int_suporte')
            ->select('int_suporte.*, vz_users.name as nameUser,')
            ->join('vz_users', 'vz_users.id = int_suporte.id_user','left')
            ->where(['id_user'=>$id])
            ->get()->getResultObject();

        }
    }


      
    public function doCreate($id=NULL) {
  
        return $this->db->table('int_suporte')
            ->select('int_suporte.*, vz_users.name as nameUser,')
            ->join('vz_users', 'vz_users.id = int_suporte.id_user','left')
            ->where(['int_suporte.id'=>$id])
            ->get()->getResultObject();

    }

    public function getProtocolo($id=NULL) {
  
        return $this->select('protocolo')->where(['id'=>$id])->first();

    }
   
    public function getProtocoloDados($id=NULL) {
  
        return $this->where(['protocolo'=>$id])->first();

    }
   
    
}

