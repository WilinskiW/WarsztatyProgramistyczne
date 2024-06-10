<?php
class NoweAuto {
    protected $model;
    protected $cena_euro;
    protected $kurs_euro_pln;

    public function __construct($model, $cena_euro, $kurs_euro_pln) {
        $this->model = $model;
        $this->cena_euro = $cena_euro;
        $this->kurs_euro_pln = $kurs_euro_pln;
    }

    public function obliczCene() {
        return $this->cena_euro * $this->kurs_euro_pln;
    }
}
?>

