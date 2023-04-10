<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Servicos_model extends Model{
    protected $table      = 'servicos';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = [    	
        'id',
        'nome',
        'valor',
        'ativo',
        ];

        public function getDados($id=NULL) {

            if($id===NULL){
                return $this->findAll();
            }
            else{
            return $this->asObject()->where(['id'=>$id])->first();
            }
        }
      
}
