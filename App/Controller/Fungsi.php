<?php


namespace App\Contorller;


class Fungsi
{
    public static function getMonthAndYear($bulan){
        $bulan = explode('-', $bulan);
        $bln = $bulan[1];
        $thn = $bulan[0];
        // var_dump($bulan);
        switch($bln){
            case "01" : return "Januari ".$thn;break;
            case "02" : return "Februari ".$thn;break;
            case "03" : return "Maret ".$thn;break;
            case "04" : return "April ".$thn;break;
            case "05" : return "Mei ".$thn;break;
            case "06" : return "Juni ".$thn;break;
            case "07" : return "Juli ".$thn;break;
            case "08" : return "Agustus ".$thn;break;
            case "09" : return "September ".$thn;break;
            case "10" : return "Oktober ".$thn;break;
            case "11" : return "November ".$thn;break;
            case "12" : return "Desember ".$thn;break;
        }
        return "";
    }
    public static function rupiah($angka){
	
        $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }
}