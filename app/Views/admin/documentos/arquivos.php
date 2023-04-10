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
            <a class="btn btn-primary text-white" href="/admin/documentos" >
          Voltar
        </a>
        </div>
        <div class="card-body">
            <?php $session = session();  echo $session->msg ?>
            <div class="col-md-12 mx-auto">
              
                <div class="form-group row">
                  <div class="col-sm-4">
                    
                  <h4>- <?= $documento[0]->titulo ; ?></h4>
                  </div>
                </div>
                 
                                      
                <form class="form-horizontal" method="post" action="<?= base_url('admin/documentos/upload') ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="inputFirstname">Título</label>
                        <input type="hidden" value="<?= $documento[0]->id ?>" name="id_doc">    
                        <input type="hidden" value="<?= $session->get('id') ?>" name="id_user">    
                        <input type="text" value="" name="titulo" class="form-control">    
                         
                      </div>
                      <div class="col-sm-6">
                        <label for="inputAddressLine1">Enviar Arquivo</label>
                          <input type="file" class="form-control" name="imagem" placeholder=""><br>
                          <?php if (isset($documento->imagem)) { ?>
                              <img src="../../../uploads/documentos/<?= $documento->imagem ?>" class="img-fluid" title="">
                          <?php } ?>
                      </div>
                      <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary float-right" style="margin-top:30px">Enviar</button>
                      </div>
                  </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
    <!-- Lista de arquivos -->

    <div class="col-12">
    <div class="card">
     
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                          <th scope="col" class="sort" data-sort="status">Opções</th>
                            <th scope="col" class="sort" data-sort="name">Nome do arquivo</th>
                            <th scope="col" class="sort" data-sort="status">Arquivo</th>
                            <th scope="col" class="sort" data-sort="status">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($arquivos as $arq){ ?>
                        <tr class="p-<?= $arq->id ?>">
                        <td>
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false"><i class="fa fa-pencil"></i> </button>
                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -153px, 0px);">
                                    <a type="button" class="btn-info confirma_delete dropdown-item " style="color: #951010;"
                                        data-tr="/admin/documentos/delArquivo/" data-id="<?= $arq->id ?>"><i class="fa fa-trash-o"></i> Remover</a>
                                </div>
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><?= $arq->titulo ?></span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                            <?= $arq->file ?>
                            </td>
                            <td class="budget">
                            <a href="<?= base_url('/visualizar/'.$arq->file) ?>" target="_blank"><i class="fa fa-search fa-2x" style="color:#0a8f26;"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>