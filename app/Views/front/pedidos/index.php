<?= $this->extend('front/loja/index.php') ?>
<?= $this->section('content') ?>

<div class="row m-t-100 m-b-100">

<?php  $session = session();     echo $session->msg ?>

<div class="table-responsive container">
<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-home"></i> Painel de Controle</a></li>
    <li class="breadcrumb-item active" aria-current="page">Meus pedidos</li>
</ol>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Cliente</th>
                <th scope="col" class="sort" data-sort="data">Data Compra</th>
                <th scope="col" class="sort" data-sort="total">Total </th>
                <th scope="col" class="sort" data-sort="formapg">Forma Pagamento </th>
                <th scope="col" class="sort" data-sort="status">Cód. Rastreio</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col" class="sort" data-sort="status">Produtos</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php  foreach($pedidos as $t){ ?>
            <tr class="p-<?= $t->id_transacao ?>" style="color: #706262;line-height: 25px;">
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="name mb-0 text-sm text-capitalize"><?= $t->username ?></span>
                        </div>
                    </div>
                </th>
                <td>
                    <span class="">
                        <span class=""><?= date('d/m/Y H:i:s', strtotime($t->data_cadastro)) ?></span>
                    </span>
                </td>
                <td>
                    <span class="">
                        <span class=""><?= formataMoedaReal($t->total_pedido, TRUE) ?></span>
                    </span>
                </td>
                <td>
                    <span class="">
                        <span class=""><?= $t->tipo_pagamento ?></span>
                    </span>
                </td>
                <td>
                    <span class="">
                        <span class=""><?= $t->cod_rastreio ?></span>
                    </span>
                </td>
                <td>
                   <span class="badge badge-dot mr-4">
                                  <span class="status">
                                  <?php 
                                  switch ($t->status) {
                                    case 'authorized':
                                        echo '<span class="alert alert-warning alert-sm"> Autorizada</span>';
                                        break;
                                    case 'processing':
                                      echo '<span class="alert alert-info alert-sm"> Processando Pagamento</span>';
                                        break;
                                    case 'waiting_payment':
                                      echo '<span class="alert alert-info alert-sm"> Aguardando Pagamento</span>';
                                        break;
                                    case 'paid':
                                      echo '<span class="alert alert-sucess alert-sm"> Paga</span>';
                                        break;
                                    case 'refunded':
                                      echo '<span class="alert alert-danger alert-sm"> Devolvida </span>';
                                        break;
                                    case 'refused':
                                      echo '<span class="alert alert-danger alert-sm"> Negada</span>';
                                        break;
                                   default :
                                       echo '<span class="alert alert-warning alert-sm"> Desconhecido</span>';
                                    }
                                     ?>
                                  
                                </span>
                </td>

                <td>
                    <span class=" text-center">
                    <a class="dropdown-item" href='/front/pedidos/print/<?=$t->id_transacao ?>' title='Ver detalhes' class='btn btn-primary btn-sm ' target="_blank">
                      <i class="fa fa-print fa-2x text-primary"></i>
                    </a>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>

<?= $this->endSection('content') ?>