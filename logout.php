<?php session_start(); ?>
<html><body>
<?php
        session_destroy();
        echo "<script>location='index.php'</script>";
        ?>
        
</body>
</html>
