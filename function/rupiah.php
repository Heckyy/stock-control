<?php

class Rupiah
{
    public function format($string)
    {
        $angka  = $string;
        $formatted_angka = number_format($angka, 2, ',', '.');
        return 'Rp ' . $formatted_angka;
    }
}
