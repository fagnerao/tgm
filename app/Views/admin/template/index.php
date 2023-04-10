<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vector Zero - Sistemas Web</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/dashboard')?>/images/logo-icone.png">
    <link href="<?= base_url('/dashboard')?>/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- font -->
    <link href="<?= base_url()?>/galeria/dist/font/font-fileuploader.css" media="all" rel="stylesheet">

    <!-- css -->
    <link href="<?= base_url()?>/galeria/dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">
    <link href="<?= base_url()?>/galeria/examples/gallery/css/jquery.fileuploader-theme-gallery.css" media="all" rel="stylesheet">

    <!-- Summernote -->
    <link href="<?=base_url('dashboard')?>/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="<?= base_url('/dashboard')?>/css/datatable.css" rel="stylesheet">
    <link href="<?= base_url('/dashboard')?>/css/style.css" rel="stylesheet">
    <!-- Pagar.me -->
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>

    <script type='text/javascript'>
    var url_site = 'http://site.web/';
    </script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?=base_url('admin')?>" class="brand-logo">
                <img class="logo-abbr" src="<?=base_url('dashboard/images')?>/logo-icone.png" alt="">
                <img class="logo-compact" src="<?=base_url('dashboard/images')?>/logo-icone.png" alt="">
                <img class="brand-title" src="<?=base_url('dashboard/images')?>/logo-texto.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                           <h4 class="text-uppercase"><?php $session = session();   echo "Olá : ".$session->get('name'); ?></h4>
                         
                        </div>

                        <ul class="navbar-nav header-right">
                        <li class="nav-item header-profile">
                            <a href="<?= base_url('/')?>" target="_blank" style="color:#000">
                                    <i class="icon-star"></i>
                                    <span class="ml-2">Ver Site </span>
                            </a>        
                            </li>
                            
                            
                            <li class="nav-item header-profile">
                            <a href="<?= base_url('/logout')?>" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Sair </span>
                            </a>        
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <?php $acessoMenu = session()->get('group'); ?>
                <li><a href="<?= base_url() ?>/admin/painel"><i class="fa fa-pencil-square-o"></i><span class="nav-text">Painel Inicial</span></a></li>

        
                <?php if($acessoMenu & 255){ ?>
                <li><a href="<?= base_url() ?>/admin/suporte"><i class="fa fa-medkit" aria-hidden="true"></i><span class="nav-text">Suporte TI</span></a></li>
                <?php } ?>
                <?php if($acessoMenu & 65){ ?>
                <li><a href="<?= base_url() ?>/admin/documentos"><i class="fa fa-list"></i><span class="nav-text">Documentos</span></a></li>
                <?php } ?>

                <?php if($acessoMenu & 11){ ?>
                <li class="nav-label first">Jornalismo</li>
                <li><a href="<?= base_url() ?>/admin/paginas"><i class="fa fa-pencil-square-o"></i><span class="nav-text">Notícias e Comunicados</span></a></li>
                <li><a href="<?= base_url() ?>/admin/banners"><i class="fa fa-lightbulb-o"></i><span class="nav-text">Banners</span></a></li>
                <li><a href="<?= base_url() ?>/admin/eventos"><i class="fa fa-book"></i><span class="nav-text">Agenda</span></a></li>
                <?php } ?>
                <?php if($acessoMenu & 17){ ?>
                <li><a href="<?= base_url() ?>/admin/ouvidoria"><i class="fa fa-bullhorn"></i><span class="nav-text">Ouvidoria</span></a></li>
                <?php } ?>
                <?php if($acessoMenu & 11){ ?>
                <li class="nav-label first">Configurações</li>
                <li><a href="<?=base_url('/admin/configuracao')?>"><i class="fa fa-cog"></i><span class="nav-text">Configurações</span></a></li>
                <?php } ?>
                <?php if($acessoMenu & 1){ ?>
                <li><a href="<?=base_url('/admin/usuarios')?>"><i class="fa fa-users"></i><span class="nav-text">Lista de Usuários</span></a></li>
                <?php } ?>
                <li><a href="<?=base_url('/admin/aniversariantes')?>"><i class="fa fa-camera"></i><span class="nav-text">Aniversariantes</span></a></li>
                
                
                <li><a href="<?=base_url('/admin/telefones')?>"><i class="fa fa-phone"></i><span class="nav-text">Telefones</span></a></li>
                <li><a href="<?=base_url('/admin/usuario')?>"><i class="fa fa-user"></i><span class="nav-text">Meus dados</span></a></li>
                <li><a href="<?=base_url('http://wa.me/+556282968747')?>" target="_blank"><i class="fa fa-question"></i><span class="nav-text">Reportar Bug</span></a></li>
                <li><a href="<?=base_url('logout')?>"><i class="ti ti-unlock"></i><span class="nav-text">Sair</span></a></li>
                    
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                
                <?= $this->renderSection('content') ?>
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © <?php echo date('Y');?> 
                <a href="http:\\www.vectorzero.com.br" target="_blank"><img src="<?=base_url('dashboard/images')?>/vector_logo_b.png" width="100"></a></p> 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

      

    </div>
   
    <!-- Required vendors -->
    
    <script src="<?= base_url('/dashboard')?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('/dashboard')?>/js/quixnav-init.js"></script>
    <script src="<?= base_url('/dashboard')?>/js/custom.min.js"></script>


    <!-- Sweeetalert -->
    <script src="<?= base_url('/dashboard')?>/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('/dashboard')?>/js/plugins-init/sweetalert.init.js"></script>

    <script src="<?= base_url('/dashboard')?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('/dashboard')?>/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?= base_url('/dashboard')?>/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?= base_url('/dashboard')?>/vendor/flot/jquery.flot.js"></script>
    <script src="<?= base_url('/dashboard')?>/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?= base_url('/dashboard')?>/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('/dashboard')?>/js/mask.js"></script>


    <!-- Datatable -->
    <script src="<?= base_url('/dashboard')?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('/dashboard')?>/js/plugins-init/datatables.init.js"></script>

    
    <!-- Summernote -->
    <script src="<?=base_url('dashboard')?>/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="<?=base_url('dashboard')?>/js/plugins-init/summernote-init.js"></script>
    
   <!-- js -->
  
    <script src="<?=base_url('galeria/')?>/dist/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script src="<?=base_url('galeria/examples/gallery/')?>/js/custom.js" type="text/javascript"></script>
    
    <script src="<?= base_url('dashboard')?>/js/dashboard/dashboard-1.js"></script>
    
    <script>
            $('.confirma_delete').click(function() {
                var id = $(this).data('id');
                var pasta = $(this).attr('data-tr');

                swal({
                    title: 'Deseja mesmo deletar?',
                    confirmButtonText: "Sim, pode deletar!",
                    cancelButtonText: "Não, cancelar",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim , pode deletar!',
                    closeOnConfirm: false,
                    closeOnCancel: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: url_site + pasta + id,
                            type: "POST",
                            dataType: 'json',
                            data: {
                                id: id
                            },
                            success: function(html) {
                                $(".p-" + id).addClass('d-none')
                                swal({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Registro deletado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            },

                        });
                    } else {
                        swal({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Cancelado',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                });

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
                        url: url_site + 'admin/todo/update',
                        type: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                            done:done,
                        }                      
         
                    })
                   
            });
 
       // função para apagar foto
       $(document).on('click','.btn-apagar-foto-produto',function(){
           if(confirm("Deseja apagar essa foto?")){
               
           $(this).parent().remove();
           } else { return false; 
           }
       })
      </script>

<script>
  
  $('.input_data').mask('00/00/0000');
  $('.input_cep').mask('00000-000');
  $('.input_cpf').mask('000.000.000-00', {reverse: true});
  $('.input_fone').mask('(00)0000-0000', {reverse: true});
  $('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
  
  $('.input_data_hora').mask('00/00/0000 00:00:00');
  

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.input_telefone').mask(SPMaskBehavior, spOptions);


            </script>
            
            
</body>

</html>