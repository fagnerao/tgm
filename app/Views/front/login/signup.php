<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>



  <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Cadastro</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
        <?php if(isset($validation)):?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
        <?php endif;?>
    </p>
  </div>
    
  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" action="<?php echo base_url(); ?>/front/signupController/store" method="POST">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700"> Nome </label>
          <div class="mt-1">
            <input id="name" name="name" type="name" autocomplete="name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="nascimento" class="block text-sm font-medium text-gray-700">Data Nascimento </label>
          <div class="mt-1">
            <input id="nascimento" name="nascimento" type="date" autocomplete="nascimento" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>
        
        <div>
          <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grupo</label>
          <div class="flex items-center mb-4">
          <input id="group" type="checkbox" checked name="group[]" value="8" class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="group" class="ml-1 text-sm font-medium text-gray-900 dark:text-gray-300">Chat</label>
            
          
        
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700"> Senha </label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="confirmpassword" class="mt-3 block text-sm font-medium text-gray-700">Confirmar senha </label>
          <div class="mt-1">
            <input id="confirmpassword" name="confirmpassword" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <button type="submit" class="mt-2 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cadastrar</button>
        </div>
      </form>

      <div class="mt-6">
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

    <?= $this->endSection('content') ?>