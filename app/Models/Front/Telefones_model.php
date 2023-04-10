<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class Telefones_model extends Model{
    protected $table      = 'int_telefones';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','nsme','departamento','fones'];
   

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

    public function getPesquisa($pesquisa=null){
       
            if(empty($pesquisa)){
                return $this->db->table('int_telefones')
                ->select('int_telefones.*, int_departamentos.nome as depName')
                ->join('int_departamentos', 'int_departamentos.id = int_telefones.departamento','left')
                ->get()->getResultObject();
            }
            else{
                return $this->db->table('int_telefones')
                ->select('int_telefones.*, int_departamentos.nome as depName')
                ->join('int_departamentos', 'int_departamentos.id = int_telefones.departamento','left')
                ->like('int_telefones.name', $pesquisa,'both')
                ->orderBy('name', 'asc')
                ->get()->getResultObject();
            }
        
      }
     
}

