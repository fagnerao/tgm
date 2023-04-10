<?= $this->extend('front/intranet/index.php') ?>
<?= $this->section('content') ?>
<div class="max-w-3xl font-serif mx-auto my-20 border-2 rounded-2xl">
    <section class="users ">
      <header class="bg-blue-600 p-4  rounded-2xl text-white" >
        <div class="flex gap-4 ">
          <img src="/uploads/avatar/<?= ($chatUser[0]->img)?$chatUser[0]->img : 'user.png' ?>" alt="Imagem do usuario">
            <div class="details">
            <span><?= $chatUser[0]->name ?></span>
            <p class="font-medium text-gray-900"><?= $chatUser[0]->status ?></p>
          </div>
          <div class="">
          <a href="/chat" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Voltar</a>
          </div>
      </header>
      <div class="chat-box min-h-2xl mt-2 min-w-2xl p-5 overflow-y-auto drop-shadow-lg border rounded-2xl">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?= $chatUser[0]->unique_id ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escreva sua mensagem..." autocomplete="off">
        <button class="bg-blue-600"><i class="ri-send-plane-fill"></i></button>
      </form>
    </section>
  </div>


<?= $this->endSection('content') ?>
   