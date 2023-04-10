<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>

    
<div class="py-5  bg-white overflow-hidden mt-10">
  <div class="max-w-max lg:max-w-7xl mx-auto h-[600px]">
  <div id="example1"></div>
  <embed src="<?=base_url('/uploads/documentos/'.$file)?>" type="application/pdf" width="100%" height="100%">
  
</div>
</div>

<?= $this->endSection('content') ?>