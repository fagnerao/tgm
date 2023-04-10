<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Exames_model extends Model{
    protected $table      = 'exame';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = [    	
        'id',
        'nome',
        'ativo',
        ];

        public function getDados($id=NULL) {

            if($id===NULL){
                return $this->orderBy('nome','asc')->findAll();
            }
            else{
            return $this->asObject()->where(['id'=>$id])->first();
            }
        }

        
}
