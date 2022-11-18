<?php
include_once("header.php");
(isset($_SESSION['all users']))? header("location: ./"): null;
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['singup123'])){
userAccount::validation();
(isset($_SESSION['all users']))? header("location: ./?success=ture"): null;
}
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['signin123'])){
    userAccount::validation();
    (isset($_SESSION['all users']))? header("location: ./?success=ture"): null;
}
?>

<div class="container-fluid p-0">
    <!-- X Button div -->
    <div class="text-end" style="border-bottom: 1px solid #ddd; height: 50px;">
        <div class="my-auto align-middle pt-2">
            <a href="./index.php" class="mx-3 align-middle" style="margin-top:50px;">
                <i class="fa-solid fa-xmark fs-4 align-middle xButton"></i>
            </a>
        </div>
    </div>
</div>

<!-- start main container (login.php) -->
<div class="container">
    <div class="row no-gutters d-flex justify-content-around mx-auto mt-4">

        <!-- (sing-in) form started here -->
        <div class="col-5">
            <div class="col-12">
                <h3 class="m-0">Sign In</h3>
                <span class="fw-lighter" style="font-size: 14px;">Login with your correct details.</span>
                <div class="col-10">
                    <?=userAccount::$error['Linsert'] ?? null?>
                    <?= userAccount::$error['Lpinsert'] ?? null?>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-10">
                        <div>
                            <hr style="border-top:2px solid #0B5ED7;">
                        </div>

                        <!-- email -->
                        <div class="my-2">
                            <input type="email"
                                class="form-control <?= isset(userAccount::$error['Luemail']) ? "is-invalid" : null ?>"
                                placeholder=" Email address" name="Luemail"
                                value="<?= userAccount::$Luemail ?? null ?>">
                            <div class="text-danger">
                                <?= userAccount::$error['Luemail'] ?? null ?>
                            </div>
                        </div>


                        <!-- password -->
                        <div class="my-3">
                            <input type="password"
                                class="form-control <?= isset(userAccount::$error['Lupass']) ? "is-invalid" : null ?>"
                                placeholder="Password" name="Lupass" value="<?= userAccount::$Lupass ?? null ?>">
                            <div class="text-danger">
                                <?= userAccount::$error['Lupass'] ?? null ?>
                            </div>
                        </div>

                        <!-- login button -->
                        <div class="my-3">
                            <input type="submit" name="signin123" class="col-12 btn btn-primary fw-bold" value="Log in">
                        </div>

                        <!-- forget link -->
                        <div class="text-center">
                            <a href="javascript:void(0)" class="text-center" style="font-size: 12px;">
                                <span>Forgotten password?</span>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- (sing-Up) form -->
        <div class="col-5">
            <div class="col-12 p-0">
                <h3 class="m-0">Sign Up</h3>
                <span class="fw-lighter" style="font-size: 14px;">It's quick and easy.</span>
            </div>
            <div></div>
            <div>
                <?=userAccount::$error['insert'] ?? null?>
            </div>
            <div>
                <hr style="border-top:2px solid green;">
                <form action="" method="post">
                    <div class="row col-12 mx-auto">

                        <!-- First name -->
                        <div class="col-6 ps-0 mb-3">
                            <input type="text" placeholder="First Name" name="SfistName"
                                class=" form-control form-control-sm <?= isset(userAccount::$error['SfistName'])? "is-invalid" : null ?> <?= isset(userAccount::$SfistName)?"is-valid": null ?>"
                                value="<?= userAccount::$SfistName ?? null ?>">
                            <div class=" text-danger">
                                <?= userAccount::$error['SfistName'] ?? null ?>
                            </div>
                        </div>

                        <!-- Surname -->
                        <div class=" col-6 pe-0 mb-3">
                            <input type="text" placeholder="Surname" name="SsurName" class=" form-control form-control-sm
                                 <?= isset(userAccount::$error['SsurName'])? "is-invalid": null ?>
                                 <?= isset(userAccount::$SsurName)?"is-valid": null ?>"
                                value="<?= userAccount::$SsurName ?? null ?>">
                            <div class=" text-danger">
                                <?= userAccount::$error['SsurName'] ?? null ?>
                            </div>
                        </div>

                        <!-- email -->
                        <div class=" col-12 p-0 mb-3">
                            <input type="email" name="Semail_Phn" placeholder="Email address"
                                class="form-control form-control-sm <?= isset(userAccount::$error['Semail_Phn'])? "is-invalid" : null ?> <?= isset(userAccount::$Semail_Phn)?"is-valid": null ?>"
                                value="<?= userAccount::$Semail_Phn ?? null ?>">
                            <div class="text-danger">
                                <?= userAccount::$error['Semail_Phn'] ?? null ?>
                            </div>
                        </div>

                        <!-- password -->
                        <div class="col-12 p-0 mb-3">
                            <input type="password" name="Spass" placeholder="New password"
                                class="form-control form-control-sm <?= isset(userAccount::$error['Spass'])? "is-invalid" : null ?> <?= isset(userAccount::$Spass)?"is-valid": null ?>"
                                value="<?= userAccount::$Spass ?? null ?>">
                            <div class="text-danger">
                                <?= userAccount::$error['Spass'] ?? null ?>
                            </div>
                        </div>

                        <!-- confirm password -->
                        <div class="col-12 p-0">
                            <input type="password" name="SCpass" placeholder="Confirm password"
                                class="form-control form-control-sm <?= isset(userAccount::$error['SCpass'])? "is-invalid" : null ?> <?= isset(userAccount::$SCpass)?"is-valid": null ?>"
                                value="<?= userAccount::$SCpass ?? null ?>">
                            <div class="text-danger">
                                <?= userAccount::$error['SCpass'] ?? null ?>
                            </div>
                        </div>

                        <!-- Date of birth -->
                        <div class="col-12 p-0 mt-2">
                            <span>Date of birth</span>
                        </div>
                        <div class="col-12 p-0 d-flex justify-content-between form-group">
                            <select name="Sbirth_day" id=""
                                class="form-select form-select-sm me-3 <?= isset(userAccount::$error['Sbirth_day'])? "is-invalid" : null  ?>">
                                <option value="<?= userAccount::$Sbirth_day ?? null  ?>">
                                    <?= userAccount::$Sbirth_day ?? "-- Date --" ?>
                                </option>
                                <?php
                                    $day = date("d");
                                ?>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select name="Sbirth_month" id=""
                                class="form-select form-select-sm me-3 <?= isset(userAccount::$error['Sbirth_month'])? "is-invalid" : null  ?>">
                                <option value="<?= userAccount::$Sbirth_month ?? null ?>">
                                    <?= userAccount::$Sbirth_month ?? "-- Month --" ?>
                                </option>
                                <option value="January">Jan</option>
                                <option value="February">Feb</option>
                                <option value="March">Mar</option>
                                <option value="April">Apr</option>
                                <option value="May">May</option>
                                <option value="June">Jun</option>
                                <option value="July">Jul</option>
                                <option value="Auguest">Aug</option>
                                <option value="September">Sep</option>
                                <option value="October">Oct</option>
                                <option value="November">Nov</option>
                                <option value="December">Dec</option>
                            </select>
                            <select name="Sbirth_year" id=""
                                class="form-select form-select-sm <?= isset(userAccount::$error['Sbirth_year'])? "is-invalid" : null ?>">
                                <option value="<?= userAccount::$Sbirth_year?? null ?>">
                                    <?= isset(userAccount::$Sbirth_year)? userAccount::$Sbirth_year : "-- Year --" ?>
                                </option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                                <option value="1919">1919</option>
                                <option value="1918">1918</option>
                                <option value="1917">1917</option>
                                <option value="1916">1916</option>
                                <option value="1915">1915</option>
                                <option value="1914">1914</option>
                                <option value="1913">1913</option>
                                <option value="1912">1912</option>
                                <option value="1911">1911</option>
                                <option value="1910">1910</option>
                            </select>
                        </div>


                        <!-- gender -->
                        <div class="col-12 p-0 mt-2">
                            <span>Gender</span>
                        </div>
                        <div class="col-12 p-0 d-flex justify-content-between form-group">
                            <label for="female"
                                class="align-middle form-control form-control-sm d-flex justify-content-between me-3 <?= isset(userAccount::$gndr['SGender'])? "is-invalid" : null ?>">
                                <label for="female">Female</label>
                                <input type="radio" value="Female" name="SGender" class="align-middle" id="female"
                                    <?= (isset(userAccount::$SGender) && userAccount::$SGender === "Female") ? "checked": null  ?>>
                            </label>
                            <label for="Male"
                                class="align-middle form-control form-control-sm d-flex justify-content-between me-3 <?= isset(userAccount::$gndr['SGender'])? "is-invalid" : null  ?>">
                                <label for="Male">Male</label>
                                <input type="radio" id="Male" value="Male" name="SGender" class="align-middle"
                                    <?= (isset(userAccount::$SGender) && userAccount::$SGender === "Male") ? "checked": null  ?>>
                            </label>
                            <label for="Others"
                                class="align-middle form-control form-control-sm d-flex justify-content-between <?= isset(userAccount::$gndr['SGender'])? "is-invalid" : null  ?>">
                                <label for="Others">Others </label>
                                <input type="radio" value="Others" name="SGender" id="Others" class="align-middle"
                                    <?= (isset(userAccount::$SGender) && userAccount::$SGender === "Others") ? "checked": null  ?>>
                            </label>
                        </div>
                        <div class="text-danger p-0">
                            <?= userAccount::$gndr['SGender'] ?? null ?>
                        </div>

                        <!-- sign Up button -->
                        <input type="submit" name="singup123" value="Sign-Up"
                            class="col-5 mx-auto btn btn-sm btn-success fw-bold shadow-sm my-3">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>