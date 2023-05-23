


<?php
//-----------------error abyss----------------------------
if(isset($_SESSION['adderror'])){?>
   
          
<script>
   swal({
           title: "<?php echo $_SESSION['adderror']; ?>", 
           icon: "warning"
         }).then( () => {
        location.href = 'abyss.php'
    });
    
       </script>
<?php}  ?> 

<?php unset($_SESSION['adderror']); ?>
