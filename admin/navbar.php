<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid iconDiv">
        <a class="navbar-brand" href="./">
            <img src="../images/webLogo.png" width="50px" alt="icon">
        </a>
        <div>

            <!-- manu button -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- navbar profile picture -->
                <?php if(isset($_SESSION['all users'])){
                    $Semail_Phn = $_SESSION['all users']['email_or_mobile'];
                    $check_user_img_query = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$Semail_Phn'";
                    $check_user_img = dataBaseInput::$connection->query($check_user_img_query);
                    $user_img = $check_user_img->fetch_object();
                    ?>
                <li class="nav-item dropdown my-auto d-none d-lg-block">
                    <a class="nav-link" href="" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <img src="
                        <?php
                         if((empty($_SESSION['all users']['img']))){
                            if(($_SESSION['all users']['gender']) === "Male"){
                               echo '../Images/image-empty-male.png';
                            }elseif(($_SESSION['all users']['gender']) === "Female"){
                                echo '../Images/image-empty-female-cartoon.png';
                            }else{
                                echo '../Images/hijla.jpg';
                            }
                         }else{
                           echo "." . $user_img->img;
                         }
                        ?>" alt="" class="img-fluid rounded-circle border border-primary"
                            style="width:40px; height:40px; object-fit: cover;">
                    </a>
                    <ul class="dropdown-menu" style="right: 0; left: auto;">
                        <li><a class="dropdown-item" href="../updateProfile.php"><i class="fa-solid fa-wrench"></i>
                                Update Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="../changePass.php">
                                <i class="fa-solid fa-key"></i> Change
                                password
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../logOut.php"><i class="fa-solid fa-right-from-bracket"></i>
                                Log Out</a>
                        </li>
                    </ul>
                </li><samp></samp>
                <?php }elseif((!isset($_SESSION['all users']))) {?>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="../login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>