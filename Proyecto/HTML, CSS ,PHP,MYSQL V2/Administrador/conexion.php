<?php
    function connection(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "proyecto";

        $connect = mysqli_connect($host,$user,$pass) or die ("Problemas de la conexion");

        mysqli_select_db($connect, $bd);

        return $connect;
    }