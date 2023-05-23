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

        <?php
        
      
        if($day < 16) {
          include_once "../db.php";
          $sql = "SELECT * FROM abyss WHERE create_date BETWEEN '$month-01 00:00:00' AND '$month-15 23:59:00' ORDER BY abyss_id DESC";
        }else{
          include_once "../db.php";
          $sql = "SELECT * FROM abyss WHERE create_date BETWEEN '$month-16 00:00:00' AND '$month-31 23:59:00' ORDER BY abyss_id DESC";
        }			
              $result = mysqli_query($conn, $sql);
  
       
              ?>
              <?php
              if(mysqli_num_rows($result) > 0){
              ?>
          <div class="recent-orders">
            <h2>本期帮助</h2>
            <table>
              <thead>
                <tr>
                  <th>Discord ID</th>
                  <th>UID</th>
                  <th>服务器</th>
                  <th>世界等级</th>
                  <th>原神昵称</th>
                  <th>上期深渊</th>
                  <th>本期深渊</th>
                  <th>负责打手</th>
                  <th>进度</th>
                  <th></th>
                </tr>
              </thead>
              <?php
              $i = 0;
              while($row = mysqli_fetch_assoc($result)){
                $aid = $row["abyss_id"];
              ?>
              <tbody>
                 <tr>
                    <td><?php echo $row["dc_id"]; ?></td>
                    <td><?php echo $row["gi_id"]; ?></td>
                    <td><?php echo $row["giserver"]; ?></td>
                    <td><?php echo $row["world"]; ?></td>
                    <td><?php echo $row["gi_name"]; ?></td>
                    <td><?php echo $row["last_abyss"]; ?></td>
                    <td><?php echo $row["floor"]; ?>层 第<?php echo $row["room"]; ?>间 <?php echo $row["half"]; ?></td>
                    <td class="primary"><?php 
                    $helperid=$row["help_id"];
                    
                    $sql3="SELECT * FROM gadmin WHERE help_id = '$helperid'";
                     $result3 = mysqli_query($conn, $sql3);
                     
                     if(mysqli_num_rows($result3) > 0){
                       $row3 = mysqli_fetch_assoc($result3);
                    echo $row3["admin_name"]; }else{
                      echo "无";
                    }?></td>

                    <td class="hstat"><?php echo $row["help_stat"]; ?></td>

                    <?php if(mysqli_num_rows($result3) > 0){ ?>
                       
                       <td><i class="fa-solid fa-circle-check" style="color:lightgreen; font-size:20px;"></i></i></td>

                     <?php  }else{ ?>                      
                    
                    <td><button type="submit" value="<?php echo $adminid;?>" name="Assign"  style="background-color:transparent; border:none; color: var(--color-primary); cursor:pointer;">
                           <a href="list.php?abyss_id=<?php echo $row["abyss_id"]; ?>&admin_id=<?php echo $adminid;?>"><i class="fa-solid fa-circle-plus" style=" font-size:20px;"></i></a></td>
                    <?php } ?>
                    
                  </tr>
                  <?php
                  $i++;
                  }
                  ?>        
              </tbody>
            </table>
            <?php
                  }else{ ?>
               <div class="recent-orders">
            <h2>本期帮助</h2>
            <table>
              <thead>
                <tr>
                  <th>Discord ID</th>
                  <th>UID</th>
                  <th>服务器</th>
                  <th>世界等级</th>
                  <th>原神昵称</th>
                  <th>上期深渊</th>
                  <th>本期深渊</th>
                  <th>负责打手</th>
                  <th>进度</th>
                </tr>
                
              </thead>
              <tbody>
               <tr><td style="border:none;"></td></tr>
                <tr >
                  <td colspan="9" rowspan="2" style="border:none;">No result</td>
                 </tr > 
               
                
              </tbody>
              </table>
  
              
              
           <?php } ?>
  
            
          </div>
        </main>

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


  <?php

if(isset($_GET["abyss_id"])){

 $Assignid = $_GET["abyss_id"];
 $Adminid = $_GET["admin_id"];

 require_once '../db.php';

 $sqlassign = "UPDATE abyss
 SET 
     help_id = $Adminid,
     help_stat ='Assigned'
 WHERE
     abyss_id = $Assignid;";

	$resultassign = mysqli_query($conn, $sqlassign);    
	
	if($resultassign ) { ?>
    
    <script>location.href = 'list.php'</script>
       
  <?php  }else{ 
        
       
       $_SESSION['uperror']="Failed to Assign!"; 
       
	}  


} ?>
    </body>
</html>
