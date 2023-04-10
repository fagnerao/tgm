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
            <a href="<?= base_url('admin/paginas') ?>" class="btn btn-info m-2 float-right" style="margin-top:30px">Voltar </a>
        </div>
        <div class="card-body">
            <?php $session = session();
            echo $session->msg ?>

            <form class="form-horizontal" method="post" action="<?= base_url('Admin/Paginas/core') ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="inputFirstname">Título</label>
                        <input type="hidden" value="<?= ($conteudo != NULL ? $conteudo->id : ''); ?>" name="id">
                        <input type="text" value="<?= ($conteudo != NULL ? $conteudo->titulo : ''); ?>" class="form-control" id="" name="titulo" placeholder="Título" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Categoria</label>
                        <select name='id_categoria' class='form-control'>
                            <?php
                            $model = model('App\Models\Admin\Categorias_model');
                            $cat   = $model->getDados();
                            foreach ($cat as $cat) { ?>
                                <option value='<?= $cat->id ?>' <?= (isset($conteudo) && ($cat->id == $conteudo->id_categoria) ? 'selected=""' : '') ?>>
                                    <?= $cat->nome ?> </option>
                            <?php   }  ?>
                        </select>

                    </div>
                    <div class="col-sm-2">
                        <label for="inputFirstname">Ativo</label>
                        <select name='ativo' class='form-control'>
                            <option value='1' <?= (!empty($conteudo) && ($conteudo->ativo == 1) ? 'selected=""' : '') ?>>
                                Sim </option>
                            <option value='0' <?= (!empty($conteudo) && ($conteudo->ativo == 0) ? 'selected=""' : '') ?>>
                                Não </option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputCity">Conteúdo</label>
                        <textarea type="text" class="form-control summernote" name="texto" required>
                                <?= ($conteudo != NULL ? $conteudo->texto : ''); ?>
                            </textarea>
                    </div>
                </div>
                <?php if (isset($conteudo->id)) { ?>
                    <div class="form-group row">
                        <?php if (isset($conteudo->id)) { ?>
                            <h3 class="container">Criar Galeria de Imagens</h3>
                            <div class="col-sm-12">
                                <!-- file input -->
                                <input type="file" name="files" class="gallery_media" data-page-id="<?= $conteudo->id  ?>">

                            </div>

                        <?php } ?>

                    </div>
                <?php } ?>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary m-2" style="margin-top:30px">Salvar
                        Página</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>