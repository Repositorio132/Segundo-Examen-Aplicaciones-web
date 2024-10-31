<?php 
    function connectDB():mysqli{
     $db = mysqli_connect("localhost", "root", "", "bienesraices11");
    

        if($db){
            echo"Connected";
        }else{
            echo "NOT Connected";
        }
        return $db;
    }
