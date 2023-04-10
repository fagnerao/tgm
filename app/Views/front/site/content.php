<?= $this->extend('front/site/index.php') ?>
<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: linear-gradient(rgb(255 255 255 / 0%), rgb(3 5 8 / 43%)), url(../uploads/banners/<?= $banners[0]->imagem ?>) center center;">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 content text-center" style="padding-top:100px">
                
                <!--Inicio slideshow-->
                <div id="carouselExampleIndicators " class="carousel slide" data-bs-ride="carousel">
                    <?php 
                    $D = true;
                    $titles = explode (':', $banners[0]->titulo); 
                    $lines  = sizeof($titles);
                    
                    ?>
                  <div class="carousel-indicators" style="margin-bottom: 9rem;">
                    <?php for ($i=0; $i < $lines ; $i++){ ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" class="<?= ($D==true)?'active': '' ?>" aria-current="<?= ($D==true)?'true': '' ?>" aria-label=""></button>
                    <?php } ?>
                  </div>
                  <div class="carousel-inner">
                    <?php foreach ($titles as $t){ ?>
                    <div class="carousel-item <?= ($D==true)?'active': '' ?>">
                      <h1><?= $t ?></h1>
                    </div>
                    <?php $D=false; } ?>  
                  </div>
                  <?php  ?>
                </div>
                <!--final do slideshow-->
                <a href="#services" class="btn-get-started scrollto" style="margin-top:50px">Serviços</a>
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->
<!-- ======= About Section ======= -->
<section id="about" class="about">
        <div class="container">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch">
                    <div class="content">
                        <h3><?= $sobre[0]->titulo ?></h3>
                        <p>
                        <?= $sobre[0]->texto ?>
                        </p>
                        <a href="#" class="about-btn"><span>Sobre nós</span> <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" >
                                <i class="bx bx-receipt"></i>
                                <h4>Equipe Profissional</h4>
                                <p>Profissionais altamente qualificados para melhor atendê-lo.</p>
                            </div>
                            <div class="col-md-6 icon-box" >
                                <i class="bx bx-stopwatch"></i>
                                <h4>Execução Rápida</h4>
                                <p>Realizamos a consulta e a solução com qualidade e segurança, sempre em tempo hábil.</p>
                            </div>
                            <div class="col-md-6 icon-box" >
                                <i class="bx bx-message-dots"></i>
                                <h4>Atendimento Personalizado</h4>
                                <p>Especialistas em atendimento e relacionamento sempre disponíveis para ajudar com a sua necessidade.</p>
                            </div>
                            <div class="col-md-6 icon-box" >
                                <i class="bx bx-shield"></i>
                                <h4>Ferramentas Avançadas</h4>
                                <p>Possuímos os melhores e mais modernos softwares existentes no mercado.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg " style=" background: #253142;">
        <div class="container">

            <div class="section-title">
                <h2>Nossos Serviços</h2>
                <p>Fazemos tudo para falicitar a vida contábil da sua empresa</p>
            </div>
            <div class="row d-flex">
            <?php foreach($servicos as $s ){ ?>
                <div class="col-md-6 col-12">
                    <div class="icon-box" >
                        <i class="bi bi-bookmark"></i>
                        <h4><a href="<?= base_url('pagina/'.$s->slug)?>"> <?= $s->titulo?></a></h4>
                        <p><?= word_limiter($s->texto,20) ?></p>
                        <a href="<?= base_url('pagina/'.$s->slug)?>" class="btn btn-sm btn-secondary">Leia mais</a>
                    </div>
                </div>
                <?php } ?>   
            </div>

        </div>
    </section>
    <!-- End Services Section -->
   

    <!-- ======= Infos Section ======= -->
    <section id="pricing" class="pricing section-bg">
        <div class="container" id="blog">

            <div class="section-title" style="color:#2D2E34">
                <h2 >Consultas</h2>
               
            </div>

            <div class="row">
            
                <div class="col-lg-4 col-md-6">
                    <div class="box" >
                        <img 
                        src="uploads/cpf.webp" class="img-fluid rounded crop-news">
                        <h3>Consulta CPF</h3>
                        <span>
                        
                        </span>
                        <div class="btn-wrap">
                            <a href="https://www.receita.fazenda.gov.br/Aplicacoes/SSL/ATCTA/CPF/ConsultaPublica.asp" target="_blank" class="btn-buy">Saiba mais</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="box" >
                        <img 
                        src="uploads/cnpj.webp" class="img-fluid rounded crop-news">
                        <h3>Consulta CNPJ</h3>
                        <span>
                        
                        </span>
                        <div class="btn-wrap">
                            <a href="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="_blank" class="btn-buy">Saiba mais</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="box" >
                        <img 
                        src="uploads/links.jpg" class="img-fluid rounded crop-news">
                        <h3>Links Úteis</h3>
                        <span>
                        
                        </span>
                        <div class="btn-wrap">
                            <a href="https://assessoriacontabilcentral.com.br/pagina/links-uteis" class="btn-buy">Saiba mais</a>
                        </div>
                    </div>
                </div>
              
            </div>

        </div>
    </section>
    <!-- End Infos Section -->
   
    <!-- End Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contato</h2>
                <p>Dúvidas, reclamações ou sugestões ? Utilize uma das opções de contato ou fale direto pelo whatsapp</p>
            </div>

            <div class="row" >

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Endereço</h3>
                                <p><?= $dados->endereco ?> <?= $dados->cidade ?>-<?= $dados->estado ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p></i> <?= $dados->email ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Ligue-nos</h3>
                                <p></i> <?= $dados->telefone ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    
                        <div class="row">
                            <div class="col form-group mb-2">
                                <input type="text" name="name" class="form-control" id="nomeM" placeholder="Nome" required>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="emailM" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="fone" id="foneM" placeholder="Fone" required>
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control" name="message" id="mensagem" rows="5" placeholder="Menssagem" required></textarea>
                        </div>
                        
                        <div class="text-center"><button type="button" class="btn btn-sm btn-primary" id="emailAjax">Enviar mensagem</button></div>
                    
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

<?= $this->endSection('content') ?>