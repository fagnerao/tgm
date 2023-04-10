<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="<?= $dados->empresa ?>" />
        <meta property="og:url" content="<?= base_url('') ?>" />
        <meta property="og:site_name" content="<?= $dados->empresa ?>" />
        <meta property="og:image" content="<?= base_url() ?>/uploads/whatsapp.jpg" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="600" />
        <meta property="og:description" content="<?= $dados->meta_descricao ?>" />
        <meta property="og:type" content="website">
        <meta name="theme-color" content="#eee">
        <meta name="apple-mobile-web-app-status-bar-style" content="#eee">
        <meta name="msapplication-navbutton-color" content="#eee">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link href="<?= base_url() ?>/site/chat/style.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Jquery -->
        <script src="<?= base_url('site/assets/js/jquery.js')?>" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <link href="/site/assets/lightbox/css/lightbox.css" rel="stylesheet" />
        <!-- Alpine -->
        <script defer src="<?= base_url('site/assets/js/alpine.js')?>"></script>
        <!-- calendar  -->
        <script src='<?= base_url('site/assets/js/fullcalendar.js')?>'></script>
        <script>

          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var Url = '<?= base_url('front/events') ?>';
            
            // conteudo do meio
            var calendar = new FullCalendar.Calendar(calendarEl, {
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
              },
              
              buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Hoje',
                list: 'Lista'
              },
                height:400,
                initialView: 'listWeek',
                locale: 'pt-br',
                events: Url,

              });
            // conteudo do meio
            calendar.render();
          });

        </script>
    
        <link rel="icon" href="<?= base_url() ?>/site/assets/img/favicon.png">
        <link href="<?= base_url() ?>/site/assets/css/tailwind.css" rel="stylesheet">    
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

        <style type="text/css">
          @font-face {
          font-family: 'Luxia';
          src: url('<?=base_url() ?>/site/assets/fonts/Luxia.ttf') format('truetype'); 
        }
          @font-face {
          font-family: 'Avenir';
          src: url('<?=base_url() ?>/site/assets/fonts/Avenir.otf') format('truetype'); 
        }

        * { 
            font-family: "Avenir", Verdana, Tahoma;
        }
       

        h1,h2,h3,h4,h5,h6 { 
            font-family: "Luxia", Verdana, Tahoma;
            
        }
        .fc-toolbar-title{
            font-size: 15px !important;
        }
        </style>
        
</head>        
<body>

<div class="bg-white  ">
  <!-- menu -->

  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5 border-b">
         <a  href="<?=base_url('/chat')?>" alt="Acessar chat" target="_blank" class="rounded-full px-[10px] py-1 text-green-900 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800">
          <i class="ri-chat-forward-fill"></i>
         </a>
        <a href="<?= base_url('') ?>" class="flex items-center">
            <img src="<?= base_url('uploads/'.$dados->logo) ?>" class="h-8 mr-3 sm:h-[70px]" alt="<?= $dados->empresa ?>" />

        </a>
       

        <div class="flex items-center">

        <button  id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button" class="rounded-full <?= (session()->get('isLoggedIn')?'bg-green-500':'bg-gray-200')?> px-[10px] py-1 text-green-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800">
            <span class="sr-only">login form</span>
            <i class="ri-user-2-fill"></i>
          </button><!-- Dropdown menu -->
         
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <?php 
            if (session()->get('isLoggedIn'))
            { 
          ?>
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li class="bg-green-200 py-2">
                  <p class="text-center font-bold">Olá <?= session()->get('name') ?></p>
                </li>
                <li>
                  <a href="<?= base_url('admin/painel')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Painel Admin</a>
                </li>
                <li>
                  <a href="<?=base_url('logout')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sair</a>
                </li>
              </ul>
          <?php   } else { ?>
              <!-- login form -->
          <form class="space-y-2 pl-2 w-[160px]" action="<?php echo base_url(); ?>/Front/SigninController/loginAuth" method="POST">
          <h4 class="font-sans text-center uppercase">Login</h4>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div>
            <button type="submit" class="w-1/2 flex mb-2 justify-center py-1 px-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Entrar</button>
            </div>
          </form>
          <?php   } ?>
          <!-- login end -->
          </div>
          

        </div>
        
    </div>
</nav>
<!-- menu inferior -->

<nav class="px-2 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 drop-shadow-lg">
  <div class="container flex flex-wrap items-center justify-between mx-auto max-w-7xl">
   
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 justify-center">
        <li>
          <a href="<?= base_url('/') ?>" class="block py-2 pl-3 pr-4 text-white bg-yellow-600 rounded md:bg-transparent md:text-yellow-600 md:p-0 md:dark:text-white dark:bg-yellow-600 md:dark:bg-transparent" aria-current="page">Início</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-600 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Departamentos <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                </div>
            </div>
        </li>
        <li>
            <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-600 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Serviços <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="<?= base_url('/telefones')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Telefones</a>
                  </li>
                  <li>
                    <a href="<?= base_url('/suporte')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Abrir chamado de TI</a>
                  </li>
                </ul>
            </div>
        </li>
        <li>
          <a href="<?= base_url('/documentos')?>" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-600 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Documentos</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-600 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Agenda</a>
        </li>
        <li>
          <a href="<?= base_url('/ouvidoria')?>" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-600 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Ouvidoria</a>
        </li>
        
      </ul>
    </div>
   <!-- Search Form -->
   <form class="flex items-center w-[25%] ml-6" method="POST" action="<?= base_url('/pesquisa') ?>">   
              <label for="simple-search" class="sr-only">Pesquisar</label>
              <div class="relative w-full">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input type="text" id="simple-search" name="pesquisa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Pesquisar" required>
              </div>
              <button type="submit"  class="sr-only p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  <span class="sr-only">Pesquisar</span>
              </button>
          </form>
  </div>
  
</nav>
<!-- menu inferior -->



  <main>
    
<?php $session = session();
  echo $session->msg; ?>
<?= $this->renderSection('content') ?>

<footer class="bg-[#405d64]" aria-labelledby="footer-heading">
    
    <div class="max-w-7xl mx-auto pt-16 pb-8 px-4 sm:px-6 lg:pt-24 lg:px-8">
      <div class="xl:grid xl:grid-cols-1 xl:gap-8">
        <div class="grid grid-cols-2 gap-8 xl:col-span-2">
          <div class="md:grid md:grid-cols-1 md:gap-8">
            
            <div class="mt-12 md:mt-0">
              <h3 class="text-lg text-white tracking-wider uppercase">Links Úteis</h3>
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="https://www.gov.br/pt-br/orgaos/agencia-nacional-de-mineracao" target="_blank" class="text-base text-gray-50 hover:text-gray-900"> Agência Nacional de Mineração </a>
                </li>

                <li>
                  <a href="http://www.cprm.gov.br/publique/" target="_blank" class="text-base text-gray-200 hover:text-gray-900"> Serviço Geológico do Brasil </a>
                </li>

                <li>
                  <a href="https://mtr.sinir.gov.br/#/" target="_blank" class="text-base text-gray-50 hover:text-gray-900"> Controle de Manifesto de Residuos </a>
                </li>

                <li>
                  <a href="https://www.google.com/url?q=https%3A%2F%2Fgeo.anm.gov.br%2Fportal%2Fapps%2Fwebappviewer%2Findex.html%3Fid%3D6a8f5ccc4b6a4c2bba79759aa952d908&sa=D&sntz=1&usg=AOvVaw3BqywvXZLFZ7L8E7Vs3mgE" target="_blank" class="text-base text-gray-50 hover:text-gray-900"> Sistema de Informação Geográfica da Mineração – SIGMINE  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="md:grid md:grid-cols-2 md:gap-8">
          <div>
              <h3 class="text-lg text-white tracking-wider uppercase">A empresa</h3>
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-50 hover:text-gray-900"> Missão, Visão e Valores </a>
                </li>

                <li>
                  <a href="<?=base_url('/documentos')?>" class="text-gray-50 hover:text-gray-900"> Documentos </a>
                </li>

                <li>
                  <a href="<?=base_url('/ouvidoria')?>" class="text-base text-gray-50 hover:text-gray-900"> Ouvidoria </a>
                </li>
                <li>
                  <a href="https://www.terragoyana.com.br/blog/" target="_blank" class="text-base text-gray-50 hover:text-gray-900"> Blog </a>
                </li>

              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-lg  text-white tracking-wider uppercase">Certificados</h3>
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <img src="<?=base_url()?>/uploads/iso.png" class="invert-0">
                </li>
              
              </ul>
            </div>
          </div>
        </div>
       
      <div class="mt-12 border-t border-gray-200 bg-gray-100 rounded p-8 flex items-center justify-between">
        <div class="flex space-x-6 md:order-2">
          <a href="<?=base_url().$dados->facebook?>" class="text-gray-600 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>

          <a href="<?=base_url().$dados->instagram?>" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>

        </div>
        <p class="mt-8 text-base text-gray-600 md:mt-0 md:order-1">Copyright © <?= $dados->empresa ?> <?= date("Y") ?> . Todos os direitos reservados.
          <a href="http://www.vectorzero.com.br" target="_blank" rel="noopener noreferrer">
            <img style="height: 18px; float:right" src="/uploads/vector_logo_b.png" alt="">
          </a>
        </p>
      </div>
    </div>
  </footer>
</div>

<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script src="<?=base_url('/site/assets/lightbox/js/lightbox-plus-jquery.js')?>"></script>
<script src="<?=base_url('/site/chat/js/chat.js')?>"></script>
<script src="<?=base_url('/site/chat/js/users.js')?>"></script>
<script src="<?=base_url('/site/assets/js/pdfobject.js')?>"></script>

<script>
  
  var url_site = "<?= base_url() ?>";
  
  
  $('.btn-get-procotolo').click(function() {
      
            var protocolo  = $('#input-protocolo').val();
                          
                $.ajax({
                    url: url_site + '/admin/ouvidoria/getProtocolo  ',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        protocolo : protocolo,
                    }                      
                }).then(function(res) {
                        var html = '<p class="mt-6 text-gray-600 border-1 rounded capitalize">Texto: '+res.mensagem+'<br> Status: <b>'+ res.status+'</b> <br> Resposta: <span class="text-teal-600">'+ res.resposta +'</span></p>';
                        $('.result-protocolo').append(html);
                })
                
        })
        ;
  
  $('.btn-get-files').click(function() {
      
            var id  = $(this).attr("data-id");
                $.ajax({
                    url: url_site + '/front/documentos/getFiles',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id : id,
                    }                      
                }).then(function(res) {

                  if(res.length==0){
                    var html = '<li class="my-2 bg-yellow-100 p-1"><a href="#" target="_blank" class="text-sm color-blue-600">Sem arquivos</a></li>';
                      $('.show-files-'+id).append(html);
                      return;
                  }

                  res.forEach(function(res, i) {
                      


                      var html = '<li class="my-2 bg-teal-100 p-1"><i class="ri-file-download-fill mr-2"></i><a href="visualizar/'+res.file+'" target="_blank" class="text-sm color-blue-600">'+res.titulo+'</a></li>';
                      $('.show-files-'+id).append(html);
                     })
                })
                
        });



  $('.btn-new-todo').click(function() {
      
            var task  = $('.content-todo').val();
                          
                $.ajax({
                    url: url_site + '/admin/todo/core',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        task: task,
                    }                      
                    
                }).then(function(res) {
                    if (res.erro == 0) {
                        var html = '<li class="td-'+res.id+ ' flex justify-between items-center mt-2"><div class="flex items-center"><input type="checkbox" class="update-task" data-id="'+res.id+'"><div class="capitalize ml-3 text-lg font-medium  font-teal-700">'+task+'</div></div><div><button type="button" class="confirma_delete "  data-tr="/admin/todo/del/" data-id="'+res.id+'"><i class="ri-delete-bin-line"></i></button></div></li>';
                        $('#todo_list').append(html);

                        $('.update-task').click(function() {
                
                          var id = $(this).attr('data-id');
                          if($(this).is(":checked")) {
                              var done = 1
                          } else {
                              var done = 0
                          }

                          $.ajax({
                                  url: url_site + '/admin/todo/update',
                                  type: "POST",
                                  dataType: 'json',
                                  data: {
                                      id: id,
                                      done:done,
                                  }                      
                  
                              });
                        $(".td-"+id).addClass('line-through') 
                      });

                      $('.confirma_delete').click(function() {
                          var id = $(this).data('id');
                          var pasta = $(this).attr('data-tr');

                          $.ajax({
                              url: url_site + pasta + id,
                              type: "POST",
                              dataType: 'json',
                              data: {
                                  id: id
                              },
                              success: function(html) {
                                  $(".td-" + id).addClass('sr-only')
                              },

                          });
                      
                      });


                    }
                })
                
        });

            $('.update-task').click(function() {
                
                var id = $(this).attr('data-id');
                if($(this).is(":checked")) {
                    var done = 1
                } else {
                    var done = 0
                }

                $.ajax({
                        url: url_site + '/admin/todo/update',
                        type: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                            done:done,
                        }                      
         
                    });
              $(".td-"+id).addClass('line-through') 
            });


            $('.confirma_delete').click(function() {
                var id = $(this).data('id');
                var pasta = $(this).attr('data-tr');

                $.ajax({
                    url: url_site + pasta + id,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(html) {
                        $(".td-" + id).addClass('sr-only')
                    },

                });
            
            });
  </script>

</body>
</html>