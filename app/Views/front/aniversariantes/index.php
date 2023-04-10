<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>

<div class="py-16 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
  <div class="max-w-max lg:max-w-7xl mx-auto">
  <div class="max-w-2xl mx-auto">
        <!-- search list form -->
            <form class="flex items-center mb-8" method="POST" >   
                <label for="simple-search" class="sr-only">Pesquisar</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" name="pesquisa" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar" required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-yellow-500 rounded-lg border border-yellow-700 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Pesquisar</span>
                </button>
                <a href="<?= base_url('/telefones') ?>" class="p-2.5 ml-2 text-sm text-gray-900 font-medium bg-gray-200 rounded-lg border border-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                   
                    <span class="">Limpar</span>
                </a>
            </form>

       </div> 
<?php 
if (!empty($telefones)){  ?>
    <div class="relative">
        
      <div class="relative md:bg-white md:p-6">
       
      <h3 class="bb-2 text-lg uppercase text-center">Lista Telefônica</h3>
     <?= ($pesquisa)? '<h3 class="font-sans mb-4 text-green-500"> Resultado da pesquisa :<strong> '. $pesquisa.'</strong></h3>': '' ?>
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departamento</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($telefones as $f) { ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $f->name ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $f->depName ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $f->fones ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                 </div>
                </div>
             </div>
            </div>
         </div>
      </div>
        <?php } else {?>
        <h1 class="text-center font-semibold text-2xl">Nada encontrado</h1>
        <?= ($pesquisa)? '<h3 class="font-sans mb-4 text-green-500"> Resultado da pesquisa :<strong> '. $pesquisa.'</strong></h3>': '' ?>
        <?php } ?>
  </div>
</div>

    
<?= $this->endSection('content') ?>
    