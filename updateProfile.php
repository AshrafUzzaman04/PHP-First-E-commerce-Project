<?php
include_once("./header.php");
include_once("./navbar.php");
userAccount::updateProfile();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data" id="imgUploadForm">
                <input type="hidden" name="email" value="<?= $_SESSION['all users']['email_or_mobile'] ?>">
                <label for="ppimg" class="text-center imagePP">

                    <img src="<?php 
                    include_once("./Classes/userAccount.php");
                    if(empty($_SESSION['all users']['img'])) {
                            if(($_SESSION['all users']['gender']) === "Male"){
                               echo './Images/image-empty-male.png';
                            }elseif(($_SESSION['all users']['gender']) === "Female"){
                                echo './Images/image-empty-female-cartoon.png';
                            }else{
                                echo './Images/hijla.jpg';
                            }
                    }else{
                       echo  $_SESSION['all users']['img'];
                    }
                    ?>" alt="" class="img-fluid rounded-circle border border-dark border-2"
                        style="width:200px; height:200px; object-fit: cover;">

                    <h6>Click to change the image!</h6>
                </label>
                <input type="file" id="ppimg" name="ppimg" class="d-none">
                <!-- <a href="" class="text-decoration-none text-dark">
                    <ion-icon name="camera-outline"
                        class="mx-auto bg-light shadow-sm border-white border-3 border rounded-circle p-1 editPP"
                        style="font-size: 26px;">
                    </ion-icon>
                </a> -->
            </form>
            <div class="text-danger">
                <?= userAccount::$errorImg ?? null ?>
            </div>
            <div class="text-success">
                <script>
                if (<?= userAccount::$successImg ?? null ?>) {
                    toastr.success('Image Upload Successfully.');
                    setInterval(() => {
                        location.href = "./updateProfile.php";
                    }, 2000);
                }
                </script>
            </div>
        </div>
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