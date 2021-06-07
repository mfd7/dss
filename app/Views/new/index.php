<?= $this->extend('layout/all'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
  <form class="" action="/create/save" method="post">
    <div class="accordion" id="accordionExample">
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <div class="card-header" id="headingOne">
            <h3 class="mb-0">
              Buat Kesebelasan Baru
            </h3>
          </div>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Kesebelasan</label>
              <input type="name" class="form-control" name="nama">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <div class="card-header" id="headingTwo">
            <h3 class="mb-0">
              Bobot Pengambil Keputusan
            </h3>
          </div>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <div class="form-group">
              <label>Speed</label>
              <input type="number" class="form-control" name="speed">
            </div>
            <div class="form-group">
              <label>Heading</label>
              <input type="number" class="form-control" name="heading">
            </div>
            <div class="form-group">
              <label>Ball Control</label>
              <input type="number" class="form-control" name="control">
            </div>
            <div class="form-group">
              <label>Passing</label>
              <input type="number" class="form-control" name="passing">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
          <div class="card-header" id="headingOne">
            <h3 class="mb-0">
              Formasi Kesebelasan
            </h3>
          </div>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <div class="form-group">
              <select class="form-control" id="formasi" name="formasi">
                <option selected disabled>Pilih Formasi</option>
                <option value="1">4-4-2</option>
                <option value="2">4-3-3</option>
                <option value="3">5-3-2</option>
                <option value="4">3-4-3</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <div class="card-header" id="headingFour">
            <h3 class="mb-0">
              Kandidat Kiper - 1 Kiper akan dipilih
            </h3>
          </div>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Speed</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Control</th>
                  <th scope="col">Passing</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="kiper"></tbody>
            </table>
            <button class="btn btn-md btn-primary" id="addKiper" type="button">
              Tambah Kandidat
            </button>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <div class="card-header" id="headingFour">
            <h3 class="mb-0" id="pemainBelakang">
              Kandidat Pemain Belakang - x Pemain akan dipilih
            </h3>
          </div>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Speed</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Control</th>
                  <th scope="col">Passing</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="belakang"></tbody>
            </table>
            <button class="btn btn-md btn-primary" id="addBelakang" type="button">
              Tambah Kandidat
            </button>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <div class="card-header" id="headingFour">
            <h3 class="mb-0" id="pemainTengah">
              Kandidat Pemain Tengah - x Pemain akan dipilih
            </h3>
          </div>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Speed</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Control</th>
                  <th scope="col">Passing</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="tengah"></tbody>
            </table>
            <button class="btn btn-md btn-primary" id="addTengah" type="button">
              Tambah Kandidat
            </button>
          </div>
        </div>
      </div>
      <div class="card">
        <a class="drop btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          <div class="card-header" id="headingFour">
            <h3 class="mb-0" id="pemainDepan">
              Kandidat Pemain Depan - x Pemain akan dipilih
            </h3>
          </div>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Speed</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Control</th>
                  <th scope="col">Passing</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="depan"></tbody>
            </table>
            <button class="btn btn-md btn-primary" id="addDepan" type="button">
              Tambah Kandidat
            </button>
          </div>
        </div>
      </div>
    </div>
    <button class="btn btn-success btn-block simpan" type="submit" name="button">Simpan</button>
  </form>
</div>

<script>
  $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addKiper').on('click', function () {

      // Adding a row inside the tbody.
      $('#kiper').append(
        `<tr id="R${++ rowIdx}">
             <td class="row-index text-center">
             <p>${rowIdx}</p>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kandidat-kiper[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kiper-speed[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kiper-heading[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kiper-control[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kiper-passing[]">
               </div>
             </td>
             <td class="text-center">
               <button class="btn btn-danger remove"
                 type="button">Hapus</button>
             </td>
              </tr>`
      );
    });

    // jQuery button click event to remove a row.
    $('#kiper').on('click', '.remove', function () {

      // Getting all the rows next to the row containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>
<script>
  $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addBelakang').on('click', function () {

      // Adding a row inside the tbody.
      $('#belakang').append(
        `<tr id="R${++ rowIdx}">
             <td class="row-index text-center">
             <p>${rowIdx}</p>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kandidat-belakang[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="belakang-speed[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="belakang-heading[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="belakang-control[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="belakang-passing[]">
               </div>
             </td>
             <td class="text-center">
               <button class="btn btn-danger remove"
                 type="button">Hapus</button>
             </td>
              </tr>`
      );
    });

    // jQuery button click event to remove a row.
    $('#belakang').on('click', '.remove', function () {

      // Getting all the rows next to the row containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>
<script>
  $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addTengah').on('click', function () {

      // Adding a row inside the tbody.
      $('#tengah').append(
        `<tr id="R${++ rowIdx}">
             <td class="row-index text-center">
             <p>${rowIdx}</p>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kandidat-tengah[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="tengah-speed[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="tengah-heading[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="tengah-control[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="tengah-passing[]">
               </div>
             </td>
             <td class="text-center">
               <button class="btn btn-danger remove"
                 type="button">Hapus</button>
             </td>
              </tr>`
      );
    });

    // jQuery button click event to remove a row.
    $('#tengah').on('click', '.remove', function () {

      // Getting all the rows next to the row containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>
<script>
  $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addDepan').on('click', function () {

      // Adding a row inside the tbody.
      $('#depan').append(
        `<tr id="R${++ rowIdx}">
             <td class="row-index text-center">
             <p>${rowIdx}</p>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="kandidat-depan[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="depan-speed[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="depan-heading[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="depan-control[]">
               </div>
             </td>
             <td>
               <div class="form-group">
                 <input type="name" class="form-control" name="depan-passing[]">
               </div>
             </td>
             <td class="text-center">
               <button class="btn btn-danger remove"
                 type="button">Hapus</button>
             </td>
              </tr>`
      );
    });

    // jQuery button click event to remove a row.
    $('#depan').on('click', '.remove', function () {

      // Getting all the rows next to the row containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('#formasi').on('change', function () {
      if(this.value == 1){
        $('#pemainBelakang').text("Kandidat Pemain Belakang - 4 Pemain akan dipilih");
        $('#pemainTengah').text("Kandidat Pemain Tengah - 4 Pemain akan dipilih");
        $('#pemainDepan').text("Kandidat Pemain Depan - 2 Pemain akan dipilih");
      }else if (this.value == 2) {
        $('#pemainBelakang').text("Kandidat Pemain Belakang - 4 Pemain akan dipilih");
        $('#pemainTengah').text("Kandidat Pemain Tengah - 3 Pemain akan dipilih");
        $('#pemainDepan').text("Kandidat Pemain Depan - 3 Pemain akan dipilih");
      }else if (this.value == 3) {
        $('#pemainBelakang').text("Kandidat Pemain Belakang - 5 Pemain akan dipilih");
        $('#pemainTengah').text("Kandidat Pemain Tengah - 3 Pemain akan dipilih");
        $('#pemainDepan').text("Kandidat Pemain Depan - 2 Pemain akan dipilih");
      }else if (this.value == 4) {
        $('#pemainBelakang').text("Kandidat Pemain Belakang - 3 Pemain akan dipilih");
        $('#pemainTengah').text("Kandidat Pemain Tengah - 4 Pemain akan dipilih");
        $('#pemainDepan').text("Kandidat Pemain Depan - 3 Pemain akan dipilih");
      }
    });
  });
</script>

<?= $this->endSection(); ?>
