<?= $this->extend('admin/template/index.php') ?>
<?= $this->section('content') ?>

<div class="row page-titles mx-0">
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
            <form class="form-horizontal" method="post" action="<?= base_url('admin/documentos/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputFirstname">Título</label>
                                <input type="hidden" value="<?= ($documento != NULL ? $documento->id : ''); ?>" name="id">
                                <input type="text" value="<?= ($documento != NULL ? $documento->titulo : ''); ?>" class="form-control" name="titulo"  required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputState">Departamento</label>
                                <select name='id_dep' class='form-control'>
                                    <?php
                                     $db      = \Config\Database::connect();
                                     $builder = $db->table('int_departamentos');
                                     $dep     = $builder->get()->getResult();
                                     foreach ( $dep as $d){ 
                                    ?>
                                    <option value='<?= $d->id ?>' <?= (isset($documento) && ($d->id == $documento->id_dep) ? 'selected=""' : '') ?>> <?= $d->nome ?></option>
                                    <?php   }  ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>