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
        <!-- fim card -->
        <button class="btn btn-primary col-sm-2" type="button" data-toggle="collapse" data-target="#novoItem" aria-expanded="false" aria-controls="collapseExample">
            Cadastrar Aniversário
        </button>

        <div class="collapse" id="novoItem" style="clear:both">
            <div class="border rounded bg-clean">
                <?= $this->include('admin/aniversariantes/add'); ?>
            </div>
        </div>
        <!-- fim card -->
    </div>
</div>

<div class="col-12">
    <div class="card">
    <div class="card-header">
            <h4 class="card-title"><?= $title ?></h4>
        </div>
        <div class="card-body">
        <?php $session = session();
            echo $session->msg ?>
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                          <th scope="col" class="sort" data-sort="status">Opções</th>
                            <th scope="col" class="sort" data-sort="name">Nome</th>
                            <th scope="col" class="sort" data-sort="status">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($aniversariantes as $n){ ?>
                        <tr class="p-<?= $n->id ?>">
                        <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a class="dropdown-item" href='/admin/aniversariantes/create/<?=$n->id ?>' title='Editar'
                                        class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                    <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;"
                                        data-tr="/admin/aniversariantes/del/" data-id="<?= $n->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                </div>
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <?= $n->nome ?>
                                    </div>
                                </div>
                           </th>
                            <td>
                            <?= formataDataView($n->data) ?> 
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