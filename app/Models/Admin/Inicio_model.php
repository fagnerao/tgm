<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Inicio_model extends Model{
    protected $table      = 'config';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = [    	
        'id',
        ];


    public function getTotais($tabela=NULL)	{
		
		if($tabela){
            return $this->asArray()->from($tabela)->countAll(); 
            
        }
		
    }

}
