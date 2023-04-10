<?= $this->extend('admin/template/imprimir.php') ?>
<?= $this->section('content') ?>

<style>
.img-li {
    width: 40px;
    border-radius: 10px;
    float: left;
    cursor: pointer;
    height: 30px;
}

.table td,
.table th {
    font-size: 14px !important;
    border-top: 1px solid #cad1d7 !important;
}
</style>
<div class="col-12 text-center">
    <img src='<?= base_url('uploads/'.$configuracoes->logo) ?>' height="90" class="m-2">
</div>
<h3>DADOS DO COMPRADOR</h3>
<div class="row">
    <div class="col-md-12 text-center">
        <table class="table table-striped">
            <tr>
                <td class="text-right">Nome:</td>
                <td class="text-left"><?=  strtoupper($pedido->username) ?></td>
                <td class="text-right">Telefone:</td>
                <td class="text-left"><?=  $pedido->phone ?></td>
                <td class="text-right">CPF:</td>
                <td class="text-left"><?=  $pedido->cpf ?></td>
            </tr>
        </table>

    </div>
</div>

<h3>INFORMACÕES DE ENVIO</h3>
<div class="row">
    <div class="col-md-12 text-center">
        <table class="table table-striped">
            <tr>

                <td>Endereço</td>

            </tr>
            <tr>


                <td><?=  $pedido->endereco ?></td>


            </tr>
        </table>

    </div>
</div>
<h3>DADOS DA TRANSAÇÃO</h3>
<div class="row">
    <div class="col-md-12 text-center">
        <table class="table table-striped">
            <tr>
                <td>Data</td>
                <td>Transação</td>

                <?= ($pedido->tipo_pagamento == 'BOLETO')?'<td>Ver Boleto</td>':'' ?>
                <td>Forma de Pagamento</td>
                <td>Status</td>

            </tr>
            <!-- aqui -->
            <tr>
                <td>
                    <?= date('d/m/Y H:i:s', strtotime($pedido->data_cadastro)) ?>
                </td>
                <td>
                    <?= $pedido->referencia ?>
                </td>

                <?= ($pedido->tipo_pagamento=='BOLETO')? '<td><a href="'.$pedido->boleto.'" target="_blank"> LINK</a></td>':'' ?>
                <td>
                    <?= $pedido->tipo_pagamento ?>
                </td>
                <td>
                    <?php 
				switch ($pedido->status) {
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
                    }?>
                </td>
            </tr>
            <!--qui corrige  -->
        </table>

    </div>
</div>

<h3>ITENS DO PEDIDO</h3>
<div class="row">
    <div class="col-md-12 text-center">
        <table class="table table-striped">
            <tr>
                <td>Ref.</td>
                <td>Descrição</td>
                <td>Atributos</td>
                <td>Quantidade</td>
                <td>Valor unitário</td>
                <td>Valor Total</td>
            </tr>
            <tr>
                <?php 
				 $model = model('App\Models\Transacoes_model');
				
				 $itens   = $model->getItens($pedido->id);
				 
                foreach ($itens as $i) {
            ?>
            <tr>
                <td><?=  $i->id_produto ?></td>
                <td><?=  $i->nome ?></td>
                <td>
                    <?php
				$attr   = $model->getAtributo($i->id_atributo);
                $cor  = explode(":", $attr[0]->cor);
				?>
                    <?=($attr)?$attr[0]->tamanho:''?>
                    &nbsp;&nbsp;|<span style="background:<?=($cor)?$cor[0]:'#fff'?>;border-radius:5px; padding:5px 15px; margin-left:10px"></span>
                </td>
                <td><?=  $i->qtd ?></td>
                <td><?=  formataMoedaReal($i->valor_unit, TRUE) ?></td>
                <td><?=  formataMoedaReal($i->valor_total, TRUE) ?></td>
            </tr>
            <?php  }  ?>
            </tr>
        </table>

    </div>
</div>
<h3>TOTAIS</h3>
<div class="row">
    <div class="col-md-11 float-right">
        <table class="table table-striped font-weight-600">
            <tr>
                <td class='text-right col-10'>TOTAL PRODUTOS.....</td>
                <td><?=  formataMoedaReal($pedido->total_produto, TRUE) ?></td>
            </tr>
            <tr>
                <td class='text-right'>TOTAL FRETE.............</td>
                <td><?=  formataMoedaReal($pedido->total_frete , TRUE) ?></td>
            </tr>
            <tr>
                <td class='text-right'>TOTAL PEDIDO.........</td>
                <td> <?=  formataMoedaReal($pedido->total_pedido , TRUE)  ?></td>
            </tr>
        </table>
    </div>
</div>
<input type="button" class="btn btn-primary float-right" name="imprimir" value="Imprimir" onclick="window.print();">

<?= $this->endSection('content') ?>