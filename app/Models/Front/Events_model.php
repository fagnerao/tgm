<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class Events_model extends Model{

        protected $table      = 'int_events';
        protected $returnType = 'object';
        protected $primaryKey = 'id';
        protected $allowedFields = [    	
            'id',
            'title',
            'start',
            'end',
           'private',
           'id_user'
            ];
        
        public function getDados($id_user){
 
            if ($id_user===0){
                return $this->where('id_user',0)->get()->getResultObject();
            }else{

                return $this->where('id_user',0)
                ->orWhere('id_user',$id_user)
                ->get()->getResultObject();
            }
           
        }

      
        
    
}