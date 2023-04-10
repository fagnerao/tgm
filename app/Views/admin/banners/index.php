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
        <button class="btn btn-primary col-2" type="button" data-toggle="collapse" data-target="#novoItem" aria-expanded="false" aria-controls="collapseExample">
            Cadastrar Banner
        </button>

        <div class="collapse" id="novoItem" style="clear:both">
            <div class="border rounded bg-clean">
                <?= $this->include('admin/banners/add'); ?>
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
                            <th scope="col" class="sort" data-sort="status">Imagem</th>
                            <th scope="col" class="sort" data-sort="status">Local</th>
                            <th scope="col" class="sort" data-sort="budget">Link</th>
                            <th scope="col" class="sort" data-sort="status">Ativo</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach ($banners as $banner) { ?>
                            <tr class="p-<?= $banner->id ?>">

                                <td>
                                    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                        <a class="dropdown-item" href='/admin/banners/create/<?= $banner->id ?>' title='Editar' class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                        <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;" data-tr="/Admin/Banners/del/" data-id="<?= $banner->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                    </div>
                                </td>
                                <td class="budget">
                                    <?php if ($banner->imagem) { ?>
                                        <img src='../uploads/banners/<?= $banner->imagem ?>' width='150' height='70'>
                                    <?php } ?>
                                </td>
                                <td class="budget">
                                    <?php switch ($banner->local) {
                                        case 1:
                                            echo "Banner Topo";
                                            break;
                                        case 2:
                                            echo "PopUp";
                                            break;
                                        case 3:
                                            echo "Banner Meio";
                                            break;
                                      
                                    } ?>
                                </td>
                                <td class="budget">
                                    <?= $banner->link ?>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status"><?= ($banner->ativo == 1 ? '<span class="alert alert-success alert-sm"><i class="fa fa-check"></i></span>' : '<span class="alert alert-danger alert-sm"><i class="fa fa-times"></i></span>') ?></span>
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