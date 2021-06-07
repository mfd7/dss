<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<div class="container py-4">
  <div class="card-deck-wrapper">
    <div class="card-deck text-center">
      <div class="card p-2">
        <a class="card-block stretched-link text-decoration-none" href="home/create">
          <h2 class="card-title">Buat Kesebelasan Baru</h2>
          <img src="/assets/images/settings.png" alt="icon" class="icon-1">
          <p class="card-text">Buat kesebelasan baru untuk menentukan starting lineup</p>
        </a>
      </div>
      <div class="card p-2">
        <a class="card-block stretched-link text-decoration-none" href="home/kesebelasan">
          <h2 class="card-title">Lihat Kesebelasan</h2>
          <img src="/assets/images/list.png" alt="icon" class="icon-2">
          <p class="card-text">Lihat kesebelasan yang pernah dibuat</p>
        </a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
