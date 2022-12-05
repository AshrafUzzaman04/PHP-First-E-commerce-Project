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

        <!-- main container -->
        <div class="col-10">
            <div class="text-dark mx-auto text-center">
                <h2>Add New Product</h2>

                <div class="row">
                    <div class="col-md-5">
                        <form action="" method="post" enctype="multipart/form-data">

                            <!-- image file of product -->
                            <div class="my2">
                                <input type="file" class="form-control form-control-sm">
                            </div>

                            <!-- product name -->
                            <div class="my-2">
                                <input type="text" placeholder="Name" class="form-control form-control-sm">
                            </div>

                            <!-- Real prize -->
                            <div class="my-2">
                                <input type="number" placeholder="Real Prize" class="form-control form-control-sm">
                            </div>

                            <!-- discount prize -->
                            <div class="my-2">
                                <input type="number" placeholder="Discount Prize" class="form-control form-control-sm">
                            </div>

                            <!--  product description  -->
                            <div class="my-2">
                                <textarea name="Desciption" id="" cols="22" rows="2"
                                    class="form-control  form-control-sm" placeholder="Desciption"></textarea>
                            </div>

                            <!-- reset button & submit button -->
                            <div class="my-2 text-start">
                                <input type="reset" class="btn btn-dark btn-sm">
                                <input type="submit" class="btn btn-success btn-sm">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>