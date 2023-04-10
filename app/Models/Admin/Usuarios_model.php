<?php 
namespace App\Models\Admin;  
use CodeIgniter\Model;
  
class Usuarios_model extends Model{
    protected $table = 'vz_users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'unique_id',
        'name',
        'email',
        'password',
        'nascimento',
        'img',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Dates 
   protected $useSoftDeletes = true;
   protected $useTimestamps = true; 
   protected $createdField = 'created_at'; 
   protected $updatedField = 'updated_at'; 
   protected $deletedField = 'deleted_at'; 

    public function getUser($email){
       
        return $this->db->table('vz_users')
        ->select('vz_users.*,vz_usersgroup.*')
        ->join('vz_usersgroup', 'vz_users.id = vz_usersgroup.id_user','left')
        ->where( array('vz_users.email'=>$email,))
        ->limit(1)
        ->get()->getResultObject();
    }

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        return $this->db->table('vz_users')
        ->select('vz_users.*,vz_usersgroup.*')
        ->join('vz_usersgroup', 'vz_users.id = vz_usersgroup.id_user','left')
        ->where( array('vz_users.id'=>$id,))
        ->limit(1)
        ->get()->getResultObject();
    }

    public function getGroups(){
 
        return $this->db->table('vz_groups')
        ->get()->getResultObject();
    }
}




   