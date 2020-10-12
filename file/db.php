<?php

function Createdb(){
    $host = "localhost";
    $user = "test";
    $password = "Asdf@1234";
    $dbname = "test";

    $con = mysqli_connect($host, $user, $password);

    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($host, $user, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS formdata(
                            id INT(11) PRIMARY AUTO_INCREMENT,
                            name varchar(255),
                            city varchar(100),
                            occupation  varchar(255)
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
?>
