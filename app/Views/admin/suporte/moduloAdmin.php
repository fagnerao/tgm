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
            <a href="<?= base_url('admin/suporte') ?>" class="btn btn-info m-2 float-right" style="margin-top:30px">Voltar </a>
        </div>
        <div class="card-body">
            <?php $session = session();
            echo $session->msg ?>

            <form class="form-horizontal" method="post" action="<?= base_url('Admin/suporte/coreAdmin') ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputFirstname">Solicitante</label>
                        <input type="hidden" value="<?= ($suporte != NULL ? $suporte[0]->id : ''); ?>" name="id">
                        <input type="hidden" value="<?= ($suporte != NULL ? $suporte[0]->id_user : ''); ?>" name="id_user">
                        <h3><?= ($suporte != NULL ? $suporte[0]->nameUser :"") ?> </h3>
                    </div>
                   <hr>
                   
                   
                </div>
               
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="">Status</label>
                        <select name='status' class='form-control'>
                            <option value='<?= ($suporte != NULL ? $suporte[0]->status :"" )?>' selected><?= ($suporte != NULL ? $suporte[0]->status:"") ?></option>
                            <option value='Criada'>Criada</option>
                            <option value='Recebida'>Recebida</option>
                            <option value='Em processamento'>Em processamento</option>
                            <option value='Finalizada'> Finalizada</option>
                        </select>
                    </div>
                    <div class="col-sm-12"  <?= ($solicitante==1) ? '' : 'd-none' ?>>
                        <label for="inputCity">Resposta</label>
                        <textarea type="text" class="form-control " rows='5' name="resposta"  <?= ($solicitante==1) ? '' : 'disabled' ?>>
                            <?= ($suporte != NULL ? $suporte[0]->resposta : ''); ?>
                        </textarea>
                    </div>
                </div>
                <div class="col-sm-5 alert alert-info">
                    
                    <?php if (!empty($suporte[0]->file)) { ?>
                        <a href="<?= base_url()?>/uploads/suporte/<?= $suporte[0]->file ?>"  style="color:#000"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Anexo </a>
                    <?php } ?>
                </div>
                
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary m-2" style="margin-top:30px">Atualizar
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>