<?php
class Ubezpieczenie extends AutoZDodatkami {
    private $procent_ubezpieczenia;
    private $liczba_lat_posiadania;

    public function __construct($model, $cena_euro, $kurs_euro_pln, $alarm, $radio, $klimatyzacja, $procent_ubezpieczenia, $liczba_lat_posiadania) {
        parent::__construct($model, $cena_euro, $kurs_euro_pln, $alarm, $radio, $klimatyzacja);
        $this->procent_ubezpieczenia = $procent_ubezpieczenia;
        $this->liczba_lat_posiadania = $liczba_lat_posiadania;
    }

    public function obliczCene() {
        $cena_z_dodatkami = parent::obliczCene();
        $cena_ubezpieczenia = $this->procent_ubezpieczenia * ($cena_z_dodatkami * ((100 - $this->liczba_lat_posiadania) / 100));
        return $cena_ubezpieczenia;
    }
}
?>

