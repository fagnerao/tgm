<?php 
namespace App\Models\Front;

use CodeIgniter\Model;

class Pagina_model extends Model{

    protected $table      = 'paginas';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id','titulo','texto','slug','imagem','ativo','id_categoria'];

    // Dates 
    protected $useSoftDeletes = true;
    protected $useTimestamps = true; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 


    public function getDados($id=NULL) {

        if($id===NULL){
            return $this->findAll();
        }
        return $this->asArray()->where(['id'=>$id])->first();
    }

    
    public function getNews($id,$limite,$ordem){
       
        return $this->db->table('paginas')
        ->select('paginas.*, gallery.file')
        ->join('gallery', 'paginas.id = gallery.page_id','left')
        ->where( array('paginas.ativo'=> 1, 'paginas.id_categoria'=>$id, 'gallery.is_main'=>1))
        ->orderBy('id', $ordem)
        ->limit($limite)
        ->get()->getResultObject();
    }

    public function getComunicados($id,$limite,$ordem){
       
        return $this->where( array('ativo'=> 1, 'id_categoria'=>$id, 'deleted_at ='=>0))
        ->orderBy('id', $ordem)
        ->limit($limite)
        ->get()->getResultObject();
    }

    public function getSlug($slug){
       
        return $this->db->table('paginas')
        ->select('paginas.*,
                categorias.nome as categoria,
                categorias.slug as cat_slug,
                categorias.id_pai,gallery.file
                ')
        ->join('categorias', 'categorias.id = paginas.id_categoria','left')
        ->join('gallery', 'paginas.id = gallery.page_id','left')
        ->where( array('paginas.ativo'=> 1, 'paginas.slug'=>$slug))
        ->get()->getResultObject();
    }

    public function getNewsCat($slug){
       
        return $this->db->table('paginas')
        ->select('paginas.*,
                categorias.nome as categoria,
                categorias.slug as cat_slug,
                categorias.id_pai,
                gallery.file
                ')
        ->join('categorias', 'categorias.id = paginas.id_categoria','left')
        ->join('gallery', 'paginas.id = gallery.page_id','left')
        ->where( array('paginas.ativo'=> 1, 'categorias.slug'=>$slug))
        ->get()->getResultObject();
    }
  
      
    public function getTexto($id){
        return $this->db->table('paginas')
        ->select('paginas.*,gallery.file, gallery.title')
        ->join('categorias', 'categorias.id = paginas.id_categoria','left')
        ->join('gallery', 'paginas.id = gallery.page_id','left')
        ->where( array('paginas.ativo'=> 1, 'paginas.id'=>$id))
        ->orderBy('id', 'desc')
        ->get()->getResultObject();
      }
      
    public function getGaleria($id){
        return $this->db->table('gallery')
        ->where( array('page_id'=> $id))
        ->get()->getResultObject();
      }

     

    public function getMaisLidas($id,$limite,$ordem){
        return $this->db->table('paginas')
        ->select('paginas.*,
                categorias.nome as categoria,
                categorias.slug as cat_slug,
                categorias.id_pai
                ')
        ->join('categorias', 'categorias.id = paginas.id_categoria','left')
        ->where( 'categorias.id>=',$id)
        ->orderBy('visitas',$ordem)
        ->limit($limite)
        ->get()->getResultObject();
      }

    public function addVisitas($slug){
       
        return $this->db->table('paginas')
        ->where( 'slug',$slug)
        ->set('visitas', '`visitas`+ 1',FALSE)
        ->update();
      }

      public function getAll($id,$limite){
        
        return $this->db->table('paginas')
        ->select('paginas.*,
                categorias.nome as categoria,
                categorias.slug as cat_slug,
                categorias.id_pai
                ')
        ->join('categorias', 'categorias.id = paginas.id_categoria','left')
        ->where( array('paginas.ativo'=> 1, 'categorias.id'=>$id))
        ->orderBy('id', 'desc')
        ->limit($limite)
        ->get()->getResultObject();
    }
    
    
        public function getPesquisa($pesquisa=null){
       
            if(empty($pesquisa)){

                return $this->db->table('paginas')
                ->select('paginas.*,
                    categorias.nome as categoria,
                    categorias.slug as cat_slug,
                    categorias.id_pai,gallery.file
                    ')
                ->join('categorias', 'categorias.id = paginas.id_categoria','left')
                ->join('gallery', 'paginas.id = gallery.page_id','left')
                ->where( array('paginas.ativo'=> 1))
                ->get()->getResultObject();
            }
            else{
                return $this->db->table('paginas')
                ->select('paginas.*,
                    categorias.nome as categoria,
                    categorias.slug as cat_slug,
                    categorias.id_pai
                    ')
                ->join('categorias', 'categorias.id = paginas.id_categoria','left')
                ->where('paginas.ativo', 1)
                ->like('paginas.titulo', $pesquisa,'both')
                ->orLike('paginas.texto', $pesquisa,'both')
                ->get()->getResultObject();
            }
        }


}

