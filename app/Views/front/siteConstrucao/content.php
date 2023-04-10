<main id="main">
    <?= $this->extend('front/site/index.php') ?>
    <?= $this->section('content') ?>
    <!-- start of hero -->
    <section class="hero hero-slider-wrapper">
        <div class="hero-slider hero-slider-style-1">
            <?php foreach ($slideshow as $b) { ?>
                <div class="slide">
                    <img src="<?= base_url('uploads/banners/' . $b->imagem) ?>" alt class="slider-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-8 col-sm-9 slide-caption">
                                <h2><?= $b->titulo ?> </h2>
                                <p></p>
                                <div class="btns">
                                    <a href="#sobre" class="theme-btn">Sobre nós</a>
                                    <a href="/register" class="theme-btn-s2">Cadastre-se</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start about -->
    <section class="section-padding offer-section" id="sobre">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <?php $model = model('App\Models\Front\Pagina_model');
                    $pagina = $model->getTexto(99);
                    ?>
                    <div class="col col-md-5">
                        <div class="section-title-s3">
                            <h2><?= $pagina[0]->titulo ?></h2>
                        </div>
                        <div class="offer-text">
                            <p><?= $pagina[0]->texto ?></p>
                            <a href="<?= $pagina[0]->titulo ?>" class="theme-btn read-more">Saiba mais</a>
                            
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <div class="offer-pic">
                            <img src="<?= base_url($pagina[0]->file) ?>" alt>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
    </section>
    <!-- end about -->
 <!-- start of services -->
 <section class="section-padding" style="padding:50px 0" id="servicos">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-3">
                        <div class="section-title">
                            <h2>Serviços Oferecidos</h2>
                        </div>
                    </div>
                    <div class="col col-lg-9 col-md-9">
                        <p>Segundo a ANS o tempo de espera no pronto-socorro pode ser de até duas horas, a depender da classificação de risco do paciente, isso sem mencionar a alta exposição a outras doenças presentes no ambiente hospitalar.</p>
                    </div>
                    
                </div> <!-- end row -->
                
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="services-grids service-slider dots-s1">
                            <?php foreach ($servicos as $s){ ?>
                            <div class="grid">
                               <div class="inner mk-bg-img">
                                    <div class="details ">
                                       <div class="info">
                                            <img src="<?=base_url($s->file)?>" alt class="bg-image">
                                            <a href="<?= base_url('pagina/'.$s->slug) ?>">
                                                <h3><i class="fi flaticon-construction"></i><?= $s->titulo ?></h3>
                                            </a>
                                            <p><?= word_limiter($s->texto,20) ?></p>
                                            <a href="<?= base_url('pagina/'.$s->slug) ?>" class="more">Saiba mais</a>
                                       </div>
                                    </div>
                               </div>
                            </div>
                            <?php } ?>
                        </div> <!-- end services-grids -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end of services -->
    <!-- news-section -->
    <section class="section-padding about-us-faq" id="faq">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="faq-section">
                    <div class="section-title-s3">
                        <span>FAQ</span>
                        <h2>Dúvidas frequentes</h2>
                    </div>
                    <div class="details">
                        <p>Encontre aqui respostas para algumas de suas dúvidas.</p>
                        <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
                            <?php foreach($duvidas as $d) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $d->id?>" aria-expanded="false" class="collapsed"><?=$d->titulo?></a>
                                </div>
                                <div id="collapse<?= $d->id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><?=$d->texto?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
    <div class="backhoe-loader">
        <img src="assets/images/backhoe-loader.png" alt="">
    </div>
</section>
    <!-- end news-section -->
</main><!-- End #main -->

<?= $this->endSection('content') ?>