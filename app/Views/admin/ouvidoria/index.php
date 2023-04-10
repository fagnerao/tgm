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
           
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Solicitação</th>
                            <th>Arquivo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($ouvidorias as $ovd){ ?>
                        <tr class="p-<?= $ovd->id ?>">
                            <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a class="dropdown-item" href='/admin/ouvidoria/create/<?=$ovd->id ?>' title='Editar'
                                        class='btn btn-primary btn-sm '><i class="fa fa-pencil"></i> Editar</a>
                                </div>
                            </td>
                            <td><?= $ovd->nome ?></td>
                            <td><?= $ovd->mensagem ?></td>
                            <td><a href="/uploads/ovd/<?= $ovd->file ?>" target="_blank" style="color:#000"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Anexo</td>
                            <td><?= $ovd->status ?></td>
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