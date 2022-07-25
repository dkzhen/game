<?php
require 'koneksi.php';

function orderPubgMobile($data)
{
    global $registrasi;

    $userid = $data['userid'];
    $nominal = $data['brandtype'];
    $payment = $data['paymentmethod'];
    $email = $data['email'];
    $user  = $_SESSION['user'];
    $input = "insert into pesanan_pubg (user,user_id,nominal,payment,email) values('$user','$userid','$nominal','$payment','$email')";
    mysqli_query($registrasi, $input);
    return mysqli_affected_rows($registrasi);
}

function orderMobileLegends($data)
{
    global $registrasi;

    $userid = $data['userid'];
    $zoneid =$data['zoneid'];
    $nominal = $data['brandtype'];
    $payment = $data['paymentmethod'];
    $email = $data['email'];
    $user  = $_SESSION['user'];
    $input = "insert into pesanan_mlbb (user,user_id,zone_id,nominal,payment,email) values('$user','$userid','$zoneid','$nominal','$payment','$email')";
    mysqli_query($registrasi, $input);
    return mysqli_affected_rows($registrasi);
}

function orderGenshinImpact($data)
{
    global $registrasi;

    $userid = $data['userid'];
    $server =$data['server'];
    $nominal = $data['brandtype'];
    $payment = $data['paymentmethod'];
    $email = $data['email'];
    $user  = $_SESSION['user'];
    $input = "insert into pesanan_genshin (user,user_id,server,nominal,payment,email) values('$user','$userid','$server','$nominal','$payment','$email')";
    mysqli_query($registrasi, $input);
    return mysqli_affected_rows($registrasi);
}
