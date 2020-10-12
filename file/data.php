<?php

require_once ("db.php");
require_once ("component.php");

$con = Savedb();

if(isset($_POST['Save details'])){
    savedData();
}

function savedData(){
    $name = textboxValue("name");
    $city = textboxValue("city");
    $occupation = textboxValue("occupation");

    if($name && $city && $occupation){

        $sql = "INSERT INTO books (name, city, occupation) 
                        VALUES ('$name','$city','$occupation')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

function getData(){
    $sql = "SELECT * FROM formdata";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}


function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}
?>
