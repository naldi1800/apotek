<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class History extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_history . " AS A JOIN " . parent::$t_obat . " AS B ON A.id_obat=B.id_obat";
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

    public static function Update($link, $id, $data)
    {
        return null;
    }

    public static function Delete($link, $id)
    {
        return null;
    }

    public static function Insert($link, $data)
    {   
        if($data['ket'] == "") $data['ket'] = "Ditambahkan";
        else $data['ket'] = "Dikurangkan karena : " . $data['ket'];
        $sql = "INSERT INTO " . parent::$t_history . " VALUES( "
            . "NULL,'"
            . $data['id'] . "','"
            . $data['stok'] . "','"
            . $data['stokawal'] . "','"
            . $data['kon'] . "','"
            . $data['ket'] . "', CURRENT_TIMESTAMP)";

        $query = mysqli_query($link, $sql);
        // if ($query) {
        //     // Alert::Set("Data History", "disimpan", "berhasil");
        // } else {
        //     // Alert::Set("Data History", "disimpan", "gagal");
        //                echo "Error : " . mysqli_error($link);
        // }
    }
}
