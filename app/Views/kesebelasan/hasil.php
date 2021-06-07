<?= $this->extend('layout/all'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
  <div class="accordion" id="accordionExample">
    <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <div class="card-header" id="headingOne">
            <h3 class="mb-0">
              Informasi Kesebelasan
            </h3>
          </div>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="row">
              <div class="informasi">
                <h4>Nama Kesebelasan</h4>
              </div>
              <div class="pembatas">
                <h4>:</h4>
              </div>
              <div class="col">
                <h4><?= $kesebelasan['kesebelasan_nama']; ?></h4>
              </div>
            </div>
            <div class="row">
              <div class="informasi">
                <h4>Formasi</h4>
              </div>
              <div class="pembatas">
                <h4>:</h4>
              </div>
              <div class="col">
                <h4><?= $formasi['formasi_value']; ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <div class="card-header" id="headingTwo">
            <h3 class="mb-0">
              Kandidat Pemain
            </h3>
          </div>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead class="thead">
                <tr>
                  <th scope="col">Nama Pemain</th>
                  <th scope="col">Posisi</th>
                </tr>
              </thead>
              <tbody id="result">
                  <tr>
                    <?php foreach ($kandidatKiper as $b): ?>
                      <tr>
                        <td><?= $b['kandidat_nama']; ?></td>
                        <td>Kiper</td>
                      </tr>
                    <?php endforeach; ?>
                    <?php foreach ($kandidatBelakang as $b): ?>
                      <tr>
                        <td><?= $b['kandidat_nama']; ?></td>
                        <td>Pemain Belakang</td>
                      </tr>
                    <?php endforeach; ?>
                    <?php foreach ($kandidatTengah as $t): ?>
                      <tr>
                        <td><?= $t['kandidat_nama']; ?></td>
                        <td>Pemain Tengah</td>
                      </tr>
                    <?php endforeach; ?>
                    <?php foreach ($kandidatDepan as $d): ?>
                      <tr>
                        <td><?= $d['kandidat_nama']; ?></td>
                        <td>Pemain Depan</td>
                      </tr>
                    <?php endforeach; ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <div class="card-header" id="headingTwo">
            <h3 class="mb-0">
              Hasil Pemilihan Kesebelasan
            </h3>
          </div>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead class="thead">
                <tr>
                  <th scope="col">Nama Pemain</th>
                  <th scope="col">Posisi</th>
                </tr>
              </thead>
              <tbody id="result">
                  <tr>
                    <td><?= $kiper['kandidat_nama']; ?></td>
                    <td>Kiper</td>
                    <?php foreach ($belakang as $b): ?>
                      <tr>
                        <td><?= $b['kandidat_nama']; ?></td>
                        <td>Pemain Belakang</td>
                      </tr>
                    <?php endforeach; ?>
                    <?php foreach ($tengah as $t): ?>
                      <tr>
                        <td><?= $t['kandidat_nama']; ?></td>
                        <td>Pemain Tengah</td>
                      </tr>
                    <?php endforeach; ?>
                    <?php foreach ($depan as $d): ?>
                      <tr>
                        <td><?= $d['kandidat_nama']; ?></td>
                        <td>Pemain Depan</td>
                      </tr>
                    <?php endforeach; ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>
