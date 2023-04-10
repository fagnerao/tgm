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
            <a href="<?=base_url('/admin/categorias/create')?>" class="btn btn-primary col-2"> Nova categoria</a>
        </div>
        <div class="card-body">
            <?php  $session = session();  echo $session->msg ?>
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                          <th scope="col" class="sort" data-sort="status">Opções</th>
                            <th scope="col" class="sort" data-sort="name">Titulo</th>
                            <th scope="col" class="sort" data-sort="status">Categoria Pai</th>
                            <th scope="col" class="sort" data-sort="status">Ativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($categorias as $cat){ ?>
                        <tr class="p-<?= $cat->id ?>">
                        <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a class="dropdown-item" href='/admin/categorias/create/<?=$cat->id ?>' title='Editar'
                                        class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                    <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;"
                                        data-tr="/admin/categorias/del/" data-id="<?= $cat->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                </div>
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><?= $cat->nome ?></span>
                                    </div>
                                </div>
                            </th>

                            <td class="budget">
                                <?php 
                              $model = model('App\Models\Admin\Categorias_model');
                               $cat_pai = $model->getCatPai($cat->id_pai);
                              if($cat_pai){
                               echo $cat_pai->nome;
                              }
                                ?>
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">
                                    <span
                                        class="status"><?= ($cat->ativo ==1 ?'<span class="alert alert-success alert-sm"><i class="fa fa-check"></i></span>' :'<span class="alert alert-danger alert-sm"><i class="fa fa-times"></i></span>') ?></span>
                                </span>
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