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
            <?php  $session = session();  echo $session->msg ?>
            <div class="col-sm-6">
                    <a href="/admin/paginas/create" class="btn btn-primary m-2" style="margin-top:30px">Nova página</a>
                </div>
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>Ativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($paginas as $p){ ?>
                        <tr class="p-<?= $p->id ?>">
                        <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a class="dropdown-item" href='/admin/paginas/create/<?=$p->id ?>' title='Editar'
                                        class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                    <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;"
                                        data-tr="/admin/paginas/del/" data-id="<?= $p->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                </div>
                            </td>
                            <td><?= $p->titulo ?></td>
                            <td><?php 
                              $model = model('App\Models\Admin\Categorias_model');
                              $cat = $model->getDados($p->id_categoria);
                              if(isset($cat)){
                              echo $cat->nome; 
                              } ?>
                            </td>
                            <td>
                                <?= ($p->ativo==1 ? '<span class="badge badge-success"><i class="fa fa-check"></i></span>' :'<span class="badge badge-info"><i class="fa fa-times"></i></span>') ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<?= $this->endSection('content') ?>