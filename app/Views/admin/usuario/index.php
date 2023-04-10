<?= $this->extend('admin/template/index.php') ?>
<?= $this->section('content') ?>

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Meus dados</a></li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?= $title ?></h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
        <?php  $session = session();  echo $session->msg ?> 
            <form action="<?=base_url('admin/usuario/core')?>" method="POST" >

                <div class="form-row">
                <div class="form-group col-md-4">
                        <label>Nome</label>
                        <input type="hidden" name="id" value="<?= $dados->id ?>" class="form-control" placeholder="">
                        <input type="text" name="name" value="<?= $dados->name ?>"class="form-control" placeholder="Nome" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email : (não editável)</label>
                        <input type="text" name="email" value="<?= $dados->email ?>" class="form-control" placeholder="Email" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Data de Nascimento</label>
                        <input type="date" name="nascimento" value="<?= $dados->nascimento ?>" class="form-control " required>
                    </div>
                </div>
                <div class="form-row">    
                    
                    <div class="form-group col-md-4">
                        <label>Senha</label>
                        <input type="password" name="password" value="" class="form-control  placeholder="senha">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Repetir Senha</label>
                        <input type="password" name="password2" value="" class="form-control" placeholder="repetir senha">
                    </div>
                  
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
<!-- row -->

<?= $this->endSection('content') ?>

