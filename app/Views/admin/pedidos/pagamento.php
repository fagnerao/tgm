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
            <h4 class="card-title"><?= $title ?> </h4>
        </div>
        <div class="card-body row">
            <?php $session = session();      echo $session->msg ?>
            <div class="respostaSis col-12"></div>
            <div class="col-md-12 tela-checkout">
                <h2 class="text-center" style="padding-bottom:20px">
                <?php
                    $model = model('App\Models\Admin\Servicos_model');
                    $tipo   = $model->getDados($pedido[0]->tipo); ?>
                    <?= $tipo->nome ?></h2>
                <span class="text-pay">
                    Número do Pedido : <?= $pedido[0]->id ?><br>
                    Data: <?= formataDataView($pedido[0]->data_pedido) ?><br>
                    Obervações: <?= $pedido[0]->observacoes ?><br>
                    <hr>
                        <h2 class="text-center">Meus dados</h2>
                    Nome: <?= $pedido[0]->nome ?><br>
                    CPF: <?= $pedido[0]->cpf ?><br>
                    Endereço: <?= $pedido[0]->endereco ?><br>
                    Fone: <?= $pedido[0]->fone ?><br>
                   
                    <input type="hidden" value="<?= str_replace('.', '', $tipo->valor) ?>" id="pedido_valor">
                    <input type="hidden" value="<?= $pedido[0]->id ?>" id="id_pedido">
                    <input type="hidden" value="<?= $pedido[0]->nome ?>" id="nome">
                    <input type="hidden" value="<?= $pedido[0]->cpf ?>" id="cpf">
                    <input type="hidden" value="<?= $pedido[0]->endereco ?>" id="endereco">
                    <input type="hidden" value="<?= $pedido[0]->email ?>" id="email">
                   
                </span>
           
                <div style="text-align: center;">
                <button id="transaction-button" class="btn btn-success btn-lg" style="font-size:20px !important">Pagar <?= formataMoedaReal($tipo->valor, true) ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<script src="<?= base_url() ?>/pagarme/js/element-helpers.js"> </script>
<script src="<?= base_url() ?>/pagarme/js/transaction-checkout.js"> </script>
<?= $this->endSection('content') ?>