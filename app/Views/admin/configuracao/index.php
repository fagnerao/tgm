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
            <?php $session = session();
            echo $session->msg ?>
            <div class="card-body text-default">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>/admin/configuracao/core" enctype="multipart/form-data">
                            <div class="col-md-12 ">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="inputFirstname">Empresa</label>
                                        <input type="hidden" value="1" name="id">
                                        <input type="text" value="<?= ($config != NULL ? $config->empresa : ''); ?>" class="form-control" id="" name="empresa" placeholder="Nome da sua empresa" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inputState">Endereço</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->endereco : ''); ?>" class="form-control" name="endereco" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="inputCity">Bairro</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->bairro : ''); ?>" class="form-control" name="bairro" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputCity">Complemento</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->complemento : ''); ?>" class="form-control" name="complemento" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputCity">Cidade</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->cidade : ''); ?>" class="form-control" name="cidade" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputCity">Estado</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->estado : ''); ?>" class="form-control" name="estado" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="inputCity">Cep</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->cep : ''); ?>" class="form-control" name="cep" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputCity">Telefone</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->telefone : ''); ?>" class="form-control" name="telefone" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputCity">Whatsapp</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->whatsapp : ''); ?>" class="form-control" name="whatsapp" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Email</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->email : ''); ?>" class="form-control" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="inputCity">Instagram</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->instagram : ''); ?>" class="form-control" name="instagram" placeholder="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputCity">Facebook</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->facebook : ''); ?>" class="form-control" name="facebook" placeholder="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputCity">YouTube</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->youtube : ''); ?>" class="form-control" name="youtube" placeholder="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="inputCity">Meta Descrição</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->meta_descricao : ''); ?>" class="form-control" name="meta_descricao" placeholder="Pequena descrição sobre a empresa">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputCity">Msg. Topo</label>
                                        <input type="text" value="<?= ($config != NULL ? $config->msg_topo : ''); ?>" class="form-control" name="   " placeholder="frase do topo do site">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputAddressLine1">Logo da Empresa</label>
                                        <input type="file" class="form-control" name="logo"><br>
                                        <?php if (!empty($config->logo)) { ?>
                                            <img src="../uploads/<?= $config->logo ?>" class="img-fluid" title="Imagem atual">
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary float-right" style="margin-top:30px">Salvar Configurações</button>
                                    </div>
                                </div>
                            </div>
           
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>