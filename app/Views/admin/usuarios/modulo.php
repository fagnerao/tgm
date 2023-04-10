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
            <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-info m-2 float-right" style="margin-top:30px">Voltar </a>
        </div>
        <div class="card-body">
            <?php $session = session(); echo $session->msg ?>

            <form class="form-horizontal" method="post" action="<?= base_url('Admin/usuarios/core') ?>">

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Nome</label>
                        <input type="hidden" value="<?= ($usuario[0] != NULL ? $usuario[0]->id : ''); ?>" name="id">
                        <input type="text" value="<?= ($usuario[0] != NULL ? $usuario[0]->name : ''); ?>" class="form-control" id="" name="name" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Data de Nascimento</label>
                        <input type="date" value="<?= ($usuario[0] != NULL ? $usuario[0]->nascimento : ''); ?>" class="form-control" id="" name="nascimento"  required>
                    </div>
                    <div class="col-sm-12 pt-10" style="margin:20px 0 20px 0">
                    <label for="inputState">Tipo de Acesso</label>
                    <div class="" style="display:flex; justify-content: space-evenly;">
                        <?php
                        $group_user = (int)$usuario[0]->id_group;
                        foreach ($groups as $g){ ?>
                        <div class="form-group form-check">
                            <input type="checkbox" name="group[]" class="form-check-input" id="exampleCheck1" value="<?= $g->id ?>" <?= ( $group_user & $g->id)?'checked':'' ?>>
                            <label class="form-check-label" for="exampleCheck1"><?= $g->name ?></label>
                        </div>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Senha</label>
                        <input type="password" value="" class="form-control" name="password"  >
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Confirmar Senha</label>
                        <input type="password" value="" class="form-control" name="confirm_password" >
                    </div>
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