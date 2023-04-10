<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class Chat_model extends Model{

    protected $table      = 'messages';
    protected $primaryKey = 'msg_id';
    protected $returnType = 'object';
    protected $allowedFields = ['msg_id','incoming_msg_id','outgoing_msg_id','msg'];

    
    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        return $this->db->table('vz_users')
        ->where('unique_id',$id)->get()->getResultObject();
    }
    
    
          

}

