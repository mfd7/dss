<?php namespace App\Controllers;

use App\Models\KesebelasanModel;
use App\Models\KandidatModel;
use App\Models\BobotModel;
use App\Models\FormasiModel;

class Kesebelasan extends BaseController
{
    public function index()
    {
        $kesebelasanModel = new KesebelasanModel();

        $data = [
          'nama' => $kesebelasanModel->paginate(10, 'tim')
        ];

        return view('kesebelasan/index', $data);
    }

    public function hasil($id)
    {
        $kandidatModel = new KandidatModel();
        $bobotModel = new BobotModel();
        $kesebelasanModel = new KesebelasanModel();
        $formasiModel = new FormasiModel();

        $formasiKesebelasan = $kesebelasanModel->where('kesebelasan_id', $id)->first();
        $formasi = $formasiModel->where('formasi_id', $formasiKesebelasan['formasi_id'])->first();
        $kandidatKiper = $kandidatModel->where('kesebelasan_id', $id)->where('posisi_id', '1')->findAll();
        $kandidatBelakang = $kandidatModel->where('kesebelasan_id', $id)->where('posisi_id', '2')->findAll();
        $kandidatTengah = $kandidatModel->where('kesebelasan_id', $id)->where('posisi_id', '3')->findAll();
        $kandidatDepan = $kandidatModel->where('kesebelasan_id', $id)->where('posisi_id', '4')->findAll();
        $kandidatSpeed = $kandidatModel->select('kandidat_speed')->where('kesebelasan_id', $id)->where('posisi_id', '1')->findAll();
        $kandidatHeading = $kandidatModel->select('kandidat_heading')->where('kesebelasan_id', $id)->where('posisi_id', '1')->findAll();
        $kandidatControl = $kandidatModel->select('kandidat_control')->where('kesebelasan_id', $id)->where('posisi_id', '1')->findAll();
        $kandidatPassing = $kandidatModel->select('kandidat_passing')->where('kesebelasan_id', $id)->where('posisi_id', '1')->findAll();
        $kandidatSpeedBelakang = $kandidatModel->select('kandidat_speed')->where('kesebelasan_id', $id)->where('posisi_id', '2')->findAll();
        $kandidatHeadingBelakang = $kandidatModel->select('kandidat_heading')->where('kesebelasan_id', $id)->where('posisi_id', '2')->findAll();
        $kandidatControlBelakang = $kandidatModel->select('kandidat_control')->where('kesebelasan_id', $id)->where('posisi_id', '2')->findAll();
        $kandidatPassingBelakang = $kandidatModel->select('kandidat_passing')->where('kesebelasan_id', $id)->where('posisi_id', '2')->findAll();
        $kandidatSpeedTengah = $kandidatModel->select('kandidat_speed')->where('kesebelasan_id', $id)->where('posisi_id', '3')->findAll();
        $kandidatHeadingTengah = $kandidatModel->select('kandidat_heading')->where('kesebelasan_id', $id)->where('posisi_id', '3')->findAll();
        $kandidatControlTengah = $kandidatModel->select('kandidat_control')->where('kesebelasan_id', $id)->where('posisi_id', '3')->findAll();
        $kandidatPassingTengah = $kandidatModel->select('kandidat_passing')->where('kesebelasan_id', $id)->where('posisi_id', '3')->findAll();
        $kandidatSpeedDepan = $kandidatModel->select('kandidat_speed')->where('kesebelasan_id', $id)->where('posisi_id', '4')->findAll();
        $kandidatHeadingDepan = $kandidatModel->select('kandidat_heading')->where('kesebelasan_id', $id)->where('posisi_id', '4')->findAll();
        $kandidatControlDepan = $kandidatModel->select('kandidat_control')->where('kesebelasan_id', $id)->where('posisi_id', '4')->findAll();
        $kandidatPassingDepan = $kandidatModel->select('kandidat_passing')->where('kesebelasan_id', $id)->where('posisi_id', '4')->findAll();
        $bobotId = $kesebelasanModel->select('bobot_id')->where('kesebelasan_id', $id)->findAll();
        $nilaiBobot = $bobotModel->where('bobot_id', $bobotId[0])->findAll();
        $bobot = array(0, $nilaiBobot[0]['bobot_speed'], $nilaiBobot[0]['bobot_heading'], $nilaiBobot[0]['bobot_control'], $nilaiBobot[0]['bobot_passing']);

        //CARI PEMAIN DEPAN
        $pembobotanSpeedKiper = $this->pembobotanSpeed($this->normalisasiSpeed($kandidatSpeed), $nilaiBobot);
        $pembobotanHeadingKiper = $this->pembobotanHeading($this->normalisasiHeading($kandidatHeading), $nilaiBobot);
        $pembobotanControlKiper = $this->pembobotanControl($this->normalisasiControl($kandidatControl), $nilaiBobot);
        $pembobotanPassingKiper = $this->pembobotanPassing($this->normalisasiPassing($kandidatPassing), $nilaiBobot);

        $himpunanSpeedCon = array();
        $himpunanSpeedDis = array();
        for ($i = 0; $i < count($pembobotanSpeedKiper); $i++) {
            for ($j = 0; $j < count($pembobotanSpeedKiper); $j++) {
                if ($pembobotanSpeedKiper[$i] >= $pembobotanSpeedKiper[$j] && $i != $j) {
                    array_push($himpunanSpeedCon, 1);
                    array_push($himpunanSpeedDis, 0);
                } elseif ($pembobotanSpeedKiper[$i] < $pembobotanSpeedKiper[$j] && $i != $j) {
                    array_push($himpunanSpeedCon, 0);
                    array_push($himpunanSpeedDis, 1);
                }
            }
        }

        $himpunanHeadingCon = array();
        $himpunanHeadingDis = array();
        for ($i = 0; $i < count($pembobotanHeadingKiper); $i++) {
            for ($j = 0; $j < count($pembobotanHeadingKiper); $j++) {
                if ($pembobotanHeadingKiper[$i] >= $pembobotanHeadingKiper[$j] && $i != $j) {
                    array_push($himpunanHeadingCon, 2);
                    array_push($himpunanHeadingDis, 0);
                } elseif ($pembobotanHeadingKiper[$i] < $pembobotanHeadingKiper[$j] && $i != $j) {
                    array_push($himpunanHeadingCon, 0);
                    array_push($himpunanHeadingDis, 2);
                }
            }
        }

        $himpunanControlCon = array();
        $himpunanControlDis = array();
        for ($i = 0; $i < count($pembobotanControlKiper); $i++) {
            for ($j = 0; $j < count($pembobotanControlKiper); $j++) {
                if ($pembobotanControlKiper[$i] >= $pembobotanControlKiper[$j] && $i != $j) {
                    array_push($himpunanControlCon, 3);
                    array_push($himpunanControlDis, 0);
                } elseif ($pembobotanControlKiper[$i] < $pembobotanControlKiper[$j] && $i != $j) {
                    array_push($himpunanControlCon, 0);
                    array_push($himpunanControlDis, 3);
                }
            }
        }

        $himpunanPassingCon = array();
        $himpunanPassingDis = array();
        for ($i = 0; $i < count($pembobotanPassingKiper); $i++) {
            for ($j = 0; $j < count($pembobotanPassingKiper); $j++) {
                if ($pembobotanPassingKiper[$i] >= $pembobotanPassingKiper[$j] && $i != $j) {
                    array_push($himpunanPassingCon, 4);
                    array_push($himpunanPassingDis, 0);
                } elseif ($pembobotanPassingKiper[$i] < $pembobotanPassingKiper[$j] && $i != $j) {
                    array_push($himpunanPassingCon, 0);
                    array_push($himpunanPassingDis, 4);
                }
            }
        }

        $himpunanConcordanceKiper = $this->himpunanConcordance(
            $himpunanSpeedCon,
            $himpunanHeadingCon,
            $himpunanControlCon,
            $himpunanPassingCon
        );

        $concordanceKiper = $this->concordance(
            $himpunanConcordanceKiper,
            $bobot
        );

        $vKiper = $this->getV(
            $pembobotanSpeedKiper,
            $pembobotanHeadingKiper,
            $pembobotanControlKiper,
            $pembobotanPassingKiper
        );

        $himpunanDiscordanceKiper = $this->himpunanDiscordance(
            $himpunanSpeedDis,
            $himpunanHeadingDis,
            $himpunanControlDis,
            $himpunanPassingDis
        );

        $discordanceKiper = $this->discordance(
            $pembobotanSpeedKiper,
            $himpunanDiscordanceKiper,
            $vKiper
        );

        $hasilKiper = array();
        $m = 0;
        $n = 0;
        for ($i = 0; $i < count($pembobotanSpeedKiper); $i++) {
            $m = 0;
            for ($j = 0; $j < count($pembobotanSpeedKiper) -1; $j++) {
                $m = $m + $concordanceKiper[$j+$n] - $discordanceKiper[$j+$n];
            }
            array_push($hasilKiper, $m);
            $n = $n+count($pembobotanSpeedKiper) -1;
        }

        //CARI PEMAIN BELAKANG
        $pembobotanSpeedBelakang = $this->pembobotanSpeed($this->normalisasiSpeed($kandidatSpeedBelakang), $nilaiBobot);
        $pembobotanHeadingBelakang = $this->pembobotanHeading($this->normalisasiHeading($kandidatHeadingBelakang), $nilaiBobot);
        $pembobotanControlBelakang = $this->pembobotanControl($this->normalisasiControl($kandidatControlBelakang), $nilaiBobot);
        $pembobotanPassingBelakang = $this->pembobotanPassing($this->normalisasiPassing($kandidatPassingBelakang), $nilaiBobot);

        $himpunanSpeedConBelakang = array();
        $himpunanSpeedDisBelakang = array();
        for ($i = 0; $i < count($pembobotanSpeedBelakang); $i++) {
            for ($j = 0; $j < count($pembobotanSpeedBelakang); $j++) {
                if ($pembobotanSpeedBelakang[$i] >= $pembobotanSpeedBelakang[$j] && $i != $j) {
                    array_push($himpunanSpeedConBelakang, 1);
                    array_push($himpunanSpeedDisBelakang, 0);
                } elseif ($pembobotanSpeedBelakang[$i] < $pembobotanSpeedBelakang[$j] && $i != $j) {
                    array_push($himpunanSpeedConBelakang, 0);
                    array_push($himpunanSpeedDisBelakang, 1);
                }
            }
        }

        $himpunanHeadingConBelakang = array();
        $himpunanHeadingDisBelakang = array();
        for ($i = 0; $i < count($pembobotanHeadingBelakang); $i++) {
            for ($j = 0; $j < count($pembobotanHeadingBelakang); $j++) {
                if ($pembobotanHeadingBelakang[$i] >= $pembobotanHeadingBelakang[$j] && $i != $j) {
                    array_push($himpunanHeadingConBelakang, 2);
                    array_push($himpunanHeadingDisBelakang, 0);
                } elseif ($pembobotanHeadingBelakang[$i] < $pembobotanHeadingBelakang[$j] && $i != $j) {
                    array_push($himpunanHeadingConBelakang, 0);
                    array_push($himpunanHeadingDisBelakang, 2);
                }
            }
        }

        $himpunanControlConBelakang = array();
        $himpunanControlDisBelakang = array();
        for ($i = 0; $i < count($pembobotanControlBelakang); $i++) {
            for ($j = 0; $j < count($pembobotanControlBelakang); $j++) {
                if ($pembobotanControlBelakang[$i] >= $pembobotanControlBelakang[$j] && $i != $j) {
                    array_push($himpunanControlConBelakang, 3);
                    array_push($himpunanControlDisBelakang, 0);
                } elseif ($pembobotanControlBelakang[$i] < $pembobotanControlBelakang[$j] && $i != $j) {
                    array_push($himpunanControlConBelakang, 0);
                    array_push($himpunanControlDisBelakang, 3);
                }
            }
        }

        $himpunanPassingConBelakang = array();
        $himpunanPassingDisBelakang = array();
        for ($i = 0; $i < count($pembobotanPassingBelakang); $i++) {
            for ($j = 0; $j < count($pembobotanPassingBelakang); $j++) {
                if ($pembobotanPassingBelakang[$i] >= $pembobotanPassingBelakang[$j] && $i != $j) {
                    array_push($himpunanPassingConBelakang, 4);
                    array_push($himpunanPassingDisBelakang, 0);
                } elseif ($pembobotanPassingBelakang[$i] < $pembobotanPassingBelakang[$j] && $i != $j) {
                    array_push($himpunanPassingConBelakang, 0);
                    array_push($himpunanPassingDisBelakang, 4);
                }
            }
        }

        $himpunanConcordanceBelakang = $this->himpunanConcordance(
            $himpunanSpeedConBelakang,
            $himpunanHeadingConBelakang,
            $himpunanControlConBelakang,
            $himpunanPassingConBelakang
        );

        $concordanceBelakang = $this->concordance(
            $himpunanConcordanceBelakang,
            $bobot
        );

        $vBelakang = $this->getV(
            $pembobotanSpeedBelakang,
            $pembobotanHeadingBelakang,
            $pembobotanControlBelakang,
            $pembobotanPassingBelakang
        );

        $himpunanDiscordanceBelakang = $this->himpunanDiscordance(
            $himpunanSpeedDisBelakang,
            $himpunanHeadingDisBelakang,
            $himpunanControlDisBelakang,
            $himpunanPassingDisBelakang
        );

        $discordanceBelakang = $this->discordance(
            $pembobotanSpeedBelakang,
            $himpunanDiscordanceBelakang,
            $vBelakang
        );

        $hasilBelakang = array();
        $m = 0;
        $n = 0;
        for ($i = 0; $i < count($pembobotanSpeedBelakang); $i++) {
            $m = 0;
            for ($j = 0; $j < count($pembobotanSpeedBelakang) -1; $j++) {
                $m = $m + $concordanceBelakang[$j+$n] - $discordanceBelakang[$j+$n];
            }
            array_push($hasilBelakang, $m);
            $n = $n+count($pembobotanSpeedBelakang) -1;
        }

        arsort($hasilBelakang);
        $hasilBelakang = array_keys($hasilBelakang);
        $hasilBelakang = array_slice($hasilBelakang, 0, $formasi['formasi_belakang']);
        $pemainBelakang = array();

        for ($i = 0; $i < $formasi['formasi_belakang']; $i++) {
            array_push($pemainBelakang, $kandidatBelakang[$hasilBelakang[$i]]);
        }

        //CARI PEMAIN TENGAH
        $pembobotanSpeedTengah = $this->pembobotanSpeed($this->normalisasiSpeed($kandidatSpeedTengah), $nilaiBobot);
        $pembobotanHeadingTengah = $this->pembobotanHeading($this->normalisasiHeading($kandidatHeadingTengah), $nilaiBobot);
        $pembobotanControlTengah= $this->pembobotanControl($this->normalisasiControl($kandidatControlTengah), $nilaiBobot);
        $pembobotanPassingTengah = $this->pembobotanPassing($this->normalisasiPassing($kandidatPassingTengah), $nilaiBobot);

        $himpunanSpeedConTengah = array();
        $himpunanSpeedDisTengah = array();
        for ($i = 0; $i < count($pembobotanSpeedTengah); $i++) {
            for ($j = 0; $j < count($pembobotanSpeedTengah); $j++) {
                if ($pembobotanSpeedTengah[$i] >= $pembobotanSpeedTengah[$j] && $i != $j) {
                    array_push($himpunanSpeedConTengah, 1);
                    array_push($himpunanSpeedDisTengah, 0);
                } elseif ($pembobotanSpeedTengah[$i] < $pembobotanSpeedTengah[$j] && $i != $j) {
                    array_push($himpunanSpeedConTengah, 0);
                    array_push($himpunanSpeedDisTengah, 1);
                }
            }
        }

        $himpunanHeadingConTengah = array();
        $himpunanHeadingDisTengah = array();
        for ($i = 0; $i < count($pembobotanHeadingTengah); $i++) {
            for ($j = 0; $j < count($pembobotanHeadingTengah); $j++) {
                if ($pembobotanHeadingTengah[$i] >= $pembobotanHeadingTengah[$j] && $i != $j) {
                    array_push($himpunanHeadingConTengah, 2);
                    array_push($himpunanHeadingDisTengah, 0);
                } elseif ($pembobotanHeadingTengah[$i] < $pembobotanHeadingTengah[$j] && $i != $j) {
                    array_push($himpunanHeadingConTengah, 0);
                    array_push($himpunanHeadingDisTengah, 2);
                }
            }
        }

        $himpunanControlConTengah = array();
        $himpunanControlDisTengah = array();
        for ($i = 0; $i < count($pembobotanControlTengah); $i++) {
            for ($j = 0; $j < count($pembobotanControlTengah); $j++) {
                if ($pembobotanControlTengah[$i] >= $pembobotanControlTengah[$j] && $i != $j) {
                    array_push($himpunanControlConTengah, 3);
                    array_push($himpunanControlDisTengah, 0);
                } elseif ($pembobotanControlTengah[$i] < $pembobotanControlTengah[$j] && $i != $j) {
                    array_push($himpunanControlConTengah, 0);
                    array_push($himpunanControlDisTengah, 3);
                }
            }
        }

        $himpunanPassingConTengah = array();
        $himpunanPassingDisTengah = array();
        for ($i = 0; $i < count($pembobotanPassingTengah); $i++) {
            for ($j = 0; $j < count($pembobotanPassingTengah); $j++) {
                if ($pembobotanPassingTengah[$i] >= $pembobotanPassingTengah[$j] && $i != $j) {
                    array_push($himpunanPassingConTengah, 4);
                    array_push($himpunanPassingDisTengah, 0);
                } elseif ($pembobotanPassingTengah[$i] < $pembobotanPassingTengah[$j] && $i != $j) {
                    array_push($himpunanPassingConTengah, 0);
                    array_push($himpunanPassingDisTengah, 4);
                }
            }
        }

        $himpunanConcordanceTengah = $this->himpunanConcordance(
            $himpunanSpeedConTengah,
            $himpunanHeadingConTengah,
            $himpunanControlConTengah,
            $himpunanPassingConTengah
        );

        $concordanceTengah = $this->concordance(
            $himpunanConcordanceTengah,
            $bobot
        );

        $vTengah = $this->getV(
            $pembobotanSpeedTengah,
            $pembobotanHeadingTengah,
            $pembobotanControlTengah,
            $pembobotanPassingTengah
        );

        $himpunanDiscordanceTengah = $this->himpunanDiscordance(
            $himpunanSpeedDisTengah,
            $himpunanHeadingDisTengah,
            $himpunanControlDisTengah,
            $himpunanPassingDisTengah
        );

        $discordanceTengah = $this->discordance(
            $pembobotanSpeedTengah,
            $himpunanDiscordanceTengah,
            $vTengah
        );

        $hasilTengah = array();
        $m = 0;
        $n = 0;
        for ($i = 0; $i < count($pembobotanSpeedTengah); $i++) {
            $m = 0;
            for ($j = 0; $j < count($pembobotanSpeedTengah) -1; $j++) {
                $m = $m + $concordanceTengah[$j+$n] - $discordanceTengah[$j+$n];
            }
            array_push($hasilTengah, $m);
            $n = $n+count($pembobotanSpeedTengah) -1;
        }

        arsort($hasilTengah);
        $hasilTengah = array_keys($hasilTengah);
        $hasilTengah = array_slice($hasilTengah, 0, $formasi['formasi_tengah']);
        $pemainTengah = array();

        for ($i = 0; $i < $formasi['formasi_tengah']; $i++) {
            array_push($pemainTengah, $kandidatTengah[$hasilTengah[$i]]);
        }

        //CARI PEMAIN DEPAN
        $pembobotanSpeedDepan = $this->pembobotanSpeed($this->normalisasiSpeed($kandidatSpeedDepan), $nilaiBobot);
        $pembobotanHeadingDepan = $this->pembobotanHeading($this->normalisasiHeading($kandidatHeadingDepan), $nilaiBobot);
        $pembobotanControlDepan= $this->pembobotanControl($this->normalisasiControl($kandidatControlDepan), $nilaiBobot);
        $pembobotanPassingDepan = $this->pembobotanPassing($this->normalisasiPassing($kandidatPassingDepan), $nilaiBobot);

        $himpunanSpeedConDepan = array();
        $himpunanSpeedDisDepan = array();
        for ($i = 0; $i < count($pembobotanSpeedDepan); $i++) {
            for ($j = 0; $j < count($pembobotanSpeedDepan); $j++) {
                if ($pembobotanSpeedDepan[$i] >= $pembobotanSpeedDepan[$j] && $i != $j) {
                    array_push($himpunanSpeedConDepan, 1);
                    array_push($himpunanSpeedDisDepan, 0);
                } elseif ($pembobotanSpeedDepan[$i] < $pembobotanSpeedDepan[$j] && $i != $j) {
                    array_push($himpunanSpeedConDepan, 0);
                    array_push($himpunanSpeedDisDepan, 1);
                }
            }
        }

        $himpunanHeadingConDepan = array();
        $himpunanHeadingDisDepan = array();
        for ($i = 0; $i < count($pembobotanHeadingDepan); $i++) {
            for ($j = 0; $j < count($pembobotanHeadingDepan); $j++) {
                if ($pembobotanHeadingDepan[$i] >= $pembobotanHeadingDepan[$j] && $i != $j) {
                    array_push($himpunanHeadingConDepan, 2);
                    array_push($himpunanHeadingDisDepan, 0);
                } elseif ($pembobotanHeadingDepan[$i] < $pembobotanHeadingDepan[$j] && $i != $j) {
                    array_push($himpunanHeadingConDepan, 0);
                    array_push($himpunanHeadingDisDepan, 2);
                }
            }
        }

        $himpunanControlConDepan = array();
        $himpunanControlDisDepan = array();
        for ($i = 0; $i < count($pembobotanControlDepan); $i++) {
            for ($j = 0; $j < count($pembobotanControlDepan); $j++) {
                if ($pembobotanControlDepan[$i] >= $pembobotanControlDepan[$j] && $i != $j) {
                    array_push($himpunanControlConDepan, 3);
                    array_push($himpunanControlDisDepan, 0);
                } elseif ($pembobotanControlDepan[$i] < $pembobotanControlDepan[$j] && $i != $j) {
                    array_push($himpunanControlConDepan, 0);
                    array_push($himpunanControlDisDepan, 3);
                }
            }
        }

        $himpunanPassingConDepan = array();
        $himpunanPassingDisDepan = array();
        for ($i = 0; $i < count($pembobotanPassingDepan); $i++) {
            for ($j = 0; $j < count($pembobotanPassingDepan); $j++) {
                if ($pembobotanPassingDepan[$i] >= $pembobotanPassingDepan[$j] && $i != $j) {
                    array_push($himpunanPassingConDepan, 4);
                    array_push($himpunanPassingDisDepan, 0);
                } elseif ($pembobotanPassingDepan[$i] < $pembobotanPassingDepan[$j] && $i != $j) {
                    array_push($himpunanPassingConDepan, 0);
                    array_push($himpunanPassingDisDepan, 4);
                }
            }
        }

        $himpunanConcordanceDepan = $this->himpunanConcordance(
            $himpunanSpeedConDepan,
            $himpunanHeadingConDepan,
            $himpunanControlConDepan,
            $himpunanPassingConDepan
        );

        $concordanceDepan = $this->concordance(
            $himpunanConcordanceDepan,
            $bobot
        );

        $vDepan = $this->getV(
            $pembobotanSpeedDepan,
            $pembobotanHeadingDepan,
            $pembobotanControlDepan,
            $pembobotanPassingDepan
        );

        $himpunanDiscordanceDepan = $this->himpunanDiscordance(
            $himpunanSpeedDisDepan,
            $himpunanHeadingDisDepan,
            $himpunanControlDisDepan,
            $himpunanPassingDisDepan
        );

        $discordanceDepan = $this->discordance(
            $pembobotanSpeedDepan,
            $himpunanDiscordanceDepan,
            $vDepan
        );

        $hasilDepan = array();
        $m = 0;
        $n = 0;
        for ($i = 0; $i < count($pembobotanSpeedDepan); $i++) {
            $m = 0;
            for ($j = 0; $j < count($pembobotanSpeedDepan) -1; $j++) {
                $m = $m + $concordanceDepan[$j+$n] - $discordanceDepan[$j+$n];
            }
            array_push($hasilDepan, $m);
            $n = $n+count($pembobotanSpeedDepan) -1;
        }

        arsort($hasilDepan);
        $hasilDepan = array_keys($hasilDepan);
        $hasilDepan = array_slice($hasilDepan, 0, $formasi['formasi_depan']);
        $pemainDepan = array();

        for ($i = 0; $i < $formasi['formasi_depan']; $i++) {
            array_push($pemainDepan, $kandidatDepan[$hasilDepan[$i]]);
        }

        $data = [
        'kiper' => $kandidatKiper[max(array_keys($hasilKiper))],
        'belakang' => $pemainBelakang,
        'tengah' => $pemainTengah,
        'depan' => $pemainDepan,
        'kandidatKiper' => $kandidatKiper,
        'kandidatBelakang' => $kandidatBelakang,
        'kandidatTengah' => $kandidatTengah,
        'kandidatDepan' => $kandidatDepan,
        'kesebelasan' => $formasiKesebelasan,
        'formasi' => $formasi
      ];

        return view('kesebelasan/hasil', $data);
    }

    public function normalisasiSpeed($kandidatSpeed)
    {
        $sigmaSpeed = 0;
        $normalisasiSpeed = array();
        foreach ($kandidatSpeed as $s) {
            $sigmaSpeed = $sigmaSpeed + $s['kandidat_speed'] * $s['kandidat_speed'];
        }
        $akarSpeed = sqrt($sigmaSpeed);

        foreach ($kandidatSpeed as $s) {
            array_push($normalisasiSpeed, $s['kandidat_speed']/$akarSpeed);
        }

        return $normalisasiSpeed;
    }

    public function pembobotanSpeed($normalisasiSpeed, $nilaiBobot)
    {
        $pembobotanSpeed = array();

        foreach ($normalisasiSpeed as $n) {
            array_push($pembobotanSpeed, $n*$nilaiBobot[0]['bobot_speed']);
        }

        return $pembobotanSpeed;
    }

    public function normalisasiHeading($kandidatHeading)
    {
        $sigmaHeading = 0;
        $normalisasiHeading = array();
        foreach ($kandidatHeading as $s) {
            $sigmaHeading = $sigmaHeading + $s['kandidat_heading'] * $s['kandidat_heading'];
        }
        $akarHeading = sqrt($sigmaHeading);

        foreach ($kandidatHeading as $s) {
            array_push($normalisasiHeading, $s['kandidat_heading']/$akarHeading);
        }

        return $normalisasiHeading;
    }

    public function pembobotanHeading($normalisasiHeading, $nilaiBobot)
    {
        $pembobotanHeading = array();
        foreach ($normalisasiHeading as $n) {
            array_push($pembobotanHeading, $n*$nilaiBobot[0]['bobot_heading']);
        }

        return $pembobotanHeading;
    }

    public function normalisasiControl($kandidatControl)
    {
        $sigmaControl = 0;
        $normalisasiControl = array();
        foreach ($kandidatControl as $s) {
            $sigmaControl = $sigmaControl + $s['kandidat_control'] * $s['kandidat_control'];
        }
        $akarControl = sqrt($sigmaControl);

        foreach ($kandidatControl as $s) {
            array_push($normalisasiControl, $s['kandidat_control']/$akarControl);
        }

        return $normalisasiControl;
    }

    public function pembobotanControl($normalisasiControl, $nilaiBobot)
    {
        $pembobotanControl = array();
        foreach ($normalisasiControl as $n) {
            array_push($pembobotanControl, $n*$nilaiBobot[0]['bobot_control']);
        }

        return $pembobotanControl;
    }

    public function normalisasiPassing($kandidatPassing)
    {
        $sigmaPassing = 0;
        $normalisasiPassing = array();
        foreach ($kandidatPassing as $s) {
            $sigmaPassing = $sigmaPassing + $s['kandidat_passing'] * $s['kandidat_passing'];
        }
        $akarPassing = sqrt($sigmaPassing);

        foreach ($kandidatPassing as $s) {
            array_push($normalisasiPassing, $s['kandidat_passing']/$akarPassing);
        }

        return $normalisasiPassing;
    }

    public function pembobotanPassing($normalisasiPassing, $nilaiBobot)
    {
        $pembobotanPassing = array();
        foreach ($normalisasiPassing as $n) {
            array_push($pembobotanPassing, $n*$nilaiBobot[0]['bobot_passing']);
        }

        return $pembobotanPassing;
    }

    public function himpunanConcordance($himpunanSpeedCon, $himpunanHeadingCon, $himpunanControlCon, $himpunanPassingCon)
    {
        $himpunanConcordance = array();
        for ($i = 0; $i < count($himpunanPassingCon); $i++) {
            array_push($himpunanConcordance, $himpunanSpeedCon[$i]);
            array_push($himpunanConcordance, $himpunanHeadingCon[$i]);
            array_push($himpunanConcordance, $himpunanControlCon[$i]);
            array_push($himpunanConcordance, $himpunanPassingCon[$i]);
        }

        return $himpunanConcordance;
    }

    public function himpunanDiscordance($himpunanSpeedDis, $himpunanHeadingDis, $himpunanControlDis, $himpunanPassingDis)
    {
        $himpunanDiscordance = array();
        for ($i = 0; $i < count($himpunanPassingDis); $i++) {
            array_push($himpunanDiscordance, $himpunanSpeedDis[$i]);
            array_push($himpunanDiscordance, $himpunanHeadingDis[$i]);
            array_push($himpunanDiscordance, $himpunanControlDis[$i]);
            array_push($himpunanDiscordance, $himpunanPassingDis[$i]);
        }

        return $himpunanDiscordance;
    }

    public function concordance($himpunanConcordance, $bobot)
    {
        $concordance = array();
        $iterator = 0;
        while ($iterator < count($himpunanConcordance)) {
            array_push($concordance, $bobot[$himpunanConcordance[$iterator]] + $bobot[$himpunanConcordance[$iterator+1]] + $bobot[$himpunanConcordance[$iterator+2]] + $bobot[$himpunanConcordance[$iterator+3]]);
            $iterator = $iterator+4;
        }

        return $concordance;
    }

    public function discordance($pembobotanSpeed, $himpunanDiscordance, $v)
    {
        $discordance = array();
        $k = 0;
        $l = 0;
        for ($i = 1; $i <= count($pembobotanSpeed); $i++) {
            for ($j = 1; $j <= count($pembobotanSpeed); $j++) {
                if ($i != $j) {
                    array_push($discordance, max(
                        abs($v[$i][$himpunanDiscordance[$k]] - $v[$j][$himpunanDiscordance[$k]]),
                        abs($v[$i][$himpunanDiscordance[$k+1]] - $v[$j][$himpunanDiscordance[$k+1]]),
                        abs($v[$i][$himpunanDiscordance[$k+2]] - $v[$j][$himpunanDiscordance[$k+2]]),
                        abs($v[$i][$himpunanDiscordance[$k+3]] - $v[$j][$himpunanDiscordance[$k+3]])
                    )/max(
                        abs($v[$i][$l] - $v[$j][$l]),
                        abs($v[$i][$l+1] - $v[$j][$l+1]),
                        abs($v[$i][$l+2] - $v[$j][$l+2]),
                        abs($v[$i][$l+3] - $v[$j][$l+3])
                    ));
                    $k = $k+4;
                }
            }
        }

        return $discordance;
    }

    public function getV($pembobotanSpeed, $pembobotanHeading, $pembobotanControl, $pembobotanPassing)
    {
        $v = array();
        $v[0][0] = 0;
        $v[0][1] = 0;
        $v[0][2] = 0;
        $v[0][3] = 0;
        $v[0][4] = 0;
        for ($i = 1; $i <= count($pembobotanSpeed); $i++) {
            $v[$i][0] = 0;
            $v[$i][0] = 0;
            $v[$i][0] = 0;
            $v[$i][0] = 0;
            $v[$i][1] = $pembobotanSpeed[$i-1];
            $v[$i][2] = $pembobotanHeading[$i-1];
            $v[$i][3] = $pembobotanControl[$i-1];
            $v[$i][4] = $pembobotanPassing[$i-1];
        }

        return $v;
    }
    //--------------------------------------------------------------------
}
