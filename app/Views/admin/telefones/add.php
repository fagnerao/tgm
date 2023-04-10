<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Número</h4>
        </div>
        <div class="card-body">
            <?php $session = session();  echo $session->msg ?>
            <form class="form-horizontal" method="post" action="<?= base_url('admin/telefones/core') ?>" enctype="multipart/form-data">
                <div class="col-md-12 mx-auto">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputFirstname">Nome</label>
                                <input type="text" value="" class="form-control" name="name"  required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputState">Departamento</label>
                                <select name='departamento' class='form-control'>
                                    <?php
                                     $db      = \Config\Database::connect();
                                     $builder = $db->table('int_departamentos');
                                     $dep     = $builder->get()->getResult();
                                     foreach ( $dep as $d){ 
                                    ?>
                                    <option value='<?= $d->id ?>'> <?= $d->nome ?></option>
                                    <?php   }  ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputFirstname">Fones</label>
                                <input type="text" value="" class="form-control" name="fones"  required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
        </div>
    </div>
</div>