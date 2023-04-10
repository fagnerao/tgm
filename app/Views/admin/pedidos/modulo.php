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
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?= $title ?></h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
        <?php  $session = session();  echo $session->msg ?> 
            <form action="<?=base_url('admin/pedidos/core_receita')?>" method="POST" enctype="multipart/form-data" >

                <div class="form-row">
                <div class="form-group col-md-4">
                        <label>Nome</label>
                        <input type="hidden" name="id" value="<?= user()->id ?>" class="form-control" placeholder="">
                        <input type="text" name="nome" value="<?= user()->nome ?>"class="form-control border-0" placeholder="Nome" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Endereço</label>
                        <input type="text" name="endereco" value="<?= user()->endereco ?>" class="form-control border-0" placeholder="Rua 10, 154" readonly>
                    </div>
                               
                    <div class="form-group col-md-4">
                        <label>Fone</label>
                        <input type="fone" name="fone" value="<?= user()->fone ?>" class="form-control input_telefone border-0" placeholder="Fone" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Descreva o nome do remédio e como é sua receita</label>
                        <input type="text" name="doenca" value="<?= user()->doenca ?>" class="form-control" placeholder="Alergia, Ansiedade..." >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Enviar sua receita antiga</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="imagem">
                                <label class="custom-file-label">Selecionar arquivo</label>
                            </div>
                           
                        </div>
                     </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
<!-- row -->

<?= $this->endSection('content') ?>

