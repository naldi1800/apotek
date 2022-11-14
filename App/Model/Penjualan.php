<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Penjualan extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_penjualan . " as A JOIN " . parent::$t_obat . " as B ON A.id_obat=B.id_obat";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_penjualan . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_penjualan . " SET "
            . "Kode_MK='" . $data['kode_mk'] . "',"
            . "Nama_Matakuliah='" . $data['nama_mk'] . "',"
            . "Semester='" . $data['semester'] . "',"
            . "SKS='" . $data['sks'] . "' WHERE Kode_MK='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "diubah", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_penjualan . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "dihapus", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_penjualan . " VALUES( null,'"
            . $data['id_obat'] . "','"
            . $_SESSION['id_karyawan'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['jml'] . "','"
            . "2022-11-14 01:00:00" . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "disimpan", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}