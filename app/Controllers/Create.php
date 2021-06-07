<?php namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\KesebelasanModel;
use App\Models\BobotModel;

class Create extends BaseController
{
    public function index()
    {
        return view('new/index');
    }

    public function save()
    {
        $kesebelasanModel = new KesebelasanModel();
        $kandidatModel = new KandidatModel();
        $bobotModel = new BobotModel();

        $namaKesebelasan = $this->request->getVar('nama');
        $formasi = $this->request->getVar('formasi');

        // BOBOT PENGAMBIL KEPUTUSAN
        $bobotSpeed = $this->request->getVar('speed');
        $bobotHeading = $this->request->getVar('heading');
        $bobotControl = $this->request->getVar('control');
        $bobotPassing = $this->request->getVar('passing');

        // KANDIDAT KIPER
        $kandidatKiper = $this->request->getVar('kandidat-kiper');
        $kiperSpeed = $this->request->getVar('kiper-speed');
        $kiperHeading = $this->request->getVar('kiper-heading');
        $kiperControl = $this->request->getVar('kiper-control');
        $kiperPassing = $this->request->getVar('kiper-passing');

        // KANDIDAT BELAKANG
        $kandidatBelakang = $this->request->getVar('kandidat-belakang');
        $belakangSpeed = $this->request->getVar('belakang-speed');
        $belakangHeading = $this->request->getVar('belakang-heading');
        $belakangControl = $this->request->getVar('belakang-control');
        $belakangPassing = $this->request->getVar('belakang-passing');

        // KANDIDAT TENGAH
        $kandidatTengah = $this->request->getVar('kandidat-tengah');
        $tengahSpeed = $this->request->getVar('tengah-speed');
        $tengahHeading = $this->request->getVar('tengah-heading');
        $tengahControl = $this->request->getVar('tengah-control');
        $tengahPassing = $this->request->getVar('tengah-passing');

        // KANDIDAT DEPAN
        $kandidatDepan = $this->request->getVar('kandidat-depan');
        $depanSpeed = $this->request->getVar('depan-speed');
        $depanHeading = $this->request->getVar('depan-heading');
        $depanControl = $this->request->getVar('depan-control');
        $depanPassing = $this->request->getVar('depan-passing');

        $bobotModel->insert([
          'bobot_speed' => $bobotSpeed,
          'bobot_heading' => $bobotHeading,
          'bobot_control' => $bobotControl,
          'bobot_passing' => $bobotPassing
        ]);

        $bobotId = $bobotModel->orderBy('bobot_id', 'DESC')->first();

        $kesebelasanModel->insert([
          'kesebelasan_nama' => $namaKesebelasan,
          'formasi_id' => $formasi,
          'bobot_id' => $bobotId['bobot_id']
        ]);

        $kesebelasanId = $kesebelasanModel->orderBy('kesebelasan_id', 'DESC')->first();

        // INSERT KIPER
        foreach ($kandidatKiper as $key => $value) {
            $kandidatModel->insert([
              'kandidat_nama' => $value,
              'posisi_id' => 1,
              'kesebelasan_id' => $kesebelasanId['kesebelasan_id'],
              'kandidat_speed' => $kiperSpeed[$key],
              'kandidat_heading' => $kiperHeading[$key],
              'kandidat_control' => $kiperControl[$key],
              'kandidat_passing' => $kiperPassing[$key]
            ]);
        }

        // INSERT BELAKANG
        foreach ($kandidatBelakang as $key => $value) {
            $kandidatModel->insert([
              'kandidat_nama' => $value,
              'posisi_id' => 2,
              'kesebelasan_id' => $kesebelasanId['kesebelasan_id'],
              'kandidat_speed' => $belakangSpeed[$key],
              'kandidat_heading' => $belakangHeading[$key],
              'kandidat_control' => $belakangControl[$key],
              'kandidat_passing' => $belakangPassing[$key]
            ]);
        }

        // INSERT TENGAH
        foreach ($kandidatTengah as $key => $value) {
            $kandidatModel->insert([
              'kandidat_nama' => $value,
              'posisi_id' => 3,
              'kesebelasan_id' => $kesebelasanId['kesebelasan_id'],
              'kandidat_speed' => $tengahSpeed[$key],
              'kandidat_heading' => $tengahHeading[$key],
              'kandidat_control' => $tengahControl[$key],
              'kandidat_passing' => $tengahPassing[$key]
            ]);
        }

        // INSERT DEPAN
        foreach ($kandidatDepan as $key => $value) {
            $kandidatModel->insert([
              'kandidat_nama' => $value,
              'posisi_id' => 4,
              'kesebelasan_id' => $kesebelasanId['kesebelasan_id'],
              'kandidat_speed' => $depanSpeed[$key],
              'kandidat_heading' => $depanHeading[$key],
              'kandidat_control' => $depanControl[$key],
              'kandidat_passing' => $depanPassing[$key]
            ]);
        }

        $id = $kesebelasanModel->orderBy('kesebelasan_id', 'DESC')->first();

        return redirect()->to('/kesebelasan/hasil/'.$id['kesebelasan_id']);
    }

    //--------------------------------------------------------------------
}
