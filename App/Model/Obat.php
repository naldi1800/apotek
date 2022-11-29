<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use App\Model\History;
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
        $sql = "UPDATE " . parent::$t_obat . " set "
            . "barcode='" . $data['barcode'] . "',"
            . "nama_obat='" . $data['nama_obat'] . "',"
            . "harga='" . $data['harga'] . "',"
            . "diskon='" . $data['diskon'] .  "',"
            . "updatetime=CURRENT_TIMESTAMP WHERE id_obat='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data obat", "diubah", "berhasil");
        } else {
            Alert::Set("Data obat", "diubah", "gagal");
            //            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_obat . " WHERE id_obat='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data obat", "dihapus", "berhasil");
        } else {
            Alert::Set("Data obat", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_obat . " VALUES( null, '"
            . $data['barcode'] . "','"
            . $data['nama_obat'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['stok'] . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        // var_dump($sql);
        $query = mysqli_query($link, $sql);

        if ($query) {
            Alert::Set("Data obat", "disimpan", "berhasil");
        } else {
            Alert::Set("Data obat", "disimpan", "gagal");
            //    echo "Error : " . mysqli_error($link);
        }
    }

    public static function Stok($link, $data)
    {
        $stok = $data['stok'];
        $msg = "";
        if (isset($data['checklist'])) {
            $sql = "UPDATE " . parent::$t_obat . " SET "
                . "stok=stok-$stok , updatetime=CURRENT_TIMESTAMP  WHERE id_obat='" . $data['id'] . "'";
            $msg = "dikurangi";
        } else {
            $sql = "UPDATE " . parent::$t_obat . " SET "
                . "stok=stok+$stok , updatetime=CURRENT_TIMESTAMP WHERE id_obat='" . $data['id'] . "'";
            $msg = "ditambahi";
        }
        $data['kon'] = isset($data['checklist']) ? 0 : 1;
        $query = mysqli_query($link, $sql);
        if ($query) {
            History::Insert($link, $data);
            Alert::Set("Data stok obat", "$msg", "berhasil");
        } else {
            Alert::Set("Data stok obat", "$msg", "gagal");
            //            echo "Error : " . mysqli_error($link);
        }
        var_dump($data);
    }
}
