<?php 
include_once("header.php");
?>

<div class="container-fluid">
    <div class="row">

        <!-- sidebar container include from index.php -->
        <div class="col-6 col-md-2 bg-info text-white min-vh-100">
            <?php
            include_once("./sidebar.php");
            ?>
        </div>

        <!-- all product list here -->
        <div class="col-10">
            <div class="text-dark mx-auto text-center">
                <h2>All Product</h2>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>