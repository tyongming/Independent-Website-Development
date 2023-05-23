<?php 

include('admin.php');
if(!isset($_SESSION['admin'])){
  header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理面板 | 深渊小帮手</title>
    <!-- MATERIAL CDN -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  
  <body >

<div class="container">
      <aside>
        <div class="top">
          <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
          </div>
        </div>

        <div class="sidebar">
          <a href="index.php">
            <span class="material-icons-sharp">grid_view</span>
            <h3>仪表盘</h3>
          </a>
          <a href="list.php">
            <span class="material-icons-sharp">receipt_long</span>
            <h3>代打表格</h3>
          </a>
          <a href="me.php">
            <span class="material-icons-sharp">mail_outline</span>
            <h3>我的代打</h3>
            <?php 
            $month = date("Y-m"); 
            $day = date("d");
            $time = date("G");
            include_once "../db.php";
            if($day < 16 ) {
            $sqlme="SELECT * FROM abyss where help_id = '$adminid' AND create_date BETWEEN '$month-01 04:00:00' AND '$month-16 03:59:00' ";
            }else{
              $sqlme="SELECT * FROM abyss where help_id = '$adminid' AND create_date BETWEEN '$month-16 04:00:00' AND '$month-31 03:59:00' ";
            }

            if($day < 16) {
              $sqlcountme="SELECT * FROM abyss where help_id = '$adminid' AND create_date BETWEEN '$month-01 04:00:00' AND '$month-16 03:59:00' AND help_stat='Assigned' ";
              }else{
                $sqlcountme="SELECT * FROM abyss where help_id = '$adminid' AND create_date BETWEEN '$month-16 04:00:00' AND '$month-31 03:59:00' AND help_stat='Assigned' ";
              }

            $resultme = mysqli_query($conn, $sqlme);

            $resultcountme = mysqli_query($conn, $sqlcountme);

            $rowcountme = mysqli_num_rows($resultcountme);
            ?>
            <span class="message-count"><?php echo $rowcountme?></span>
          </a>
          <a href="settings.php" >
            <span class="material-icons-sharp">settings</span>
            <h3>设置</h3>
          </a>
          <a href="?action=logout">
            <span class="material-icons-sharp, fa-solid fa-house"></span>
            <h3>主页</h3>
          </a>
        </div>
      </aside>

      <script type="text/javascript">
       
       jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.sidebar a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
     });
    });
      </script>

