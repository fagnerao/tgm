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
            <form class="form-horizontal" method="post" action="<?= base_url('admin/eventos/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="inputFirstname">Título</label>
                                <input type="hidden" value="<?= ($evento != NULL ? $evento->id : ''); ?>" name="id">
                                <input type="text" value="<?= ($evento != NULL ? $evento->title : ''); ?>" class="form-control" name="title"  required>
                            </div>
                            <div class="col-sm-3">
                                <label for="inputFirstname">Início</label>
                                <input type="text" value="<?= ($evento != NULL ? $evento->start : ''); ?>" class="form-control input_data_hora" name="start"  required>
                            </div>
                            <div class="col-sm-3">
                                <label for="inputFirstname">Fim</label>
                                <input type="text" value="<?= ($evento != NULL ? $evento->end : ''); ?>" class="form-control input_data_hora" name="end"  required>
                            </div>
                            <div class="col-sm-2">
                                <label for="inputFirstname">Privado</label>
                                <select name='private' class='form-control'>
                                    <option value='1' <?= ($evento->private=="1") ?'selected': ''?>> Sim </option>
                                    <option value='0' <?= ($evento->private=="0") ?'selected': ''?>> Não </option>
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