<?php
require 'php/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>DATA PEMESANAN PUBG</title>
    <style>
        .button {
            margin: auto;
            text-align: center;
        }

        .button .btn {
            text-decoration: none;
            font-weight: bold;
            padding: 15px 30px 15px 30px;
            background-color: blue;
            font-family: 'poppins' sans-serif;
            font-size: 20px;
            color: white;
            border-radius: 20px;
            border: 2px solid black;
            cursor: pointer;
        }

        #shadowBox {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.2);
            /* Black w/opacity/see-through */
            border: 3px solid;
        }

        .rainbow {
            text-align: center;
            font-size: 32px;
            font-family: monospace;
            letter-spacing: 5px;
            animation: colorRotate 6s linear 0s infinite;
        }

        @keyframes colorRotate {
            from {
                color: #6666ff;
            }

            10% {
                color: #0099ff;
            }

            50% {
                color: #00ff00;
            }

            75% {
                color: #ff3399;
            }

            100% {
                color: #6666ff;
            }
        }
    </style>
</head>

<body>
    <h1 align="center">DATA PEMESANAN PUBG MOBILE</h1>
    <table border="1" align="center">
        <tr align="center">
            <td><b>NO</b></td>
            <td><b>User ID</b></td>
            <td><b>NOMINAL TOP UP</b></td>
            <td><b>PEMBAYARAN</b></td>
        </tr>
        <?php
        include "php/koneksi.php";
        $no = 1;
        $userLogin = $_SESSION['user'];
        $query = mysqli_query($registrasi, 
        "SELECT * FROM pesanan_pubg WHERE user='$userLogin' ORDER BY id DESC LIMIT 1");
        $data = mysqli_fetch_array($query);
        ?>
        <tr align="center">
            <td>
                <?php echo $no++;?>
            </td>
            <td>
                <?php echo $data['user_id'] ?>
            </td>
            <td>
                <?php echo $data['nominal'] ?>
            </td>
            <td>
                <?php echo $data['payment'] ?>
            </td>
        </tr>
        <tr align="center">
            <td align="center" colspan="4">
                <?php echo"Total Bayar:Rp.".$data['nominal']?>
            </td>
        </tr>
    </table>
    <div id=shadowbox>
        <h1 class="rainbow" align="center">Terima Kasih :)</h1>
    </div>

   
    <!-- <div class="button">
        <?php if (isset($_POST['submit'])){
          header("location:index.php");  
        }?>
        <form action="" method="post">
            <button type="submit" name="submit" class="btn">Tutup</button>
        </form>
    </div> -->
    <?php
        include "php/koneksi.php";
        $no = 1;
        $userLogin = $_SESSION['user'];
        $queryPubg = mysqli_query($registrasi, 
        "SELECT user_id,nominal,payment,created_at FROM pesanan_pubg WHERE user='$userLogin'");
    
        // $queryMlbb = mysqli_query($registrasi, "SELECT pesanan_mlbb.user_id,zone_id,nominal,payment,created_at FROM pesanan_mlbb INNER JOIN regist ON regist.email = pesanan_mlbb.email");
      
        // $queryGenshin = mysqli_query($registrasi, "SELECT pesanan_genshin.user_id,server,nominal,payment,created_at FROM pesanan_genshin INNER JOIN regist ON regist.email = pesanan_genshin.email");
    

        ?>
    <h1 align="center">RIWAYAT TRANSAKSI</h1>
    <table border="1" align="center">
        <tr align="center">
            <td><b>NO</b></td>
            <td><b>User ID</b></td>
            <td><b>NOMINAL TOP UP</b></td>
            <td><b>PEMBAYARAN</b></td>
            <td><b>WAKTU</b></td>
            <td><b>TRANSAKSI ID</b></td>
        </tr>
<?php 
while ($datas = mysqli_fetch_array($queryPubg)){


?>
        <tr align="center">
            <td>
                <?php echo $no++;?>
            </td>
            <td>
                <?php echo $datas['user_id'] ?>
            </td>
            <td>
                <?php echo $datas['nominal'] ?>
            </td>
            <td>
                <?php echo $datas['payment'] ?>
            </td>
            <td>
                <?php echo $datas['created_at'] ?>
            </td>
            <td>
                <?php echo"GS".bin2hex(random_bytes(15));?>
            </td>
        </tr>
        <?php 
        }
        ?>
</body>

</html>