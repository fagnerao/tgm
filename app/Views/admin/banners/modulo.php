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
            <?php $session = session();     echo $session->msg ?>
            <form class="form-horizontal" method="post" action="<?= base_url('admin/banners/core') ?>" enctype="multipart/form-data">
              
                        <div class="col-md-12 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="inputState">Título</label>
                                    <input type="hidden" value="<?= ($banners != NULL ? $banners->id : ''); ?>" class="form-control" name="id">
                                    <input type="text" value="<?= ($banners != NULL ? $banners->titulo : ''); ?>" class="form-control" name="titulo" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Link</label>
                                   
                                    <input type="text" value="<?= ($banners != NULL ? $banners->link : ''); ?>" class="form-control" name="link" placeholder="Link">
                                </div>
                                <div class="col-sm-2">
                                    <label for="inputFirstname">Local</label>
                                    <select name='local' class='form-control'>
                                        <option value='1' <?= (!empty($banners) && ($banners->local == 1) ? 'selected="" class="bg-info"' : '') ?>> Banner Topo </option>
                                        <option value='2' <?= (!empty($banners) && ($banners->local == 2) ? 'selected="" class="bg-info"' : '') ?>> PopUp </option>
                                        <option value='3' <?= (!empty($banners) && ($banners->local == 3) ? 'selected="" class="bg-info"' : '') ?>> Banner Meio</option>
                                        

                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="inputFirstname">Ativo</label>
                                    <select name='ativo' class='form-control'>
                                        <option value='1' <?= (!empty($banners) && ($banners->ativo == 1) ? 'selected="" class="bg-info"' : '') ?>> Sim </option>
                                        <option value='0' <?= (!empty($banners) && ($banners->ativo == 0) ? 'selected="" class="bg-info"' : '') ?>> Não </option>
                                    </select>
                                </div>

                                <div class="col-sm-5">
                                    <label for="inputAddressLine1">Imagem</label>
                                    <input type="file" class="form-control" name="imagem" placeholder=""><br>
                                    <?php if (isset($banners->imagem)) { ?>
                                        <img src="../../../uploads/banners/<?= $banners->imagem ?>" class="img-fluid" title="Imagem atual">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary mt-5">Salvar</button>
                                </div>
                            </div>
                        </div>
                
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>