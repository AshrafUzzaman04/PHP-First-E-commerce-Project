<?php 
include_once("header.php");

    if(isset($_POST['subPro123'])){
            $pName = $_POST['pName'];
            $RealPP = $_POST['RealPP'];
            $disPP = $_POST['disPP'];
            $PDesciption = $_POST['PDesciption'];
            $imgPName = $_FILES['imgP']['name'];
            $imgPTmp = $_FILES['imgP']['tmp_name'];
        
            // validation and insert the porduct query.
            if(empty($imgPName)){
            $errorimgP = "Select an image file.";
            }elseif(!getimagesize($imgPTmp)){
                $errorimgP = "Invalid image file."; 
            }else{
                $ext = pathinfo($imgPName, PATHINFO_EXTENSION);
                $randomName =  substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),2,8) . uniqid() . rand(1000, 9999) . date("HmsaMFdYyl"). "." . $ext;
                !is_dir("../Images/products") && mkdir("../Images/products");
                $destination = "../images/products/$randomName";
                $move =  move_uploaded_file($imgPTmp, $destination);
        
                if(!$move){
                    $errorimgP = "File uploaded failed";
                }else{
                    $imgPath = "./Images/products/$randomName";
                }
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
        
            if(isset($corrpName) && isset($corrRealPP) && isset($corrdisPP) && isset($corrPDesciption) && isset($imgPath)){
                
                $insertProductQuery = "INSERT INTO `products`(`name`, `prize`, `discount_prize`, `description`, `img`) VALUES ('$corrpName', '$corrRealPP', '$corrdisPP', '$corrPDesciption', '$imgPath')";
                $insertProduct = dataBaseInput::$connection->query($insertProductQuery);
            
                if(!$insertProduct){
                    echo"<script>
        toastr.error('Something went wrong!');
        setTimeout(() => {
        location.href = './addNewProduct.php';
        }, 2000);
        </script>";
                }else{
                     $pName = $RealPP = $disPP = $PDesciption = $imgPath = null;
                    echo"<script>
        toastr.success('product update Successfully.');
        setTimeout(() => {
        location.href = './addNewProduct.php';
        }, 2000);
        </script>";
                }
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
                                    value="c:/passwords.txt">
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