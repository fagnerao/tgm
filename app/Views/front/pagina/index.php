<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>
<div class="relative py-16 bg-white overflow-hidden">
  <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
    <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
      <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
      </svg>
     
     
    </div>
  </div>
  <div class="relative px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
    <div class="text-lg max-w-prose mx-auto">
      <h1>
        <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">notícia</span>
        <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl"><?= $noticia[0]->titulo ?></span>
      </h1>
    </div>
    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
    <p><?= $noticia[0]->texto ?></p>
     
    </div>
  </div>
</div>

<!-- gallery -->
<section class="overflow-hidden text-neutral-700">
  <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
    <div class="-m-1 flex flex-wrap md:-m-2">
    <?php
        $galeria = model('App\Models\Front\Pagina_model');
        $images = $galeria->getGaleria($noticia[0]->id);
        foreach ($images as $img) { 
    ?>
    <div class="flex lg:w-1/5 md:w-1/4 w-1/2 flex-wrap">
        <div class="w-full p-1 md:p-2">
        <a href="<?= $img->file ?>" data-lightbox="example-set" data-title="<?= $noticia[0]->titulo ?>">
          <img
            alt="gallery"
            class="block h-full w-full rounded-lg object-cover object-center"
            src="<?= $img->file ?>" />
        </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<?= $this->endSection('content') ?>
