<?= $this->extend('front/site/index.php') ?>
<?= $this->section('content') ?>


<div class="recent-articles">
    <div class="container">
        <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30 mt-30">
                        <h2><?= $noticias[0]->categoria?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style slick-initialized slick-slider slick-dotted">
                        <div class="container">
                            <div class="row">
                                <?php                     
                                foreach ($noticias as $nw) { ?>
                                    <!-- inicio -->
                                    <div class="single-recent mb-100 col-3">
                                        <div class="what-img">
                                            <img src="<?= $nw->file ?>" alt="" class="crop-news">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1"><?= $nw->categoria ?></span>
                                            <h4><a href="<?= base_url('pagina/' . $nw->slug) ?>"><?= $nw->titulo ?></a></h4>
                                        </div>
                                    </div>
                                    <!-- fim -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>