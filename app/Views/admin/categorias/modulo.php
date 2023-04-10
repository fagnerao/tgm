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
            <?php $session = session();  echo $session->msg ?>
            <form class="form-horizontal" method="post" action="<?= base_url('admin/categorias/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputFirstname">Título</label>
                                <input type="hidden" value="<?= ($categoria != NULL ? $categoria->id : ''); ?>" name="id">
                                <input type="text" value="<?= ($categoria != NULL ? $categoria->nome : ''); ?>" class="form-control" id="" name="nome" placeholder="Título" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputState">Categoria Pai </label>
                                <select name='id_pai' class='form-control'>
                                    <option value='0'></option>
                                    <?php
                                    foreach ($cat_pai as $c) { ?>
                                        <option value='<?= $c->id ?>' <?= (isset($categoria) && ($c->id == $categoria->id_pai) ? 'selected=""' : '') ?>>
                                            <?= $c->nome ?> </option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputFirstname">Ativo</label>
                                <select name='ativo' class='form-control'>
                                    <option value='1' <?= (!empty($categoria) && ($categoria->ativo == 1) ? 'selected="" class="bg-info"' : '') ?>>
                                        Sim </option>
                                    <option value='0' <?= (!empty($categoria) && ($categoria->ativo == 0) ? 'selected="" class="bg-info"' : '') ?>>
                                        Não </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputAddressLine1">Imagem</label>
                                <input type="file" class="form-control" name="imagem" placeholder=""><br>
                                <?php if (isset($categoria->imagem)) { ?>
                                    <img src="../../../uploads/categorias/<?= $categoria->imagem ?>" class="img-fluid" title="Imagem atual">
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary float-right" style="margin-top:30px">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>

        </div>
    </div>
</div>

<?= $this->endSection('content') ?>