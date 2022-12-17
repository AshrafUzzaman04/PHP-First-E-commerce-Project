<?php include_once("./header.php") ?>

<div class="container-fluid m-0 p-0">

    <div class="m-0 p-0">
        <!-- include navbar -->
        <?php
                include_once("./navbar.php");
    ?>

        <div class="col-10 col-md-6 col-xxl-4 my-4 mx-auto">

            <div class="col-12">
                <h3 class="m-0">Update Now.</h3>
                <span class="fw-lighter" style="font-size: 14px;">Update your product details.</span>
            </div>

            <!-- form section started here -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 22px;">
                    <hr style="border-top:2px solid; color: #28A745;">
                </div>

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
                    <input type="number" placeholder="Real Prize" name="RealPP" value="<?= $RealPP ?? null ?>"
                        class="form-control form-control-sm <?= $errorRealPP ? "is-invalid" : null ?>">
                    <div class="text-danger text-start">
                        <span><?= $errorRealPP ?? null ?></span>
                    </div>
                </div>

                <!-- discount prize -->
                <div class="my-3">
                    <input type="number" placeholder="Discount Prize" name="disPP" value="<?= $disPP ?? null ?>"
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

                <!-- back, reset & update button -->
                <div class="my-3 text-start">
                    <a href="./allProduct.php?pageNo=1" class="btn btn-sm btn-dark fw-bold">Back</a>
                    <input type="reset" value="Reset" class="btn btn-danger btn-sm fw-bold">
                    <input type="submit" value="Update" name="subPro123" class="btn btn-success btn-sm fw-bold">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once("./footer.php") ?>