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
            Cadastrar Documento
        </button>

        <div class="collapse" id="novoItem" style="clear:both">
            <div class="border rounded bg-clean">
                <?= $this->include('admin/documentos/add'); ?>
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
                            <th scope="col" class="sort" data-sort="name">Título</th>
                            <th scope="col" class="sort" data-sort="status">Departamento</th>
                            <th scope="col" class="sort" data-sort="status">Add Arquivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($documentos as $doc){ ?>
                        <tr class="p-<?= $doc->id ?>">
                        <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a class="dropdown-item" href='/admin/documentos/create/<?=$doc->id ?>' title='Editar'
                                        class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                    <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;"
                                        data-tr="/admin/documentos/del/" data-id="<?= $doc->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                </div>
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><?= $doc->titulo ?></span>
                                    </div>
                                </div>
                            </th>

                            <td class="budget">
                            <?= $doc->depName ?>
                            </td>
                            <td>
                                <form class="form-horizontal" method="post" action="<?= base_url('admin/documentos/arquivos') ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$doc->id?>">
                                        <button class="bg-yellow-300 hover:bg-yellow-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <i class="fa fa-upload"></i>   
                                    </button>
                          
                                </form>                                        
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