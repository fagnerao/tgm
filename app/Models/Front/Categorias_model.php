<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class categorias_model extends Model{

        protected $table      = 'categorias';
        protected $primaryKey = 'id';
        
        public function getDados(){
 
            return $this->asObject()->where(array('ativo'=>'1', 'id>'=>1))->findAll();
           
        }

      
        public function getNewsCat($id,$limite,$ordem){
        
            return $this->db->table('paginas')
            ->select('paginas.*,
                    categorias.nome as categoria,
                    categorias.slug as cat_slug,
                    categorias.id_pai,gallery.file
                    ')
            ->join('categorias', 'categorias.id = paginas.id_categoria','left')
            ->join('gallery', 'paginas.id = gallery.page_id','left')
            ->where( array('paginas.ativo'=> 1, 'categorias.slug'=>$id))
            ->orderBy('id', $ordem)
            ->limit($limite)
            ->get()->getResultObject();
        }

        public function getServicos($id=NULL) {

                return $this->db->table('paginas')
                ->where( array('ativo'=> 1, 'id_categoria'=>$id))
                ->orderBy('titulo', 'asc')
                ->get()->getResultObject();
            }

        public function getServicosTotais($id=NULL) {

                return $this->db->table('paginas')
                ->select('paginas.*,categorias.nome')
                ->join('categorias', 'categorias.id = paginas.id_categoria','left')
                ->where( array('paginas.ativo'=> 1, 'paginas.id_categoria'=>$id))
                ->get()->getResultObject();
            }
    
}