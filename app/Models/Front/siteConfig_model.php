<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class siteConfig_model extends Model{

    protected $table      = 'config';
    protected $primaryKey = 'id';
  
    public function getDados(){
		return $this->asObject()->where('id',1)->first();
    }
    public function getLinks(){
 
     return $this->db->table('categorias')->where('id_pai',7)->get()->getResultObject();
     
  }
  
}

                        