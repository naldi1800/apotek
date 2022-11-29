<?php namespace App\Model;

abstract class Data
{
    protected static $t_penjualan = "penjualan";
    protected static $t_obat = "obat";
    protected static $t_mid = "midtest";
    protected static $t_history = "history";

    

    public static abstract function GetAll($link);

    public static abstract function GetWithId($link, $id);

    public static abstract function Update($link, $id, $data);

    public static abstract function Delete($link, $id);

    public static abstract function Insert($link, $data);
}