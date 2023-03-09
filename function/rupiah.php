<?php

class Rupiah
{
    public function format($string)
    {
        $angka  = intval($string);
        $formatted_angka = number_format($angka, 0, ',', '.');
        return 'Rp ' . $formatted_angka;
    }
}
