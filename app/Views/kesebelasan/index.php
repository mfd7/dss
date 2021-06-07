<?= $this->extend('layout/all'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
  <div class="accordion">
    <?php foreach ($nama as $n) : ?>
      <form action="/kesebelasan/hasil/<?= $n['kesebelasan_id']; ?>" method="post">
        <div class="card">
          <button class="drop" type="submit">
            <div class="card-header">
              <h3 class="mb-0">
                <?= $n['kesebelasan_nama']; ?>
              </h3>
            </div>
          </button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection(); ?>
