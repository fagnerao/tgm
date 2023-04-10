<?= $this->extend('front/site/index.php') ?>
<?= $this->section('content') ?>
<main>


    <div class="container">
        <div class="row" style="margin:100px 0 50px 0">
            <?php       $session = session();         echo $session->msg ; echo"<br>";?>
            <div class="section-title">
                <h3>Trabalhe <span>Conosco</span></h3>
            </div>
            <div class="col-md-12 mx-auto" style="background:#eee">

                <form class="form-horizontal" method="post" action="<?= base_url('front/home/enviarCurriculo')?>"
                    enctype="multipart/form-data">
                    <div class="form-group row pt-2">
                        <div class="col-sm-4">
                            <label for="inputFirstname">Nome</label>
                            <input type="text" value="" class="form-control form-box" id="" name="nome"
                                placeholder="Nome" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputFirstname">Email</label>
                            <input type="email" value="" class="form-control" id="" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputFirstname">Fone</label>
                            <input type="text" value="" class="form-control input_telefone" id="" name="fone"
                                placeholder="Fone" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputAddressLine1">Currículo</label>
                            <input type="file" class="form-control" name="imagem" placeholder=""><br>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary float-right"
                                style="margin-top:30px">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
     <!-- start of services -->
     <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-4">
                        <div class="section-title">
                            <h2>Nossos Serviços</h2>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-5">
                        <p>Cumprimento de prazos excelência na construção fazem parte do nosso lema e nosso dia a dia . Conheça um pouco dos serviços oferecidos por nossa empresa</p>
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
                                            <img src="<?=base_url('uploads/'.$s->imagem)?>" alt class="bg-image">
                                            <a href="<?= base_url('pagina/'.$s->slug) ?>">
                                                <h3><i class="fi flaticon-construction"></i><?= $s->titulo ?></h3>
                                            </a>
                                            <p>Ut enim ad minim veniam, quis nos trud exerci tation ullamco.</p>
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
        
</main>

<?= $this->endSection('content') ?>