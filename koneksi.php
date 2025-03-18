<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'perpus01';

$koneksi= mysqli_connect($host, $username, $password, $db)
or die(mysqli_error($koneksi));
