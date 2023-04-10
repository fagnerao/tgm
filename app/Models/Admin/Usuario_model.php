<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Usuario_model extends Model{
    protected $table      = 'vz_users';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = [    	
        'id',
        'nome',
        'email',
        'password',
       'nascimento'
        ];

public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        return $this->where('id',$id)->first();
    }

    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   
    
}