<?php 
include_once("header.php");

if(isset($_POST['subPro123'])){
     $imgP = $_POST['imgP'] ?? null;
     $pName = $_POST['pName'];
     $RealPP = $_POST['RealPP'];
     $disPP = $_POST['disPP'];
     $PDesciption = $_POST['PDesciption'];

    //  validation the product images
    if(empty($imgP)){
        $errorimgP = "Select an image file.";
    }else{
        $corrimgP = $imgP;
    }

    //  validation product name 
     if(empty($pName)){
        $errorpName = "Enter your product name.";
     }elseif(!preg_match("/^([a-zA-Z' ]+)$/",$pName)){
        $errorpName = "Invalid product name.";
     }
     else{
        $corrpName = $pName;
     }

    //  validation Real prize of product
    if(empty($RealPP)){
        $errorRealPP = "Enter your product prize.";
    }else{
        $corrRealPP = $RealPP;
    }
     
    // validation discount prize of product
    if(empty($disPP)){
        $errordisPP = "Enter your discount prize.";
    }else{
        $corrdisPP = $disPP;
    }

    // validation description
    if(empty($PDesciption)){
        $errorPDesciption = "Write a short desciption of your product.";
    }else{
        $corrPDesciption = $PDesciption;
    }
}

?>
<!-- php code ended -->


<div class="container-fluid" style="overflow: hidden;">
    <div class="row">

        <!-- sidebar container include from index.php -->
        <div class="col-6 col-md-2 bg-info text-white min-vh-100">
            <?php
            include_once("./sidebar.php");
            ?>
        </div>

        <!-- main container -->
        <div class="col-10 p-0">

            <!-- include navbar -->
            <?php
            include_once("./navbar.php");
?>
            <div class="text-dark mx-auto text-center my-3">
                <h2>Add New Product</h2>

                <div class="row">
                    <div class="col-md-5 mx-auto mt-3">
                        <form action="" method="post" enctype="multipart/form-data">

                            <!-- image file of product -->
                            <div class="my-2">
                                <input type="file" name="imgP"
                                    class="form-control form-control-sm <?= $errorimgP ? "is-invalid" : null ?>"
                                    value="<?= $imgP; ?>">
                                <div class="text-danger text-start">
                                    <span><?= $errorimgP ?? null ?></span>
                                </div>
                            </div>

                            <!-- product name -->
                            <div class="my-3">
                                <input type="text" placeholder="Name" name="pName"
                                    class="form-control form-control-sm <?= $errorpName ? "is-invalid" : null ?>"
                                    value="<?= $pName ?? null ?>">
                                <div class="text-danger text-start">
                                    <span><?= $errorpName ?? null ?></span>
                                </div>
                            </div>

                            <!-- Real prize -->
                            <div class="my-2">
                                <input type="number" placeholder="Real Prize" name="RealPP"
                                    value="<?= $RealPP ?? null ?>"
                                    class="form-control form-control-sm <?= $errorRealPP ? "is-invalid" : null ?>">
                                <div class="text-danger text-start">
                                    <span><?= $errorRealPP ?? null ?></span>
                                </div>
                            </div>

                            <!-- discount prize -->
                            <div class="my-3">
                                <input type="number" placeholder="Discount Prize" name="disPP"
                                    value="<?= $disPP ?? null ?>"
                                    class="form-control form-control-sm <?= $errordisPP ? "is-invalid" : null ?>">
                                <div class="text-danger text-start">
                                    <span><?= $errordisPP ?? null ?></span>
                                </div>
                            </div>

                            <!--  product description  -->
                            <div class="my-2">
                                <textarea name="PDesciption" id="" cols="22" rows="4"
                                    class="form-control form-control-sm <?= $errorPDesciption ? "is-invalid" : null ?>"
                                    placeholder="Desciption"><?= $PDesciption ?? null ?></textarea>
                                <div class="text-danger text-start">
                                    <span><?= $errorPDesciption ?? null ?></span>
                                </div>
                            </div>

                            <!-- reset button & submit button -->
                            <div class="my-3 text-start">
                                <input type="reset" class="btn btn-dark btn-sm">
                                <input type="submit" name="subPro123" class="btn btn-success btn-sm">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>