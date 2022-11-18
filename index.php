<?php

// header start
include_once("header.php");

// body start
?>
<div class="topIMG">
    <?php
include_once("navbar.php");

// successfull login massage
if(isset($_GET['success'])){
    ?>
    <script>
    toastr.success('Login Successfully.');
    setTimeout(() => {
        location.href = "./";
    }, 1000);
    </script>
    <?php
}
// body end
?>
</div>

<?php
// footer start
include_once("footer.php");
?>