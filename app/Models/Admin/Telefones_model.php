<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Telefones_model extends Model{
    protected $table      = 'int_telefones';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','nome','departamento','fones'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->db->table('int_telefones')
            ->select('int_telefones.*, int_departamentos.nome as depName')
            ->join('int_departamentos', 'int_departamentos.id = int_telefones.departamento','left')
            ->get()->getResultObject();
        }
        
        return $this->db->table('int_telefones')
        ->select('int_telefones.*, int_departamentos.nome as depName')
        ->join('int_departamentos', 'int_departamentos.id = int_telefones.departamento','left')
        ->where('int_telefones.id',$id)
        ->get()->getResultObject();
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }
   

    
}

