<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Compromisso</h4>
        </div>
        <div class="card-body">
            <?php $session = session();  echo $session->msg ?>
            <form class="form-horizontal" method="post" action="<?= base_url('admin/eventos/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputFirstname">Title</label>
                                <input type="text" value="" class="form-control" name="title"  required>
                            </div>
                            <div class="col-sm-3">
                                <label for="inputFirstname">Início</label>
                                <input type="text" value="" class="form-control input_data_hora" name="start"  required>
                            </div>
                            <div class="col-sm-3">
                                <label for="inputFirstname">Fim</label>
                                <input type="text" value="" class="form-control  input_data_hora" name="end"  required>
                            </div>
                          
                            <div class="col-sm-2">
                                <label for="inputFirstname">Privado</label>
                                <select name='private' class='form-control'>
                                    <option value='1'> Sim </option>
                                    <option value='0'> Não </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
        </div>
    </div>
</div>