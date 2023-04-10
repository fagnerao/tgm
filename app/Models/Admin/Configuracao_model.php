<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Configuracao_model extends Model{

    protected $table      = 'config';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','empresa','email','endereco','complemento','bairro','cidade','estado','logo','telefone','cep','facebook','instagram','youtube','whatsapp','meta_descricao','msg_topo'];
   

    public function doCreate($id=NULL) {
  
        return $this->asObject()->where(['id'=>$id])->first();

    }


   
}

