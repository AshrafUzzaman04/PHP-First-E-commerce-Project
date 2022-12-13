<?php
include_once("dataBaseInput.php");
class userAccount
{
    public static array $error = [];
    public static array $gndr = ["Male","Female","Others"];
    public static array $success = [];
    public static string $SfistName;
    public static string $SsurName ;
    public static string $Semail_Phn ;
    public static string $Spass ;
    public static string $SCpass ;
    public static string $SGender ;
    public static string $Sbirth_day;
    public static string $Sbirth_month;
    public static string $Sbirth_year;
    public static string $Luemail;
    public static string $Lupass;

   //  upload profile image
    public static string $userEmail;
    public static string $userFileName;
    public static string $tempName;
    public static string $errorImg;
    public static string $successImg;

   //  change password 
   public static string $Opass;
   public static string $Npass;
   public static string $NCpass;

    
    protected function __construct()
    {
        return;
    }

    // security perpaous >>>>>>>>>>>>>>>>>>>>>>
    protected static function sefuda($data){
        $data =htmlspecialchars($data);
        $data =trim($data);
        $data =stripcslashes($data);
        return $data;
    }

   //  validation login & sign in and serverside work 
    public static function validation(): bool
    {
        if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['singup123'])){

            userAccount::$SfistName = $SfistName =userAccount::sefuda($_POST['SfistName']); 
            userAccount::$SsurName = $SsurName =userAccount::sefuda($_POST['SsurName']); 
            userAccount::$Semail_Phn = $Semail_Phn =userAccount::sefuda($_POST['Semail_Phn']); 
            userAccount::$Spass = $Spass =userAccount::sefuda($_POST['Spass']);
            userAccount::$SCpass = $SCpass = userAccount::sefuda($_POST['SCpass']);
            userAccount::$SGender = $SGender =userAccount::sefuda($_POST['SGender'] ?? null); 
            userAccount::$Sbirth_day = $Sbirth_day =userAccount::sefuda($_POST['Sbirth_day'] ?? null); 
            userAccount::$Sbirth_month = $Sbirth_month =userAccount::sefuda($_POST['Sbirth_month'] ?? null); 
            userAccount::$Sbirth_year = $Sbirth_year =userAccount::sefuda($_POST['Sbirth_year'] ?? null); 

            // First Name validate
             if(empty($SfistName)){
                userAccount::$error['SfistName'] = "Enter your First Name."; 
             }elseif(!preg_match("/^[a-zA-Z]*$/",$SfistName)){
                    userAccount::$error['SfistName']= "Invalid name.";
             }else{
              $correctSfistName =dataBaseInput::$connection->real_escape_string($SfistName);
             }
             
            // Sur Name validate
             if(empty($SsurName)){
                userAccount::$error['SsurName'] = "Enter your Surname."; 
             }elseif(!preg_match("/^[a-zA-Z]*$/",$SsurName)){
                    userAccount::$error['SsurName']= "Invalid name.";
             }else{
              $correctSsurName =dataBaseInput::$connection->real_escape_string($SsurName);
             }

            // email validate
             if(empty($Semail_Phn)){
                userAccount::$error['Semail_Phn'] = "Enter your email address."; 
             }elseif(!filter_var("$Semail_Phn , FILTER_VALIDATE_EMAIL")){
                    userAccount::$error['Semail_Phn']= "Invalid email addresss.";
             }else{
               $select_pre_Semail_Phn_query = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$Semail_Phn'";
               $select_pre_Semail_Phn =dataBaseInput::$connection->query($select_pre_Semail_Phn_query);
               if($select_pre_Semail_Phn->num_rows > 0){
                 userAccount::$error['Semail_Phn']= "Email address already exist.";
               }else{
              $correctSemail_Phn =dataBaseInput::$connection->real_escape_string($Semail_Phn);
               }
             }
             
            // password validate
             if(empty($Spass)){
                userAccount::$error['Spass'] = "Enter your password."; 
             }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z]).{8,}$/', $Spass)){ 
                    userAccount::$error['Spass']= "Invalid password.";
             }else{
              $correctSpass =dataBaseInput::$connection->real_escape_string($Spass);
             }
             
            // Confirm pass validate
             if(empty($SCpass)){
                userAccount::$error['SCpass'] = "Enter your password again."; 
             }elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $SCpass) && $Spass !== $SCpass){
                    userAccount::$error['SCpass']= "Password did't match.";
             }else{
              $correctSCpass =dataBaseInput::$connection->real_escape_string($SCpass);
             }

             // birthday validate
             if(empty($Sbirth_day)){
                userAccount::$error['Sbirth_day']= "Enter your Birthday."; 
             } else{
              $correctSbirth_day =dataBaseInput::$connection->real_escape_string($Sbirth_day);
             }
             if(empty($Sbirth_month)){
                userAccount::$error['Sbirth_month']= "Enter your Birthday.";
             } else{
              $correctSbirth_month =dataBaseInput::$connection->real_escape_string($Sbirth_month);
             }
             if(empty($Sbirth_year)){
                userAccount::$error['Sbirth_year']= "Enter your Birthday."; 
             } else{
              $correctSbirth_year =dataBaseInput::$connection->real_escape_string($Sbirth_year);
             }
             
            // Gender validate
             if(empty($SGender)){
                userAccount::$gndr['SGender'] = "Enter your gender."; 
             }elseif(!in_array($SGender, userAccount::$gndr)){
                  userAccount::$gndr['SGender'] = "Do't think it weak that you have given your hand.";
             } else{
              $correctSGender =dataBaseInput::$connection->real_escape_string($SGender);
             }

             if(isset($correctSfistName) && isset($correctSsurName) && isset($correctSemail_Phn) && isset($correctSpass) && isset($correctSCpass) && isset($correctSbirth_day) && isset($correctSbirth_month) &&isset($correctSbirth_year) && isset($correctSGender))
             {
               $convert_Spass = md5("$correctSpass"); // convert the user password with this line.
               $insert_query = "INSERT INTO `all users`(`First_Name`, `Surname`, `email_or_mobile`, `password`, `Birth_day`, `Birth_month`, `Birth_year`, `gender`) VALUES ('$correctSfistName','$correctSsurName','$correctSemail_Phn','$convert_Spass','$correctSbirth_day', '$correctSbirth_month' ,'$correctSbirth_year' ,'$correctSGender')";
               $insert =  dataBaseInput::$connection->query($insert_query);
               
               if(!$insert){
                  userAccount::$error['insert'] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>Something went wrong!</strong> Sign up again with your details.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
               }else{
               
               //  sing up and kicked into the index.php page
                $_SESSION['all users'] = ["First_Name" => $correctSfistName , "Surname" => $correctSsurName , "email_or_mobile"=> $correctSemail_Phn , "password" => $correctSpass , "Birth_day" => $correctSbirth_day, "Birth_month" => $correctSbirth_month , "Birth_year" => $correctSbirth_year, "gender" => $correctSGender];
               }
               
            }
        }

        if($_SERVER['REQUEST_METHOD'] === "POST"  && isset ($_POST['signin123'])){
        userAccount::$Luemail = $Luemail = userAccount::sefuda($_POST['Luemail']);
        userAccount::$Lupass = $Lupass = userAccount::sefuda($_POST['Lupass']);

            // login email validate
             if(empty($Luemail)){
                userAccount::$error['Luemail'] = "Enter your email address."; 
             }else{
              $correctLuemail =dataBaseInput::$connection->real_escape_string($Luemail);
             }
               
            // login password validate
             if(empty($Lupass)){
                userAccount::$error['Lupass'] = "Enter your password.";
             }else{
              $correctLupass =dataBaseInput::$connection->real_escape_string($Lupass);
             }

             if(!empty($correctLuemail) && !empty($correctLupass)){
               $convert_Lupass = md5($Lupass);
               $check_user_query = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$Luemail' AND `password` = '$convert_Lupass'";
               $check_user = dataBaseInput::$connection->query($check_user_query);
               if($check_user->num_rows !== 1){
                   userAccount::$error['Linsert'] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"><strong>Log in failed!</strong> invalid email or password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
               }else{
               $uInfo = $check_user->fetch_object();
               $correctFirstName = $uInfo->First_Name;
               $correctSurName = $uInfo->Surname;
               $correctSemail = $uInfo->email_or_mobile;
               $correctgender = $uInfo->gender;
               $img = $uInfo->img;
               $role = $uInfo->role;
                  $_SESSION['all users'] = [ "img" => $img, "role" => $role, "First_Name" => $correctFirstName , "Surname" => $correctSurName ,    "email_or_mobile"=> $correctSemail, "gender" => $correctgender];
               }   
               return true;
            }
      }
      return true;
   }  

   // update user profile picture validation and serverside work
   public static function updateProfile(): string
   {
      if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])){
         userAccount::$userEmail = $userEmail =$_POST['email'];
         userAccount::$userFileName =  $userFileName =$_FILES['ppimg']['name'];
         userAccount::$tempName = $tempName = $_FILES['ppimg']['tmp_name'];

           if(empty($tempName)){
            userAccount::$errorImg ="Please upload an image.";
           }elseif(!getimagesize($tempName)){
            userAccount::$errorImg = "Invalid image format. Please upload an image file.";
           }else{
               $selectPreUserDataQuery = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$userEmail'";
               $selectPreUserData = dataBaseInput::$connection->query($selectPreUserDataQuery);
               if($selectPreUserData->num_rows != 1){
                  userAccount::$errorImg = "User Data not found!";
               }else{
                  $selectPreUser = $selectPreUserData->fetch_object();
                  if($selectPreUser->img != null){
                     unlink($selectPreUser->img);
                  }
                  $userId = $selectPreUser->ID;
                  $a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                  $ext = pathinfo($userFileName, PATHINFO_EXTENSION);
                  
                  (!is_dir("./Images/All_Users/$userId"))? mkdir("./Images/All_Users/$userId") : null;
                  $uniqeName = uniqid() . rand(100000, 999999) . substr(str_shuffle($a), 0, 8) . date("himdYasfl") . "." . $ext;
                  $destination = "./Images/All_Users/$userId/$uniqeName";
                  $move =  move_uploaded_file($tempName, $destination);
                  if(!$move){
                   userAccount::$errorImg = "Images uploaded failed.";
                  }else{
                         $imgUpdateQuery = "UPDATE `all users` SET `img` = '$destination' WHERE `email_or_mobile` = '$userEmail'";
                         $imgUpdate = dataBaseInput::$connection->query($imgUpdateQuery);
                         if(!$imgUpdate){
                            userAccount::$errorImg  = "something went wrong";
                         }else{
                            $_SESSION['all users']['img'] = $destination;
                            userAccount::$successImg = "Image upload successfully.";
                         }
                  }
               }
         }
      }
      return "";
   }

   // update user info validation and severside work
   public static function updateInformation(): string
   {
      if(($_SERVER['REQUEST_METHOD']) === "POST" && isset($_POST['update123'])){
            userAccount::$SfistName = $SfistName =userAccount::sefuda($_POST['SfistName']); 
            userAccount::$SsurName = $SsurName =userAccount::sefuda($_POST['SsurName']); 
            userAccount::$Semail_Phn = $Semail_Phn =userAccount::sefuda($_POST['Semail_Phn']); 
            userAccount::$SGender = $SGender =userAccount::sefuda($_POST['SGender'] ?? null); 

            // First Name validate
             if(empty($SfistName)){
                userAccount::$error['SfistName'] = "Enter your First Name."; 
             }elseif(!preg_match("/^[a-zA-Z]*$/",$SfistName)){
                    userAccount::$error['SfistName']= "Invalid name.";
             }else{
              $correctSfistName =dataBaseInput::$connection->real_escape_string($SfistName);
             }
             
            // Sur Name validate
             if(empty($SsurName)){
                userAccount::$error['SsurName'] = "Enter your Surname."; 
             }elseif(!preg_match("/^[a-zA-Z]*$/",$SsurName)){
                    userAccount::$error['SsurName']= "Invalid name.";
             }else{
              $correctSsurName =dataBaseInput::$connection->real_escape_string($SsurName);
             }

            // email validate
             if(empty($Semail_Phn)){
                userAccount::$error['Semail_Phn'] = "Enter your email address."; 
             }elseif(!filter_var("$Semail_Phn , FILTER_VALIDATE_EMAIL")){
                    userAccount::$error['Semail_Phn']= "Invalid email addresss.";
             }else{
               if($_SESSION['all users']['email_or_mobile'] != $Semail_Phn){
               $select_pre_Semail_Phn_query = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$Semail_Phn'";
               $select_pre_Semail_Phn =dataBaseInput::$connection->query($select_pre_Semail_Phn_query);
               if($select_pre_Semail_Phn->num_rows > 0){
                   userAccount::$error['Semail_Phn']= "Email address already exist.";
               }else{
                   $correctSemail_Phn =dataBaseInput::$connection->real_escape_string($Semail_Phn);
               }
               }else{
                   $correctSemail_Phn =dataBaseInput::$connection->real_escape_string($Semail_Phn);
               }
             }

             // Gender validate
             if(empty($SGender)){
                userAccount::$gndr['SGender'] = "Enter your gender."; 
             } elseif(!in_array($SGender, userAccount::$gndr)){
                  userAccount::$gndr['SGender'] = "Do't think it weak that you have given your hand.";
             } else{
                  $correctSGender =dataBaseInput::$connection->real_escape_string($SGender);
             }

             if(isset($correctSfistName)  && isset($correctSsurName) && isset($correctSemail_Phn) && isset($correctSGender)){
               $Semail_Phn = $_SESSION['all users']['email_or_mobile'];
               $updateUserInfoQuery = "UPDATE `all users` SET `First_Name`= '$correctSfistName',`Surname`='$correctSsurName',`email_or_mobile`='$correctSemail_Phn',`gender`='$correctSGender' WHERE `email_or_mobile` = '$Semail_Phn'";
               $updateUserInfo = dataBaseInput::$connection->query($updateUserInfoQuery);
               if(!$updateUserInfo){
                    userAccount::$error['updateUserInfo'] = '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"> <strong>Something went wrong!</strong> Sign up again with your details. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
               }else{echo"<script>
toastr.success('Password update Successfully.');
setTimeout(() => {
    location.href = './updateProfile.php';
}, 1000);
</script>";

                    $userImg = $_SESSION['all users']['img'];
                    $_SESSION['all users'] = ["First_Name" => $correctSfistName , "Surname" => $correctSsurName , "email_or_mobile"=> $correctSemail_Phn , "gender" => $correctSGender, "img" => $userImg]; 
               }
             }
      }
      return "";
   }

   // change password validation and severside work
   public static function changePass():string{
       if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['cngPass123'])){
         userAccount::$Opass = $Opass = userAccount::sefuda( $_POST['Opass']);
         userAccount::$Npass = $Npass = userAccount::sefuda($_POST['Npass']);
         userAccount::$NCpass = $NCpass = userAccount::sefuda($_POST['NCpass']);
         
            // old password validate
             if(empty($Opass)){
                userAccount::$error['Opass'] = "Enter your password."; 
             }else{
               $userEmail = $_SESSION['all users']['email_or_mobile'];
               $checkOpassQuery = "SELECT * FROM `all users` WHERE `email_or_mobile` = '$userEmail'";
               $checkOpass = dataBaseInput::$connection->query($checkOpassQuery);
               $checkOpassData = $checkOpass->fetch_object();
               $realOldPass = $checkOpassData->password;
               
               if(md5($Opass) === $realOldPass){  
                   $correctOpass =dataBaseInput::$connection->real_escape_string($Opass);
               }else{
                   userAccount::$error['Opass'] = "Old password did't matched!";
               }
             }
             
            // new password validate
             if(empty($Npass)){
                userAccount::$error['Npass'] = "Enter your password."; 
             }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z]).{8,}$/', $Npass)){ 
                    userAccount::$error['Npass']= "Invalid password.";
             }else{
               if(md5($Npass) === md5($Opass)){
                  userAccount::$error['Npass']= "Enter a new password.";
               }else{
                  $correctNpass =dataBaseInput::$connection->real_escape_string($Npass);
               }
             }
             
            // Confirm pass validate
             if(empty($NCpass)){
                userAccount::$error['NCpass'] = "Enter your password again."; 
             }elseif($Npass !== $NCpass){
                    userAccount::$error['NCpass']= "Password did't match.";
             }else{
              $correctNCpass =dataBaseInput::$connection->real_escape_string($NCpass);
             }

            //  update password in database 
            if(isset($correctOpass) && isset($correctNpass) && isset($correctNCpass)){
               $convertPass = md5($correctNCpass);
               $updatepassQuery = "UPDATE `all users` SET `password`='$convertPass' WHERE `email_or_mobile` = '$userEmail';";
               $updatepass = dataBaseInput::$connection->query($updatepassQuery);
               if($updatepass){
                 userAccount::$Opass = userAccount::$Npass =userAccount::$NCpass = "";
               echo"<script>
toastr.success('Password update Successfully.');
setTimeout(() => {
    location.href = './changePass.php';
}, 2000);
</script>";
               }else{
                  echo"<script>
toastr.success('Something went wrong!');
setTimeout(() => {
    location.href = './changePass.php';
}, 2000);
</script>";
               }
            }   
       }
      return "";
   }
 }