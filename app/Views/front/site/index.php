<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php
  if (isset($dados->empresa)) {
      echo "<title>" . $dados->empresa . "</title>";
  } else {
      echo "<title>Vector Zero Sistemas Web</title>";
  }
  ?>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="<?= $dados->empresa ?>" />
        <meta property="og:url" content="<?= base_url('') ?>" />
        <meta property="og:site_name" content="<?= $dados->empresa ?>" />
        <meta property="og:image" content="<?= base_url() ?>/site/assets/img/whatsapp.png" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="600" />
        <meta property="og:description" content="<?= $dados->meta_descricao ?>" />
        <meta property="og:type" content="website">
        <meta name="theme-color" content="#8B0002">
        <meta name="apple-mobile-web-app-status-bar-style" content="#8B0002">
        <meta name="msapplication-navbutton-color" content="#8B0002">

        <link rel="icon" href="<?= base_url() ?>/site/assets/img/favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="<?= base_url() ?>/site/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="<?= base_url() ?>/site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>/site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="<?= base_url() ?>/site/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>/site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      

        <!-- Template Main CSS File -->
        <link href="<?= base_url() ?>/site/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <a href="index.html" class="logo me-auto"><img src="<?= base_url() ?>/uploads/<?= $dados->logo ?>" alt=""></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= base_url() ?>/#hero">Início</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>/#about">Sobre Nós</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>/#services">Serviços</a></li>
                
                    <li><a href="<?= base_url() ?>/#blog">Informativos</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>/#contact">Contato</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

            <a href="http://wa.me/+55<?=$dados->whatsapp?>" target="_blank" class="get-started-btn scrollto">Fale conosco</a>
        </div>
    </header>
    <!-- End Header -->
    <main>

       <?php $session = session();
        echo $session->msg; ?>
       <?= $this->renderSection('content') ?>
       
    </main>
       <!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact text-center">
                        <img src="<?= base_url() ?>/site/assets/img/almeida.png">
                      
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Links Úteis</h4>
                        <ul>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www.receita.fazenda.gov.br/" target="_blank" > Receita Federal</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www.previdencia.gov.br/" target="_blank" > Previdência Social</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www8.receita.fazenda.gov.br/SimplesNacional/" target="_blank" > Simples Nacional</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www.caixa.gov.br/" target="_blank" > Caixa Econômica Federal</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www.brasil.gov.br/" target="_blank" > Portal do Brasil</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="https://www.gov.br/empresas-e-negocios/pt-br/empreendedor" target="_blank" > Portal do Empreendedor</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="http://www.pgfn.fazenda.gov.br/" target="_blank" > Procuradoria da União e Fazenda</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="https://portal.fazenda.sp.gov.br/servicos/pfe/Paginas/Sobre.aspx" target="_blank" > Posto Fiscal Eletrônico</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Serviços</h4>
                        <ul class="">
                        <?php foreach($servicos as $s ){ ?>
                            <a href="#" style="width:200px"> <i class="bx bx-chevron-right"></i> <?= $s->titulo?></a></a>
                            
                        <?php } ?>
                        </ul>
                    </div>

                

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                <p> Copyright © <?= $dados->empresa ?> <?= date("Y") ?> . Todos os direitos reservados.
                <a href="http://www.vectorzero.com.br" target="_blank" rel="noopener noreferrer">
                            <img style="height: 18px;" src="/uploads/vector_logo.png" alt=""></a>    
            </p>
                            
                </div>
              
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
               
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script src="<?= base_url() ?>/site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/site/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/site/assets/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/site/assets/js/main.js"></script>
   
       <script type="text/javascript">
           (function() {
               var options = {
                   whatsapp: "+55<?= $dados->whatsapp ?>", // Número do WhatsApp
                   company_logo_url: "uploads/whatsIcon.png",
                   call_to_action: "Fale conosco.",
                   position: "left",
               };
               var proto = document.location.protocol,
                   host = "whatshelp.io",
                   url = proto + "//static." + host;
               var s = document.createElement('script');
               s.type = 'text/javascript';
               s.async = true;
               s.src = url + '/widget-send-button/js/init.js';
               s.onload = function() {
                   WhWidgetSendButton.init(host, proto, options);
               };
               var x = document.getElementsByTagName('script')[0];
               x.parentNode.insertBefore(s, x);
           })();
       </script>
       <script>
            $('#emailAjax').click( function () {
                  
                  var nome = $('#nomeM').val();
                  var email = $('#emailM').val();
                  var mensagem = $('#mensagem').val();
                  var fone = $('#foneM').val();
                  //var sendM = $('select[name=sendM] option').filter(':selected').val()
               
                 
                  $.ajax({
                           type: "POST",
                           url:  "https://assessoriacontabilcentral.com.br/front/home/sendemail",
                           dataType: "json",
                           data: {nome : nome, email : email, mensagem: mensagem,fone:fone},
                           success: function(retorno){
                               if (retorno.erro == 0) {
                                  Swal.fire({
                                      title: 'Sucesso!',
                                      text: 'Mensagem enviada',
                                      icon: 'success',
                                      confirmButtonText: 'Ok'
                                    }); 
                                
                               } else {
                                  Swal.fire({
                                  title: 'Erro!',
                                  text: 'Tente novamente por favor',
                                  icon: 'error',
                                  confirmButtonText: 'Ok'
                                }); 
                               }
           
                           },
                           error: function (request, status, error) {
                                 Swal.fire({
                                  title: 'Erro!',
                                  text: 'Erro no sistema',
                                  icon: 'error',
                                  confirmButtonText: 'Ok'
                                }); 
                            }
                        });
                        
                  $('#nomeM').val('');
                  $('#emailM').val('');
                  $('#mensagem').val('');
                  $('#foneM').val('');
                })
            </script>

</body>

</html>
       