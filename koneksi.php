<?php
    $servername = "localhost";
    $username = "root";
    $password = "kucing123";
    $databases = "db_wisata";
    
    
    // Create connection
    $koneksi = new mysqli($servername, $username, $password, $databases);
    
    #$koneksi = mysqli_connect($servername, $username, $password, $databases);  
    // Check connection
    
    if (!$koneksi) {
        die("Connection failed: ".$koneksi->connect_error);
        echo "Gagal Koneksi ... <br>";
    } 
?>