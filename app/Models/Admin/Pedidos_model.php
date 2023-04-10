<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

class Pedidos_model extends Model{
    protected $table      = 'pedidos';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = [    	
        'id',
        'tipo',
        'id_usuario',
        'imagem',
        'data_pedido',
        'descricao',
        'observacoes',
        'boleto',
        'payment_method',
        'status',
        'token'
        ];

        public function getDados($id=NULL) {

            if($id===NULL){
                return $this->findAll();
            }else{
                return $this->db->table('pedidos')
                ->select('pedidos.*, users.nome')
                ->join('users', 'users.id = pedidos.id_usuario','left')
                ->get()->getResultObject();
            }
        }
        public function getPedido($id=NULL) {

            if($id===NULL){
                return $this->findAll();
            }
            else{
                return $this->db->table('pedidos')
                ->select('pedidos.*, users.nome,users.cpf, users.email, users.endereco, users.fone')
                ->join('users', 'users.id = pedidos.id_usuario','left')
                ->where(['pedidos.id'=>$id])
                ->get()->getResultObject();
            }
        }


}
