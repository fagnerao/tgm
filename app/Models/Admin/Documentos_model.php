<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Documentos_model extends Model{
    protected $table      = 'int_documentos';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_dep','titulo'];
   

    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->db->table('int_documentos')
            ->select('int_documentos.*, int_departamentos.nome as depName')
            ->join('int_departamentos', 'int_departamentos.id = int_documentos.id_dep','left')
            ->get()->getResultObject();
        }
        
        return $this->db->table('int_documentos')
        ->select('int_documentos.*, int_departamentos.nome as depName')
        ->join('int_departamentos', 'int_departamentos.id = int_documentos.id_dep','left')
        ->where('int_documentos.id',$id)
        ->get()->getResultObject();
    }


      
    public function doCreate($id=NULL) {
  
        return $this->where(['id'=>$id])->first();

    }

     

    
}

