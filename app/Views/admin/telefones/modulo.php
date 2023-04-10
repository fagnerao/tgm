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
            <form class="form-horizontal" method="post" action="<?= base_url('admin/telefones/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputFirstname">Nome</label>
                                <input type="hidden" value="<?= ($telefone != NULL ? $telefone->id : ''); ?>" name="id">
                                <input type="text" value="<?= ($telefone != NULL ? $telefone->name : ''); ?>" class="form-control" name="name"  required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputState">Departamento</label>
                                <select name='departamento' class='form-control'>
                                    <?php
                                     $db      = \Config\Database::connect();
                                     $builder = $db->table('int_departamentos');
                                     $dep     = $builder->get()->getResult();
                                     foreach ( $dep as $d){ 
                                    ?>
                                    <option value='<?= $d->id ?>' <?= (isset($telefone) && ($d->id == $telefone->departamento) ? 'selected=""' : '') ?>> <?= $d->name ?></option>
                                    <?php   }  ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputFirstname">Fones</label>
                                <input type="text" value="<?= ($telefone != NULL ? $telefone->fones : ''); ?>" class="form-control" name="fones"  required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>