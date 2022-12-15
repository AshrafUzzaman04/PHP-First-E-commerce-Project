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
        <div class="col-10 p-0">

            <!-- include navbar -->
            <?php
            include_once("./navbar.php");
?>
            <div class="text-dark mx-auto text-center">
                <h2>All Product</h2>
                <table>
                    <tr>
                        <td>Serial NO.</td>
                        <td>Name</td>
                        <td>Regular Prize</td>
                        <td>Discount Prize</td>
                        <td>Product Image</td>
                        <td>Action</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>