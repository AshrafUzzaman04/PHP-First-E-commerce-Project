<div class="row">

    <!-- logo -->
    <span class="fw-bold h3 text-center my-3 pb-3 shadow" style="font-family: 'Roboto Mono', monospace;"><a href="./"
            class="text-white text-decoration-none">Admin Pannel</a>
    </span>

    <!-- dropdown button with in sidebar -->
    <div class="dropdown mt-3">
        <span class="dropdown-toggle btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false">
            Action
        </span>
        <ul
            class="dropdown-menu <?= $pageName == "allProduct.php" || $pageName == "addNewProduct.php" ? "show" : null ?>">
            <li>
                <a class="dropdown-item border-bottom <?= $pageName == "allProduct.php" ? "active" : null ?>"
                    href="./allProduct.php">All Product</a>
            </li>
            <li>
                <a class="dropdown-item <?=  $pageName == "addNewProduct.php" ? "active" : null ?>"
                    href="./addNewProduct.php">Add New Product</a>
            </li>
        </ul>
    </div>
</div>