<?php 
include_once("./header.php");
include_once("./navbar.php");
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['cngPass123'])){
userAccount::changePass();
}
if(!isset($_SESSION['all users'])){?>
<script>
location.href = "./";
</script>
<?php
}
?>

<div class="container">
    <div class="row my-5">
        <div class="col-5 mx-auto">
            <div class="col-12">
                <h3 class="m-0">Change Password</h3>
                <span class="fw-lighter" style="font-size: 14px;">
                    You can change your password.</span>
            </div>
            <div>
                <hr style="border-top:2px solid green;">
                <form action="" method="POST">

                    <!-- old password -->
                    <div class="col-12 p-0 mb-3">
                        <input type="password" name="Opass" placeholder="Old password"
                            class="form-control form-control-sm <?= isset(userAccount::$error['Opass'])? "is-invalid" : null ?>"
                            value="<?= userAccount::$Opass ?? null ?>">
                        <div class="text-danger">
                            <?= userAccount::$error['Opass'] ?? null ?>
                        </div>
                    </div>

                    <!-- new password -->
                    <div class="col-12 p-0 mb-3">
                        <input type="password" name="Npass" placeholder="New password"
                            class="form-control form-control-sm <?= isset(userAccount::$error['Npass'])? "is-invalid" : null ?>"
                            value="<?= userAccount::$Npass ?? null ?>">
                        <div class="text-danger">
                            <?= userAccount::$error['Npass'] ?? null ?>
                        </div>
                    </div>

                    <!-- confirm password -->
                    <div class="col-12 p-0">
                        <input type="password" name="NCpass" placeholder="Confirm password"
                            class="form-control form-control-sm <?= isset(userAccount::$error['NCpass'])? "is-invalid" : null ?>"
                            value="<?= userAccount::$NCpass ?? null ?>">
                        <div class="text-danger">
                            <?= userAccount::$error['NCpass'] ?? null ?>
                        </div>
                    </div>

                    <div>
                        <input type="submit" name="cngPass123" value="Change Password"
                            class="col-4 mx-auto btn btn-sm btn-success fw-bold shadow-sm my-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once("./footer.php");
?>