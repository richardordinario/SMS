<?php
include("connection.php");
$uniqeKey = "";
    function checkKeys($connection, $randStr) {
        $sql = "SELECT * FROM schedules";
        $result = mysqli_query($connection,$sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row["uniq_id"] == $randStr)
            {
                $keyexists = true;
                break;
            } else {
                $keyexists = false;
            }
            return $keyexists;
        }
       
    }

    function generateKey($connection) {
        $keyLenght = 8;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$";

        $randStr = substr(str_shuffle($str), 0, $keyLenght);
        $checkKey = checkKeys($connection,$randStr);

        while($checkKey == true) {
            $randStr = substr(str_shuffle($str), 0, $keyLenght);
            $checkKey = checkKeys($connection,$randStr);
        }

        return $randStr;
    }

    $uniqeKey = generateKey($connection);
    echo '<input type="hidden" id="uniqid" name="uniqid" placeholder="" value="'.$uniqeKey.'">';
?>
