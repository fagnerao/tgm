<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>
    <!-- News -->

<div class="py-16 px-4 sm:px-6 lg:px-8 bg-[#405d64] overflow-hidden">
  <div class="max-w-max lg:max-w-7xl mx-auto">
    <div class="relative">
      <div class="relative bg-white md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4" >
          <div class="prose prose-indigo prose-lg col-span-1 md:col-span-2 text-gray-500 ">
              <div id="default-carousel" class="relative " data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        <!-- Item 1 -->
                        <?php foreach ($noticias as $n) { ?>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <span class="absolute top-1/2 left-1/2 text-2xl font-medium bg-gray-800 py-2 px-3 rounded-lg -translate-x-1/2 -translate-y-1/2 sm:text-2xl" style="z-index:999;">
                            <a href="<?= base_url('pagina/'. $n->slug)?>" alt="Leia mais" style="color:#fff !important">
                              <?= $n->titulo ?>
                            </a>  
                            </span>
                            <span class="absolute top-[13px] left-[40px] text-2xl bg-gray-800 py-1 px-2 rounded-b-sm -translate-x-1/2 -translate-y-1/2 sm:text-sm" style="z-index:999; color:#fff !important"><?= dateTimeBr($n->updated_at) ?> </span>
                            <img src="<?= $n->file ?>" class="block absolute top-1/2 left-1/2 object-cover h-[400px] w-full -translate-x-1/2 -translate-y-1/2" alt="<?= $n->titulo ?>">
                        </div>
                       <?php } ?>
                    </div>
                    <!-- Slider indicators -->
                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                      <?php 
                        $total = count($noticias) ;
                        for ($i = 1 ; $i <= $total ; $i++){
                      ?>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide <?= ($i + 1) ?>" data-carousel-slide-to="<?= $i ?>"></button>
           
                      <?php } ?>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="hidden">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="hidden">Next</span>
                        </span>
                    </button>
                </div>
          </div>
          <div class="mt-6 prose prose-indigo prose-lg text-gray-500 lg:mt-0">
           <!-- Informaticos -->
           <ul role="list" class="divide-y divide-gray-200">
           <h3 class="bb-2 text-lg uppercase text-right">Comunicados</h3>
           <?php foreach ($comunicados as $c) { ?>
           <li class="pb-4 flex py-4">
              <div class="ml-3">
                <a href="<?= base_url('pagina/'. $c->slug)?>" alt="Leia mais">
                <h3 class="font-semibold text-gray-900 font-sans "><i class="ri-chat-forward-line"></i> <?= $c->titulo ?></h3>
                <p class="text-sm text-gray-500"><?= character_limiter(strip_tags($c->texto), 100) ?></p>
                </a>
              </div>
            </li>
            <?php } ?>
           </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- ACESSO ADMINISTRATIVO -->
<?php 
  if (session()->get('isLoggedIn'))
  { 
?>
  <div class="py-16 px-4 sm:px-6 lg:px-8 bg-[#EEE]">
    <div class="max-w-max lg:max-w-7xl mx-auto">
      <h2 class="text-center text-4xl mb-6">Acesso Logado</h2>
      <div class="grid grid-cols-2  gap-4" >
        <!-- Todo -->
        <div class="">
        <?php echo view('front/intranet/todo.php') ?>
      </div>
      <!-- Chat -->
      <div class="">
          <?php echo view('front/chat/chat.php') ?>
        </div>
      </div> 
    </div>
  </div>
<?php 
  }
?>
<!-- SERVIÇOS -->
<div class="bg-[#fbf9f9ff] py-24 ">
  <div class="grid grid-cols-3 gap-4  max-w-7xl mx-auto">
      <div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-3 col-span-2 sm:gap-px">
          <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
              <i class="ri-computer-fill text-2xl"></i>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/atendimento')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Atendimento TI
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Solicitar atendimento ou manutenção de TI.</p>
            </div>
          </div>

          <div class="sm:rounded-tr-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
              <i class="ri-stack-line text-2xl"></i>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/documentos')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Documentos
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Pesquise e encontre os documentos mais utilizados.</p>
            </div>
          </div>

          <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/telefones')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Telefones
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Pesquise os fones e ramais dos funcionários.</p>
            </div>
          </div>

          <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
              <i class="ri-broadcast-fill text-2xl"></i>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/ouvidoria')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Ouvidoria
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Faça sua reclamação ou denúncia de modo seguro e anônimo.</p>
            </div>
          </div>

          <div class="sm:rounded-bl-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
              
              <i class="ri-shield-user-fill text-2xl"></i>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/login')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Acesso Restrito
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Acesso a ferramentas administrativas</p>
            </div>
          </div>

          <div class="rounded-bl-lg rounded-br-lg sm:rounded-bl-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
            <div>
              <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
              <i class="ri-chat-check-fill text-2xl"></i>
              </span>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium">
                <a href="<?=base_url('/chat')?>" class="focus:outline-none">
                  <!-- Extend touch target to entire panel -->
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  Chat
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">Converse com os funcionários cadastrados</p>
            </div>
          </div>
        </div>
  

    <!--CALENDÁRIO  -->
    <div id="calendar" class="">
    </div>
  </div>
 
</div>

  

    <!-- Stats section -->
    <div class="relative bg-gray-50 border-t-8 border-yellow-600 pt-10">
      <div class="h-100 max-w-7xl mx-auto">
        <img class="h-full  object-contain" src="<?=base_url('/uploads/assedio.jpg')?>" alt="Asssedio">
        
      </div>
        
      </div>
    </div>
  
  </main>


  
<?= $this->endSection('content') ?>