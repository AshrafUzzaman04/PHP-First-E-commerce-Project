<?php
include_once("./header.php");

if(!isset($_GET['id'])){
    header('location: allProduct.php?pageNo=1');
}else{
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM `products` WHERE `id` = $id"; 
    $select = dataBaseInput::$connection->query($selectQuery);

    if($select->num_rows != 1){
        header('location : allProduct.php?pageNo=1');
    } else{
?>

<div class="vh-100 d-flex justify-content-center align-items-center display-6 fw-bold">
    <div>
        <span class="d-block">
            Do you want to delete the product? Which has id number <b><?= $id ?? null ?></b>.
        </span>

        <!-- button -->
        <div class="text-center mt-4">
            <a href="./allProduct.php?pageNo=1" class="btn btn-lg btn-dark fw-bold">No</a>
            <form action="" method="POST" class="d-inline">
                <input type="hidden" value="<?= $id ?? null ?>" name="id">
                <input type="submit" name="dlt123" value="Yes" class="btn btn-lg btn-danger fw-bold">
            </form>
        </div>
    </div>
</div>

<?php
    }
}

// click yes and delete the data from database.
if(isset($_POST['dlt123'])){
    $hiddenUserId = $_POST['id'];
    $dltQuery = "DELETE FROM `products` WHERE `id` = $hiddenUserId";
    $dlt = dataBaseInput::$connection->query($dltQuery);
    if(!$dlt){
        echo"<script>
        toastr.error('Something went wrong! Please try again.');
        setTimeout(() => {
        location.href = './allProduct.php?pageNo=1';
        }, 1000);
        </script>";
    }else{
        echo"<script>
        toastr.success('product deleted Successfully.');
        setTimeout(() => {
        location.href = './allProduct.php?pageNo=1';
        }, 1000);
        </script>";
    }
}


include_once("./footer.php");
?>