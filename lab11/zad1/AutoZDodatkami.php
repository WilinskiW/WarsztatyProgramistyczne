<?php
class AutoZDodatkami extends NoweAuto {
    private $alarm;
    private $radio;
    private $klimatyzacja;

    public function __construct($model, $cena_euro, $kurs_euro_pln, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cena_euro, $kurs_euro_pln);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function obliczCene() {
        $cena_bazowa = parent::obliczCene();
        return $cena_bazowa + $this->alarm + $this->radio + $this->klimatyzacja;
    }
}
?>
