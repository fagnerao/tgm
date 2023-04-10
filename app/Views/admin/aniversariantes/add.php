<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Aniversário</h4>
        </div>
        <div class="card-body">
            <?php $session = session();  echo $session->msg ?>
            <form class="form-horizontal" method="post" action="<?= base_url('admin/aniversariantes/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputFirstname">Nome</label>
                                <input type="text" value="" class="form-control" name="nome"  required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputFirstname">Data</label>
                                <input type="date" value="" class="form-control" name="data"  required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
        </div>
    </div>
</div>