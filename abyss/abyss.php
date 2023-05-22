
<!DOCTYPE html>

<html>

<head>

    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>深渊小帮手</title> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="abyss.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
    



    <style>


    </style>



  </head>

  <body>
    <div class="bg" style=" background-image:url(faq1.png);"></div>
<?php
     header('Content-Type: text/html; charset=utf-8');
    require_once '../db.php';

    $sqlcheck="SELECT * FROM settings WHERE setid=1;";
    $resultcheck = mysqli_query($conn, $sqlcheck);
    $rowcheck = mysqli_fetch_assoc($resultcheck);

    $fscheck=$rowcheck['formswitch'];
    $uscheck=$rowcheck['upstart'];
    $uecheck=$rowcheck['upend'];
    $dscheck=$rowcheck['downstart'];
    $decheck=$rowcheck['downend'];

    $year = date("Y");
    $month = date("m"); 
    $day = date("d");


    if($fscheck =="checked"){
        
    }else{ ?>
        <script>
            Swal.fire({
                title: '报名未开启',
                icon: 'warning',
            
                }).then( () => {
        location.href = '../'
    });
                    </script>
    <?php }

    if($day<16){
        if($day<$uscheck){  ?>
            <script>
            Swal.fire({
                title: '未到报名时间！',
                text: '报名将在 <?php echo $year; echo "-".$month."-".$uscheck; ?>日 12:00am 开启',
                icon: 'warning',
            
                }).then( () => {
        location.href = '../'
    });
                    </script>
        <?php   
        }

        if($day>$uecheck){ ?>
            <script>
            Swal.fire({
                title: '报名已结束！',
                text: '最后报名时间为 <?php echo $year; echo "-".$month."-".$uecheck; ?>日 11:59pm',
                icon: 'warning',
            
                }).then( () => {
        location.href = '../'
    });
                    </script>
        <?php   
        }

    }else{
        if($day<$dscheck){ ?>
           <script>
            Swal.fire({
                title: '未到报名时间！',
                text: '报名将在 <?php echo $year; echo "-".$month."-".$dscheck; ?>日 12:00am 开启',
                icon: 'warning',
            
                }).then( () => {
        location.href = '../'
    });
                    </script>
        <?php   
        }

        if($day>$decheck){ ?>
            <script>
            Swal.fire({
                title: '报名已结束！',
                text: '最后报名时间为 <?php echo $year; echo "-".$month."-".$decheck; ?>日 11:59pm',
                icon: 'warning',
            
                }).then( () => {
        location.href = '../'
    });
                    </script>
        <?php   
        }
    }?>

<form action="abyssAdd.php" method="post">



<main class="body-container-1">

        <div class="cards-wrapper">

            <div class="card-container cards" style="background:rgba(220,220,221,.8);">

                <section class="card-header" style="background:rgba(220,220,221,.5);">

                    <h3>请填写Discord ID</h3>

                </section>

                <section class="card-content">

                    <img src="discordid.jpg" >

                    <p>1. Discord ID (例如: Teasea#8332) :</p>

                    <div class="inputform">

                    <input type="text" name="dc_id"> <br>

                    <a href="" class="card-next">下一页</a>

                </div>

                </section>

            </div>



            <div class="card-container cards">

                <section class="card-header">

                    <h3>请填写原神UID</h3>

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content">

                <img src="Game id.JPG" >

                    <p>2. 原神 UID (例如： 807282866) :</p>

                    <div class="inputform">

                    <input type="text" name="gi_id"> <br>

                    <a href="" class="card-next">下一页</a>

                </div>

                </section>

            </div>

            <div class="card-container cards">

                <section class="card-header">

                    <h3>服务器</h3>

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content">

                    <p>3. 请选择此账号所在的服务器 :</p>

                    

                    <div class="inputradio">

                        <input type="radio" name="giserver" value="亚服">

                        <label for="server1">亚服</label><br>

                        <input type="radio" name="giserver" value="港澳台服"> 

                        <label for="server2">港澳台服</label><br> 

                        <input type="radio" name="giserver" value="美服">

                        <label for="server3">美服</label><br>

                        <input type="radio" name="giserver" value="欧服">

                        <label for="server4">欧服</label><br> 

                        </div>

                    <div class="inputform">

                        <a href="" class="card-next">下一页</a>

                    

                    </div>

                </section>

            </div>



            <div class="card-container cards">

                <section class="card-header">

                    <h3>世界等级</h3>

                    

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content">

                    <p>4. 请选择此账号的世界等级 :</p>

                    <div class="inputradio">

                        <input type="radio" name="world" value="世界8">

                        <label for="world1">世界8</label><br>

                        <input type="radio" name="world" value="世界7"> 

                        <label for="world2">世界7</label><br> 

                        <input type="radio" name="world" value="世界6">

                        <label for="world3">世界6</label><br>

                        <input type="radio" name="world" value="世界5">

                        <label for="world4">世界5</label><br> 

                        <input type="radio" name="world" value="其他">

                        <label for="world5">其他</label><br> 

                        </div>

                    <div class="inputform">

                        <a href="" class="card-next">下一页</a>

                    

                    </div>

                </section>

            </div>



            <div class="card-container cards">

                <section class="card-header">

                    <h3>原神昵称</h3>

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content">

                <img src="Game name.JPG" >

                    <p>5. IGN/原神里的名字 (例如：苹果派）:</p>

                    <div class="inputform">

                    <input type="text" name="gi_name"> <br>

                    <a href="" class="card-next">下一页</a>

                </div>

                </section>

            </div>



            <div class="card-container cards">

                <section class="card-header">

                    <h3></h3>

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content" >

                <img src="abyss.JPG" >

                    <p>6. 上期深渊成绩 (例如12层, 33星) :</p>

                    <div class="inputform">

                    <input type="text" name="last_abyss"> <br>

                    <a href="" class="card-next">下一页</a>

                </div>

                </section>

            </div>



            <div class="card-container cards">

                <section class="card-header">

                    <h3></h3>

                    <a href="" class="card-close"><i class="fas fa-times-circle"></i></a>

                </section>

                <section class="card-content">

                <img src="abyss2.jpg">

                    <p>7. 本期深渊卡在哪里？ (例如12-2层下半) :</p>

                    <div class="inputfloor">

                        第 &nbsp <input type="text" name="floor"> &nbsp 层 &nbsp

                        <select name="room" id=""><option value="1">第一间</option><option value="2">第二间</option><option value="3">第三间</option></select> &nbsp

                        <select name="half" id=""><option value="上半">上半</option><option value="下半">下半</option></select>

                    

                       

                    </select> <br>

                    <button type="submit" name="sublist" class="card-sub">提交</button>

                </div>


                </section>

                
                <?php
   
        if($_GET["error"] == "emptyinput"){	?>							
            <script>
                        Swal.fire({
            title: '请填写完所需的资料！',
            icon: 'warning',
});
                </script>
      <?php  }elseif($_GET["error"] == "none"){?>							
        <script>
        Swal.fire({
            title: '已成功提交！',
            icon: 'success',
            
            confirmButtonText:
                '<i class="fa fa-thumbs-up"></i> 太棒了!',
            confirmButtonAriaLabel: 'Thumbs up, great!',
           
            }).then( () => {
    location.href = '../'
});
                </script>
     <?php }
           
        
       
				?>

<?php
   
   if($_GET["error"] == "repeatinput"){	?>							
       <script>
                   Swal.fire({
       title: '重复报名！',
       text: '你已经报名过本期深渊补星',
       icon: 'warning',
});
           </script>
 <?php  } ?>

 <?php
   
   if($_GET["error"] == "regclosed"){	?>							
       <script>
                   Swal.fire({
       title: '报名未开启！',
       icon: 'warning',
        }).then( () => {
        location.href = '../'
    });
           </script>
 <?php  } ?>


            </div>

            

        </div>

    </main>

</form>




    <script src="abyss.js"></script>

  



    </body>

   

</html>