<?php
include_once("./header.php");
userAccount::updateProfile();
userAccount::updateInformation();
include_once("./Classes/userAccount.php");

if (!isset($_SESSION['all users'])) {  ?>
    <script>
        location.href = "./";
    </script>
<?php }
include_once("./navbar.php");
?>

<div class="container">
    <div class="row mt-5">

        <!-- update profile image -->
        <div class="col-5 pe-3">
            <form action="" method="post" enctype="multipart/form-data" id="imgUploadForm">
                <input type="hidden" name="email" value="<?= $_SESSION['all users']['email_or_mobile'] ?>">
                <label for="ppimg" class="text-center imagePP" style="align-items: flex-end; display: flex; justify-content: end; flex-direction: column;">

                    <img src="<?php
                                include_once("./Classes/userAccount.php");
                                if (empty($_SESSION['all users']['img'])) {
                                    if (($_SESSION['all users']['gender']) === "Male") {
                                        echo './Images/image-empty-male.png';
                                    } elseif (($_SESSION['all users']['gender']) === "Female") {
                                        echo './Images/image-empty-female-cartoon.png';
                                    } else {
                                        echo './Images/hijla.jpg';
                                    }
                                } else {
                                    echo  $_SESSION['all users']['img'];
                                }
                                ?>" alt="" class="img-fluid rounded-circle border border-dark border-2" style="width:200px; height:200px; object-fit: cover;">

                    <h6>Click to change the image!</h6>
                </label>
                <input type="file" id="ppimg" name="ppimg" class="d-none">
                <!-- <a href="" class="text-decoration-none text-dark">
                    <ion-icon name="camera-outline"
                        class="mx-auto bg-light shadow-sm border-white border-3 border rounded-circle p-1 editPP"
                        style="font-size: 26px;">
                    </ion-icon>
                </a> -->
                <div class="text-danger text-end">
                    <?= userAccount::$errorImg ?? null ?>
                </div>
            </form>
            <script>
                if (<?php
                    $imgUpdate
                    ?>) {
                    toastr.success('Image Upload Successfully.');
                    setInterval(() => {
                        location.href = "./updateProfile.php";
                    }, 2000);
                }
            </script>

        </div>

        <!-- update information section-->
        <div class="col-5 ms-3">
            <div class="row col-12 mx-auto">
                <div class="col-12 p-0">
                    <h3 class="m-0">Update your information.</h3>
                    <span class="fw-lighter" style="font-size: 14px;">You can change your information by
                        updating.</span>
                    <div class="text-danger">
                        <?= userAccount::$error['updateUserInfo'] ?? null ?>
                    </div>
                    <div class="text-success">
                        <?= userAccount::$success['updateUserInfo'] ?? null ?>
                    </div>
                </div>
                <div class="p-0 mb-1">
                    <hr style="border-top:2px solid #157347;">
                </div>
                <form action="" method="POST" class="row">

                    <!-- First name -->
                    <div class="col-6 ps-0 mb-3">
                        <input type="text" placeholder="First Name" name="SfistName" class=" form-control form-control-sm <?= isset(userAccount::$error['SfistName']) ? "is-invalid" : null ?>" value="<?= userAccount::$SfistName ?? $_SESSION['all users']['First_Name'] ?? null ?>">
                        <div class=" text-danger">
                            <?= userAccount::$error['SfistName'] ?? null ?>
                        </div>
                    </div>

                    <!-- Surname -->
                    <div class=" col-6 pe-0 mb-3">
                        <input type="text" placeholder="Surname" name="SsurName" class=" form-control form-control-sm
                                     <?= isset(userAccount::$error['SsurName']) ? "is-invalid" : null ?>" value="<?= userAccount::$SsurName ?? $_SESSION['all users']['Surname'] ?? null ?>">
                        <div class=" text-danger">
                            <?= userAccount::$error['SsurName'] ?? null ?>
                        </div>
                    </div>

                    <!-- email -->
                    <div class=" col-12 p-0 mb-3">
                        <input type="email" name="Semail_Phn" placeholder="Email address" class="form-control form-control-sm <?= isset(userAccount::$error['Semail_Phn']) ? "is-invalid" : null ?>" value="<?= userAccount::$Semail_Phn ?? $_SESSION['all users']['email_or_mobile'] ?? null ?>">
                        <div class="text-danger">
                            <?= userAccount::$error['Semail_Phn'] ?? null ?>
                        </div>
                    </div>

                    <!-- gender -->
                    <div class="col-12 p-0">
                        <span>Gender</span>
                    </div>
                    <div class="col-12 p-0 d-flex justify-content-between form-group">
                        <label for="female" class="align-middle form-control form-control-sm d-flex justify-content-between me-3 <?= isset(userAccount::$gndr['SGender']) ? "is-invalid" : null ?>">
                            <label for="female">Female</label>
                            <input type="radio" value="Female" name="SGender" class="align-middle" id="female" <?= $_SESSION['all users']['gender'] === "Female" ? "checked" : null  ?>>
                        </label>
                        <label for="Male" class="align-middle form-control form-control-sm d-flex justify-content-between me-3 <?= isset(userAccount::$gndr['SGender']) ? "is-invalid" : null  ?>">
                            <label for="Male">Male</label>
                            <input type="radio" id="Male" value="Male" name="SGender" class="align-middle" <?= $_SESSION['all users']['gender'] === "Male" ? "checked" : null  ?>>
                        </label>
                        <label for="Others" class="align-middle form-control form-control-sm d-flex justify-content-between <?= isset(userAccount::$gndr['SGender']) ? "is-invalid" : null  ?>">
                            <label for="Others">Others </label>
                            <input type="radio" value="Others" name="SGender" id="Others" class="align-middle" <?= $_SESSION['all users']['gender'] === "Others" ? "checked" : null  ?>>
                        </label>
                    </div>

                    <!-- submit button -->
                    <div class="p-0">
                        <input type="reset" class="col-2 mx-auto btn btn-sm btn-dark fw-bold shadow-sm my-3">
                        <input type="submit" name="update123" value="Update" class="col-3 mx-auto btn btn-sm btn-success fw-bold shadow-sm my-3">
                    </div>
                </form>
            </div>
        </div>
        <!-- update information section end here -->
    </div>
</div>

<script>
    const ppimg = document.getElementById("ppimg");
    const imgUploadForm = document.getElementById("imgUploadForm");
    ppimg.addEventListener("change", () => {
        imgUploadForm.submit();
    })
</script>

<?php
include_once("./footer.php");
?>