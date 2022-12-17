<?php 
include_once("header.php");

$getProductReadQuery = "SELECT * FROM `products`";
$getProductRead = dataBaseInput::$connection->query($getProductReadQuery);

?>

<div class="container-fluid">
    <div class="row">

        <!-- sidebar container include from index.php -->
        <div class="col-6 col-md-2 bg-info text-white min-vh-100">
            <?php
            include_once("./sidebar.php");
            ?>
        </div>

        <!-- all product list here -->
        <div class="col-10 p-0">

            <!-- include navbar -->
            <?php
            include_once("./navbar.php");
?>
            <div class="text-dark mx-auto text-center col-xxl-10">
                <h2 class="my-3">All Product</h2>
                <?php
                if ($getProductRead->num_rows > 0 || $getProductRead):

                    // // paigination php coding >>>>>>>> !important
                    !isset($_GET['pageNo']) && header("location: ./$pageName?pageNo=1");
                    $pageNo = ($_GET['pageNo']);
                    $totalProduct = $getProductRead->num_rows;
                    $productPerPage = 5;
                    $totalPage = ceil($totalProduct / $productPerPage);
                    $startPoint = ($pageNo -1) * $productPerPage;
                    $getProductReadQuery = "SELECT * FROM `products` LIMIT $startPoint, $productPerPage";
                    $getProductRead = dataBaseInput::$connection->query($getProductReadQuery);
                    
                    ?>
                <table class="table table-hover">
                    <tr class="table-info">
                        <th>Serial NO.</th>
                        <th>Name</th>
                        <th>Regular Prize</th>
                        <th>Discount Prize</th>
                        <th>Description</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $serialNo = $startPoint +1;
                    while ($data = $getProductRead->fetch_object()) : 
                    
                    ?>
                    <tr>
                        <td class="align-middle">
                            <?= $serialNo ?>
                        </td>
                        <td class="align-middle"><?= $data->name ?></td>
                        <td class="align-middle"><?= $data->prize ?></td>
                        <td class="align-middle"><?= $data->discount_prize ?></td>
                        <td class="align-middle"><?= $data->description ?></td>
                        <td class="align-middle"><img src="<?= "." . $data->img ?>" class="img-fluid" alt="" height="80"
                                width="80"></td>
                        <td class="align-middle">
                            <a href="" class="btn btn-dark">
                                <svg width="20" height="20" class="d-flex justify-content-center align-items-center"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                            <a href="" class="btn btn-danger">
                                <svg width="20" height="20" class="d-flex justify-content-center align-items-center"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 6h18"></path>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php
                        ++$serialNo;
                         endwhile ?>
                </table>

                <!-- paigination section for product per page.-->
                <nav>
                    <ul class="pagination pagination-sm">
                        <?php for ($i= 1; $i <= $totalPage ; $i++): ?>
                        <li class="page-item <?= $i == $pageNo ? "active" :  null  ?>" aria-current="page"
                            style="cursor: pointer;">
                            <a class="page-link" href="<?= "$pageName?pageNo=$i" ?>"><?= $i ?></a>
                        </li>
                        <?php endfor ?>
                    </ul>
                </nav>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>