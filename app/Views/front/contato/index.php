<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>
<div class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-200">
    <div class="max-w-max lg:max-w-7xl mx-auto">
      <h2 class="text-center text-4xl mb-6">OUVIDORIA</h2>
      <div class="grid grid-cols-3  gap-4" >
        <div class="py-8 lg:py-16 px-4 col-span-2 mx-auto max-w-screen-md">
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">A Terra Goyana leva muito a sério as boas práticas em nossos ambientes de trabalho. Se você sofreu ou viu algo que possa ser contra nossa política empresarial. Utilize o forumário abaixo!</p>
            <form action="<?= base_url('/admin/ouvidoria/core') ?>"  method="post" class="space-y-8"  enctype="multipart/form-data">
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                    <input type="text" name="nome" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light" placeholder="Opcional" value="">
                </div>
                <div>
                <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecione uma opção</option>
                    <option value="Reclamação">Reclamação</option>
                    <option value="Denúncia">Denúncia</option>
                    <option value="Assédio Sexual">Assédio Sexual</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="mensagem" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="escreva seu conteúdo..."></textarea>
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload de arquivo</label>
                    <input type="file" name="imagem" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-teal-700 sm:w-fit hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Enviar mensagem</button>
            </form>
        </div>
        <div class="h-full bg-white p-3 rounded-2xl ">
        <h3 class="text-center text-42l mt-6">PESQUISAR PROTOCOLO</h3>
            <div class="mt-4">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Consultar Registro</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="input-protocolo" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="procurar protocolo..." required>
                    <button type="text" class="btn-get-procotolo text-white absolute right-2.5 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Buscar</button>
                </div>
                <div class="result-protocolo"> </div>
            </div>
        </div>
    </div>
    </div>
</div>


<?= $this->endSection('content') ?>