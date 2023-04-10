<form class="form-horizontal" method="post" action="<?= base_url('admin/banners/core') ?>" enctype="multipart/form-data">

    <div class="col-md-12 m-3">
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="inputState">Link</label>
                <input type="hidden" value="" class="form-control" name="id">
                <input type="text" value="" class="form-control" name="link" placeholder="Link">
            </div>
            <div class="col-sm-3">
                <label for="inputState">Título</label>
                <input type="text" value="" class="form-control" name="titulo" placeholder="">
            </div>
            <div class="col-sm-2">
                <label for="inputFirstname">Local</label>
                <select name='local' class='form-control'>
                    <option value='1'> Banner Topo </option>
                    <option value='2'> PopUp </option>
                    <option value='3'> Banner Meio</option>
                   
                </select>
            </div>
            <div class="col-sm-2">
                <label for="inputFirstname">Ativo</label>
                <select name='ativo' class='form-control'>
                    <option value='1'> Sim </option>
                    <option value='0'> Não </option>
                </select>
            </div>

            <div class="col-sm-5">
                <label for="inputAddressLine1">Imagem</label>
                <input type="file" class="form-control" name="imagem" placeholder=""><br>
                <?php if (isset($banners->imagem)) { ?>
                    <img src="../../../uploads/banners/<?= $banners->imagem ?>" class="img-fluid" title="Imagem atual">
                <?php } ?>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary mt-5">Salvar</button>
            </div>
        </div>
    </div>

</form>