<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php 
    if(isset($dados->empresa)){ echo "<title>".$dados->empresa."</title>";}
    else {echo "<title>Vector Zero Sistemas Web</title>";}
    ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?= $dados->empresa ?>" />
    <meta property="og:url" content="<?= base_url('') ?>" />
    <meta property="og:site_name" content="<?= $dados->empresa ?>" />
    <meta property="og:image" content="<?=base_url()?>/site/whatsapp.jpg" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="600" />
    <meta property="og:description" content="<?= $dados->meta_descricao ?>" />
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
    <meta name="msapplication-navbutton-color" content="#fff">

    <link rel="icon" href="<?= base_url('') ?>/uploads/favicon.png">

    <!-- Icon fonts -->
    <link href="<?= base_url('site')?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('site')?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins for this template -->
    <link href="<?= base_url('site')?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/owl.theme.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/slick.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/slick-theme.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/owl.transitions.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="<?= base_url('site')?>/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <img src="<?=base_url('site')?>/assets/images/preloader.gif" alt>
            </div>
        </div>
        <!-- end preloader -->
                            
        <!-- Start header -->
        <header id="header" class="site-header header-style-2">
            <div class="topbar topbar-style-2">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-8">
                            <div class="topbar-contact-info-wrapper">
                                <div class="topbar-contact-info">
                                    <div>
                                        <i class="fa fa-location-arrow"></i>
                                        <div class="details">
                                            <p><?= $dados->endereco ?></p>
                                            <span><?= $dados->cidade ?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <div class="details">
                                            <p><?= $dados->telefone ?></p>
                                            <span><?= $dados->email ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-4">
                            <div class="get-quote" style="margin-left:10px">
                                <a href="/register" class="theme-btn" style="background:#34332f">Cadastro</a>
                            </div>
                            <div class="get-quote">
                                <a href="/login" class="theme-btn">Entrar</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="site-logo">
                        <a href="<?= base_url() ?>"><img src="<?= base_url('uploads/'.$dados->logo) ?>"></a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url()?>">Inicio</a></li>
                            <li><a href="#sobre">Sobre Nós</a></li>
                            <li><a href="#como-funciona">Como funciona</a></li>
                            <li><a href="#faq">Dúvidas frequentes</a></li>
                            <li><a href="#contato">Contato</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->

                </div><!-- end of container -->
            </nav> <!-- end navigation -->
        </header>
        <!-- end of header -->
     


        <?php $session = session();  echo $session->msg; ?>
        <?= $this->renderSection('content') ?>


        <!-- start site-footer -->
        <footer class="site-footer" id="contato">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <h3>Endereços</h3>
                                <ul class="contact-info">
                                    <li><i class="fa fa-home"></i> <?= ($dados->endereco) ? $dados->endereco : '' ?>
                                        <br><?= ($dados->bairro) ? $dados->bairro : '' ?>
                                        <br><?= ($dados->cidade) ? $dados->cidade : '' ?>-<?= ($dados->estado) ? $dados->estado : '' ?>
                                    </li>
                                    <li><i class="fa fa-phone"></i> <?= ($dados->telefone) ? $dados->telefone : '' ?>
                                    </li>
                                    <li><i class="fa fa-envelope"></i> <?= ($dados->email) ? $dados->email : '' ?></li>
                                    <br>
                                   
                                </ul>
                            </div>
                        </div>
                       

                        <div class="col col-md-3 col-sm-6">
                            <div class="widget about-widget">
                            <a href="<?= base_url() ?>"><img src="<?= base_url('uploads/'.$dados->logo) ?>"></a>
                                <ul class="contact-info" style="margin-top:40px"><br>
                                    <li><i class="fa fa-lock"></i> Nosso site conta com SSL e sistema de pagamento seguro integrado da <a href="http://pagar.me">Pagar.me</a>
                                    </li>
                                    

                                </ul>
                            </div>
                        </div>
                        

                        <div class="col col-md-6 col-sm-6" id="orcamento">
                            <div class="widget twitter-feed-widget contact-form-s1 form">
                                <h3>Dúvidas e/ou Orçamentos</h3>
                        
                            <form method="post" class="wpcf7-form">
                                <div>
                                    <label for="name">Nome</label>
                                    <input type="text" id="mail-nome" name="nome">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" id="mail-email" name="email">
                                </div>
                                <div>
                                    <label for="phone">Fone</label>
                                    <input type="text" id="mail-fone" name="fone">
                                </div>
                                <div>
                                    <label>Descreva sua necessidade</label>
                                    <textarea id="mail-mensagem"></textarea>
                                </div>
                                <div class="submit-btn-wrap">
                                    <input value="Enviar" class="theme-btn wpcf7-submit form-enviar-email" type="button">
                                  
                                </div>
                                <div class="error-handling-messages">
                                    <div id="success-mail" class="d-none alert alert-success ">Email enviado com sucesso! Obrigado</div>
                                    <div id="error-mail" class="d-none alert alert danger"> Ocorreu um erro ao enviar o email, tente novamente. </div>
                                </div>
                            </form>
                        
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> <!-- end upper-footer -->
            <div class="copyright-info">
                <div class="container">
                    <p>Copyright © <?= $dados->empresa ?> <?= date("Y") ?> . Todos os direitos reservados.
                        <a href="http://www.vectorzero.com.br" target="_blank">
                            <img style="height:20px;float:right" src="/uploads/vector.png" alt=""></a>
                    </p>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
    </div>
    <!-- end of page-wrapper -->
    <!-- Whatsapp button -->
    <div>
        <a href="https://api.whatsapp.com/send?phone=<?= ($dados->whatsapp) ? $dados->whatsapp : '' ?>&text=Ol%C3%A1%2C%20acabei%20de%20visitar%20seu%20site%20e%20gostaria%20de%20informa%C3%A7%C3%B5es%20sobre"
            target="_blank" title="Converse com a gente agora">
            <img class="whatsapp" src="<?= base_url('site')?>/whats_ico.png" width="70px" /></a>
    </div>
    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>


    <!-- Modal -->
    <?php   if (isset($popup)){ ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="background: #000">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
          
            foreach ($popup as $b) {  ?>
                    <a href="http://<?= $b->link ?>" title="Saiba Mais" class="mb-20">
                        <img class="img-fluid" src="<?= base_url('uploads/banners/'.$b->imagem) ?>">
                    </a>
                    <?php  } ?>

                </div>

            </div>
        </div>
    </div>
    <?php } ?>


    <!-- All JavaScript files
    ================================================== -->
    <script src="<?= base_url('site')?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url('site')?>/assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="<?= base_url('site')?>/assets/js/jquery-plugin-collection.js"></script>
    <script src="<?= base_url('site')?>/assets/js/jquery.mCustomScrollbar.js"></script>

    <!-- Custom script for this template -->
    <script src="<?= base_url('site')?>/assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script type="text/javascript">
    setTimeout(function() {
        $(".eapps-link").html('');
        $(".eapps-link").css('background-color', 'none');
        $(".eapps-link").css('background', 'none');

    }, 1500);
    </script>
    <script>
        $(document).on('click','.form-enviar-email',function(){
            
            var nome    = $('#mail-nome').val();
            var fone    = $('#mail-fone').val();
            var email   = $('#mail-email').val();
            var mensagem= $('#mail-mensagem').val();
                         
           
            $.ajax({
                type: "POST",
                url:  "http://codeigniter4.test/front/home/sendEmail",
                dataType: "json",
                data: {nome:nome, fone:fone, email:email,  mensagem:mensagem},
                success: function( resposta ){
                    if (resposta.erro == 0) {
                        $('#success-mail').removeClass('d-none');
                    }
                    if (resposta.erro == 1){
                        $('#error-mail').removeClass('d-none'); 
                    }
            
                },
                error: function(){
                    $('#error-mail').removeClass('d-none'); 
                }
             })

    
    });
    </script>

</body>

</html>