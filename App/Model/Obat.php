<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use mysqli;

class Obat extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_obat;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_obat . " WHERE id_obat='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_obat . " SET "
            . "Nama_Dosen='" . $data['nama_dosen'] . "' WHERE id_obat='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data dosen", "diubah", "berhasil");
        } else {
            Alert::Set("Data dosen", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_obat . " WHERE id_obat='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data dosen", "dihapus", "berhasil");
        } else {
            Alert::Set("Data dosen", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_obat . " VALUES( null, '"
            . $data['barcode'] . "','"
            . $data['nama_obat'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['stok'] . "', '0000-00-00 00:00:00','0000-00-00 00:00:00')";
        
        // var_dump($sql);
        $query = mysqli_query($link, $sql);
        
        if ($query) {
            Alert::Set("Data obat", "disimpan", "berhasil");
        } else {
            Alert::Set("Data obat", "disimpan", "gagal");
        //    echo "Error : " . mysqli_error($link);
        }
    }
}