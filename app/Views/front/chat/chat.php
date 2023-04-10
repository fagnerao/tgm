<div class="max-w-3xl font-serif mx-auto my-8 border-2 rounded-2xl bg-white max-h-[500px] overflow-y-auto">
    <section class="users ">
      <header class="bg-blue-600 p-4 rounded-3xl" >
        <div class="flex gap-4">
          <img src="uploads/avatar/<?= session()->get('img') ?>" alt="">
          <div class="details">
            <span class="text-white"><?= session()->get('name') ?></span>
            <p class="font-medium text-gray-800">On-Line</p>
          </div>
        </div>
        <a href="<?=base_url('logout')?>" class="bg-blue-500 hover:bg-blue-400 text-white uppercase font-xl py-1 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">Sair</a>
      </header>
      <div class="search">
        <span class="text-gray-600 mx-auto">Selecione ou Pesquise</span>
        <input type="text-gray-800" placeholder="Pesquisar por nome...">
        <button><i class="ri-search-line"></i></button>
      </div>
      <ul id="users-list">
     
      </ul>
    </section>
</div>