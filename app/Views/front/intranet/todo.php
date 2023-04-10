<?php  
$session = session();
$id_user = $session->get('id');

$model_todo = model('App\Models\Admin\Todo_model');
$todo  =   $model_todo->getDados($id_user);

?>
  <div class="container px-3 mx-auto my-8 max-h-[500px] overflow-y-auto">
    <!-- todo wrapper -->
    <div class="bg-white rounded shadow px-6 py-6">
      <div class="task font-bold text-lg">Meus Lembretes</div>
      <div class="flex items-center text-sm mt-2">
        <button @click="$refs.addTask.focus()">
          <svg class="w-3 h-3 mr-3 focus:outline-none" >
            <path d="M12 4v16m8-8H4"></path>
          </svg>
        </button>
        <span>Adicionar nova tarefa</span>
      </div>
      <!-- NEW TASK -->
      <div class="flex">
      <input type="text" placeholder="..lembretes do dia" class="content-todo rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-4">
      <button type="button" class="btn-new-todo text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 h-[40px] mt-[18px] text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
      </div>
      <!-- todo list -->
      <ul id="todo_list" class="mt-4">
          <?php foreach($todo as $td) { ?>
            <li class="td-<?= $td->id ?> flex justify-between items-center mt-2 <?= ($td->done==1)?'line-through':'' ?>">
              <div class="flex items-center ">
                <input type="checkbox" class="update-task" <?= ($td->done==1)?'checked':'' ?> data-id="<?= $td->id ?>">
                <div class="capitalize ml-3 text-lg font-medium  font-teal-700"><?= $td->task ?></div>
              </div>
              <div>
                <button type="button" class="confirma_delete "  data-tr="/admin/todo/del/" data-id="<?= $td->id ?>">
                <i class="ri-delete-bin-line"></i>
                </button>
              </div> 
            </li>
          <?php } ?>
      </ul>
    </div>
  </div>
