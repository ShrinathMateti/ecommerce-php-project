<?php

$con = mysqli_connect('localhost','root','','alankart');
if($con){
    echo"";
}
else{
    echo"<script>alert('Connection not successful')</script>";
}


?>