<?= $this->extend('admin/template/index.php') ?>
<?= $this->section('content') ?>

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
       
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Inicio</a></li>
            <li class="breadcrumb-item active"><a href=""></a><?= $title ?></li>
        </ol>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $title ?></h4>
        </div>
        <div class="card-body">
        <?php  $session = session();  echo $session->msg ?>
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Obervações</th>
                            <th></th>
                            <th>Data Pedido</th>
                            <th>Status</th>
                            <th>Boleto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pedidos as $p){ ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td>
                         
                            <?php 
                                $model = model('App\Models\Admin\Servicos_model');
                                $tipo   = $model->getDados($p->tipo); ?>
                                <?= $tipo->nome ?>
                            </td>
                            <td><?= formataMoedaReal($tipo->valor, true) ?></td>
                            <td><?= $p->observacoes ?></td>
                            <td><?= (!empty($p->imagem))? '<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-file-image-o"></i></button>':'' ?></td>
                            <td><?= formataDataView($p->data_pedido) ?></td>
                            <td>
                            <?php switch ($p->status) {
                            
                            case '0':
                                echo '<a href="/pagamento/'.$p->id.'" class="button btn btn-info">Pagar</button>';
                                break;
                            case 'waiting_payment':
                                echo '<div class="alert alert-warning solid">Aguardando Pagamento</div>';
                                break;
                            case 'paid':
                                echo '<div class="alert alert-success solid">Pago</div>';
                                break;
                            case 'refounded':
                                echo '<div class="alert alert-info">Estornado</div>';
                                break;
                            case 'with_error':
                                echo '<div class="alert alert-danger solid">Erro</div>';
                                break;
                          
                        } ?>   
                                                 
                            </td>
                            <td><?= (!empty($p->boleto))? '<a href="'.$p->boleto.' target="_blank" class="btn btn-info btn-rounded"><i class="fa fa-link"></i></a>':'' ?></td>
                           
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Receita</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"><img src="<?=base_url('uploads/receitas/'.$p->imagem)?>"></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<script src="<?= base_url()?>/pagarme/js/element-helpers.js"> </script>
<script src="<?= base_url()?>/pagarme/js/transaction-checkout.js"> </script>
<?= $this->endSection('content') ?>