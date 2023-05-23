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

        <?php 
        include_once "../db.php";
        $sqlgset="SELECT * FROM settings WHERE setid=1;";

        $resultgset = mysqli_query($conn, $sqlgset);
        $rowgset = mysqli_fetch_assoc($resultgset);
        ?>

        <main style="width: 81.6vw;">
        <h2>设置</h2>
        <form action="settingsAdd.php" method="post">
        <div class="insight" style="position:relative;" >
        <div class="sale">
        <h3>深渊表格管理</h3><br>
        <p>开启表格 <label class="switch" style="margin-left:30px; margin-bottom:10px;">
                        <input type="checkbox" name="formswitch" value="checked" <?php echo $rowgset['formswitch'];?> >
                        <span class="slider round"></span>
                        </label></p><br>
        <p>开放日期： &emsp; 上半 &ensp; 每月&ensp;<input type="number" min="1" max="15" name="up_start" style="padding:15px 0px; text-align:center; background-color:#f2f3f4;border-radius:10px;" value="<?php echo $rowgset['upstart'];?>">&ensp;日 &ensp;至  &ensp; <input type="number" min="1" max="15" name="up_end" style="padding:15px 0px; text-align:center; background-color:#f2f3f4;border-radius:10px;" value="<?php echo $rowgset['upend'];?>">&ensp;日 </p>
        <p style="padding-left:105px;padding-top:10px;"> 下半 &ensp; 每月&ensp;<input type="number" min="16" max="31" name="down_start" style="padding:15px 0px; text-align:center; background-color:#f2f3f4;border-radius:10px;" value="<?php echo $rowgset['downstart'];?>">&ensp;日 &ensp;至  &ensp; <input type="number" min="16" max="31" name="down_end" style="padding:15px 0px; text-align:center; background-color:#f2f3f4;border-radius:10px;" value="<?php echo $rowgset['downend'];?>">&ensp;日 </p>
      <div class="setbut">
        <button type="submit" name="subset" style="position: relative; left:45%; width:20%; padding:20px 20px; display: inline-block; background-color:#7380ec; cursor:pointer; margin-top:100px; border-radius: 10px; color:white; font-weight: 700; transition-duration: 0.4s;">保存</button>
    </div>
    </div>
        
            </div>

</form>
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








