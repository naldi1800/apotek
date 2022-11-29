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
        return null;
    }

    public static function GetAllWithFilter($link, $filter)
    {
        $sql = "SELECT * FROM " . parent::$t_penjualan . " as A JOIN " . parent::$t_obat . " as B ON A.id_obat=B.id_obat WHERE CONCAT(YEAR(A.soldtime),'-',MONTH(A.soldtime))='" . $filter . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function Update($link, $id, $data)
    {
        return null;
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_penjualan . " WHERE id_jual='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data penjualan", "dihapus", "berhasil");
        } else {
            Alert::Set("Data penjualan", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_penjualan . " VALUES( null,'"
            . $data['id_obat'] . "','"
            . $_SESSION['id_karyawan'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['jml'] . "', CURRENT_TIMESTAMP)";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Penjualaan", "disimpan", "berhasil");
        } else {
            Alert::Set("Penjualaan", "disimpan", "gagal");
            //            echo "Error : " . mysqli_error($link);
        }
    }
}
