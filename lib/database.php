<?php

$conn = mysqli_connect("localhost", "root", "", "gizisehat");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}