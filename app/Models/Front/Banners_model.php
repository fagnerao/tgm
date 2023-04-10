<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class Banners_model extends Model{

        protected $table      = 'banners';
        protected $primaryKey = 'id';
        
        public function getDados($local){
 
            return $this->db->table('banners')->where(['ativo'=>1,'local'=>$local])->get()->getResultObject();
        }
}