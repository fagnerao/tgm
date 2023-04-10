<?= $this->extend('admin/template/index.php') ?>
<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $title ?></h4>
            <a href="<?=base_url('/admin/categorias/create')?>" class="btn btn-primary col-2"> Botão</a>
        </div>
        <div class="card-body">
            <h4 style="color: #f00;font-weight: 600;background: #ff000059; padding: 11px; border-radius: 10px;"><?php  $session = session();  echo $session->msg ?></h4>
            
        </div>
    </div>
</div>
<div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
	<div class="card-header">
		<h4 class="card-title">Todo</h4>
	</div>
	<div class="card-body px-0">
		<div class="todo-list">
			<div class="tdl-holder">
				<div class="tdl-content widget-todo mr-4 ps ps--active-y">
					<ul id="todo_list">
                        <?php foreach($todo as $td) { ?>
						    <li class="p-<?= $td->id ?>" style="display: flex;   justify-content: space-between;  align-items: center;">
                                <label><input type="checkbox" <?= ($td->done==1)?'checked':'' ?> data-id="<?= $td->id ?>" class="update-task"><i></i><span><?= $td->task ?></span></label>
                                    <a type="button" class="btn-info confirma_delete dropdown-item float-right"  style="width:20px;font-size:20px" data-tr="/admin/todo/del/" data-id="<?= $td->id ?>"><i class="fa fa-trash-o"></i></a>
                            </li>
						<?php } ?>
					</ul>
				<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 210px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 139px;"></div></div></div>
				<div class="px-4">
					<input type="text" class="form-control mb-2 content-todo" placeholder="Insira nova tarefa'...">
                    <button type="button" class="btn btn-info btn-new-todo">Inserir <span class="btn-icon-right"><i class="fa fa-heart"></i></span></button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- row -->

<?= $this->endSection('content') ?>