<?php include('header.php');?>


<div class="right">
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
          </button>
          <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>
          <div class="profile">
            <div class="info">
              <p>你好, <b><?php echo "  $user->username  ";?></b></p> 
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
            <?php echo '<img src="https://cdn.discordapp.com/avatars/'.$user->id.'/'.$user->avatar.'.gif" alt="'.$user->avatar.'" onerror=this.src="https://cdn.discordapp.com/avatars/'.$user->id.'/'.$user->avatar.'.png">'; ?>
            </div>
          </div>
        </div>





        <main style="width: 81.6vw;">

        
        <div class="insights">
        <?php $p1= 0; while($rowme = mysqli_fetch_assoc($resultme)){ 
                $p2 = $p1++;
            ?>

          <div class="sales">
             <?php 
                $donestat = $rowme['help_stat'];
                $cordid = $rowme["abyss_id"];?>
                

            <span><?php  echo $rowme['dc_id'];?></span> &nbsp <p id="<?php echo $p2?>" style="display:none;"><?php  echo $rowme['dc_id'];?></p> <button class="avatar" data-tooltip="Copy Discord ID" onclick="copyToClipboard('#<?php echo $p2?>');Copied();" style="background-color:transparent"><i class="fa-regular fa-copy" style="padding-top:5px; color:grey"></i></button> 
            <?php if($donestat !== "Done"){ 
            echo "<a href='me.php?rid=".$cordid."' style='float:right;'><i class='fa-solid fa-xmark' style='font-size:16px;'></i></a>";
            }
            ?>
            <div class="middle">
              <div class="left">
                  <br>
                  <div id="result" style="display:none;">$_GEt rid refresh</div>
                <div class="hpcontainer" style="display: flex; width:350px; ">
                <p style="font-size: 20px;" ><?php  echo $rowme['gi_name'];?></p>&nbsp
                <p style="line-height:50px;"><?php  echo $rowme['giserver'];?></p>&nbsp</div>

               

                <?php if($donestat == "Done"){ 
                 echo "<a href='me.php?cid=".$cordid."' style='float:right; margin-right:20px;' ><i class='fa-solid fa-square-minus' style='color:grey; font-size:40px;'></i></a>"; 
                }else{
                 echo "<a href='me.php?did=".$cordid."' style='float:right; margin-right:20px;' ><i class='fa-solid fa-square-check' style='color:green; font-size:40px;'></i></a>";
                }
                
                ?>
                
                
                <h1 style="text-align: center; width: 150px;"><?php echo $rowme['floor']; echo "-" .  $rowme['room']; ?> <?php echo $rowme['half'];?></h1> 
              </div>
              <div class="progress" style="display:none;">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>81%</p>
                </div>
              </div>
            </div>
            <small class="text-muted">报名日期：<?php  echo $rowme['create_date'];?></small>
          </div>
          

          <?php } ?>

   <script>function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}</script>      

<script>$('button').on('click', function () {
  $(this).addClass('clicked');
});

$("button").hover(
      function () {
        $(this).removeClass("clicked");
      }
    );
</script>

        <script>
   $('.hstat').filter(function() {
    return $(this).text().indexOf('Pending') === 0;
}).closest('.hstat').addClass('warning');

$('.hstat').filter(function() {
    return $(this).text().indexOf('Assigned') === 0;
}).closest('.hstat').addClass('primary');

$('.hstat').filter(function() {
    return $(this).text().indexOf('Done') === 0;
}).closest('.hstat').addClass('success');

$('.hstat').filter(function() {
    return $(this).text().indexOf('Cancelled') === 0;
}).closest('.hstat').addClass('danger');
    </script>
    <script src="./index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


<?php

if(isset($_GET["did"])){

 $Doneid = $_GET["did"];


 require_once '../db.php';

 $sqldone = "UPDATE abyss
 SET 
     help_stat ='Done'
 WHERE
     abyss_id = $Doneid;";

	$resultdone = mysqli_query($conn, $sqldone);    
	
	if($resultdone ) { ?>
    
    <script>location.href = 'me.php'</script>
       
  <?php  }else{ 
        
       
       $_SESSION['doneerror']="Failed to Update!"; 
       
	}  


} ?>


<?php

if(isset($_GET["cid"])){

 $Doneid = $_GET["cid"];


 require_once '../db.php';

 $sqldone = "UPDATE abyss
 SET 
     help_stat ='Assigned'
 WHERE
     abyss_id = $Doneid;";

	$resultdone = mysqli_query($conn, $sqldone);    
	
	if($resultdone ) { ?>
    
    <script>location.href = 'me.php'</script>
       
  <?php  }else{ 
        
       
       $_SESSION['doneerror']="Failed to Update!"; 
       
	}  


} ?>

<?php

if(isset($_GET["rid"])){
$Removeid = $_GET["rid"]; ?>
<script>

var acanid = <?php echo $Removeid?>

  Swal.fire({
  title: '请选择取消选项',
  showDenyButton: true,
  showCancelButton: true,
  cancelButtonText: "返回",
  confirmButtonText: '撤销接取',
  denyButtonText: `彻底取消`,
  focusCancel: true,
  
}).then((result) => {
  /* If admin cancel */
  if (result.isConfirmed) {
    $(document).ready(function() {

    $.ajax({
  url:'pending.php',
  data:'a_can_id=' + acanid,
  success: function(data) {
    $('#result').html(data);
  }
});

});

  } else if (result.isDenied) {
    /* If user cancel */
    $(document).ready(function() {

      $.ajax({
      url:'cancel.php',
      data:'rem_id=' + acanid,
      success: function(data) {
      $('#result').html(data);
      }
      });

      });
  }
})

</script>
<?php }  ?> 




