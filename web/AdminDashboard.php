<!-- Header.php file -->
<?php
include('./Header.php');

if (isset($_SESSION['admin'])) {
    $_SESSION['SuccessMessage'] = 'Admin Logged In Succesfully';
} else {
    Redirect('AdminLogin.php');
    $_SESSION['ErrorMessage'] = 'Login With Correct Information';
}

?>

<!-- user dashboard php file -->
<section id="admin_dashboard" class="my-5">
    <div class="container-fluid">
        <h3 class="font-rale m-4"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h3>
        <h5 class="font-rale m-4">Logged in as <strong><?php echo $_SESSION['admin'];  ?></strong></h5>
        <button class="btn btn-danger m-4"> <i class="fas fa-sign-out-alt"></i> Logout</button>
        <br>
        <div class="row">
            <span id="data" class=""></span>
            <div class="col-sm-12 text-right  my-3">
                <div class="btn-group my-3" role="group">

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_product_data_Modal">
                        Add Product
                    </button>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal">
                        Add Category
                    </button>

                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add_admin_Modal">
                        Add Admin
                    </button>
                </div>
                <br><br>
            </div>

            <!-- Modal add admin -->
            <div class="modal fade font-rubik" id="add_admin_Modal" tabindex="-1" role="dialog" aria-labelledby="add_admin_Modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title_category">Add New Admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- ------------------form---------------------------- -->
                            <form method="POST" enctype="multipart/form-data" id="insert_admin" class="m-2">

                                <!-- Admin Username -->
                                <input type="text" class="form-control m-2" placeholder="Username" name="username" id="username">

                                <!-- admin password -->
                                <input type="password" class="form-control m-2" placeholder="Password" name="password" id="password">

                                <input type="submit" class="btn btn-primary m-2" name="add_admin_btn" id="admin_submit" />


                                <!-- ---Submit Button---- -->
                            </form>
                            <!-- -----x-------------form----------------x------------ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal add admin -->



            <!-- Modal add category -->
            <div class="modal fade font-rubik" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="add_data_Modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title_category">Insert New Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- ------------------form---------------------------- -->
                            <form method="POST" enctype="multipart/form-data" id="insert_category" class="m-2">
                                <!-- hiddden input -->
                                <input type="hidden" name="category_id" id="category_id">
                                <!-- Category title -->
                                <input type="text" class="form-control m-2" placeholder="Category Title" name="category_title" id="category_title">
                                <!-- category image -->
                                <div class="custom-file m-2">
                                    <input type="file" class="custom-file-input mb-3" name="category_image" id="category_image" />
                                    <label class="custom-file-label" for="customFile">Upload Product Image</label>
                                </div>
                                <!-- category info -->
                                <input type="text" class="form-control m-2" placeholder="Category Information" name="category_info" id="category_info">

                                <input type="submit" class="btn btn-primary m-2" name="add_product_btn" id="category_submit" />


                                <!-- ---Submit Button---- -->
                            </form>
                            <!-- -----x-------------form----------------x------------ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal add category -->



            <!-- Modal edit category -->
            <div class="modal fade font-rubik" id="edit_data_Modal" tabindex="-1" role="dialog" aria-labelledby="edit_data_Modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title_category">Edit Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- ------------------form---------------------------- -->
                            <form method="POST" enctype="multipart/form-data" id="edit_category" class="m-2">
                                <!-- hiddden input -->
                                <input type="hidden" name="edit_category_id" id="edit_category_id" />
                                <!-- Category title -->
                                <input type="text" class="form-control m-2" placeholder="Category Title" name="edit_category_title" id="edit_category_title">
                                <!-- category image -->
                                <div class="custom-file m-2">
                                    <input type="file" class="custom-file-input mb-3" name="edit_category_image" id="edit_category_image" />
                                    <label class="custom-file-label" for="customFile">Upload Product Image</label>
                                </div>
                                <!-- category info -->
                                <input type="text" class="form-control m-2" placeholder="Category Information" name="edit_category_info" id="edit_category_info">

                                <input type="submit" class="btn btn-primary m-2" name="edit_category_submit" value="Edit" id="edit_category_submit" />


                                <!-- ---Submit Button---- -->
                            </form>
                            <!-- -----x-------------form----------------x------------ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit category -->




            <!-- Modal add product -->
            <div class="modal fade font-rubik" id="add_product_data_Modal" tabindex="-1" role="dialog" aria-labelledby="add_product_data_Modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Insert New Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- ------------------form---------------------------- -->

                            <form method="POST" enctype="multipart/form-data" id="insert_product">
                                <div class="form-row">
                                    <!-- ---product Name--- -->
                                    <div class="form-group col-md-3">
                                        <label for="productName">Product Name</label>
                                        <input type="text" class="form-control" name="productName" id="pro-name" value="<?php echo $productName  ?? ''; ?>" />
                                    </div>
                                    <!-- -x--product Name--x- -->

                                    <!-- ---Brand--- -->
                                    <div class="form-group col-md-3">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" name="brand" id="pro-brand" value="<?php echo $brand  ?? ''; ?>" />
                                    </div>
                                    <!--x---Brand---x -->
                                    <!-- ---In stock--- -->

                                    <div class="form-group col-md-3">
                                        <label for="stock">In Stock</label>
                                        <input type="number" class="form-control" name="inStock" id="pro-inStock" value="<?php echo $inStock  ?? ''; ?>" />
                                    </div>
                                    <!-- x---In stock---x -->
                                    <!-- ---Unit Price--- -->
                                    <div class="form-group col-md-3">
                                        <label for="unitPrice">Unit Price</label>
                                        <input type="number" class="form-control" name="unitPrice" id="pro-unitPrice" value="<?php echo $unitPrice  ?? ''; ?>" />
                                    </div>
                                    <!--x---Unit Price---x -->
                                </div>

                                <div class="form-row my-2">
                                    <!-- ---file---- -->
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input mb-3" name="pro-image" id="pro-image" value="<?php echo $image  ?? ''; ?>" />
                                            <label class="custom-file-label" for="customFile">Upload Product Image</label>
                                            <span id="uploaded-image"></span>
                                        </div>
                                    </div>
                                    <!-- file -->
                                    <!-- category -->
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Category">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- ---Seller---- -->
                                    <div class="form-group col-md-6">
                                        <label for="seller">Seller</label>
                                        <input type="text" class="form-control" name="seller" id="pro-seller" value="<?php echo $seller  ?? ''; ?>" />
                                    </div>
                                    <!-- x---Seller----x -->
                                    <!-- ---Seller Contact---- -->
                                    <div class="form-group col-md-6">
                                        <label for="seller_contact">Seller Contact</label>
                                        <input type="text" class="form-control" name="seller_contact" id="pro-seller-contact" value="<?php echo $seller_contact ?? ''; ?>" />
                                    </div>
                                    <!-- -x--Seller Contact----x -->
                                </div>
                                <!-- ---Details---- -->
                                <div class="form-group">
                                    <label for="product_details">Details</label>
                                    <textarea type="text" class="form-control" id="product_details" name="product_details" value="<?php echo $product_details ?? ''; ?>">
                                    </textarea>
                                </div>
                                <!-- ---Details---- -->

                                <!-- ---Specifications---- -->
                                <div class="form-group">
                                    <label for="specification">Specifications</label>
                                    <textarea type="text" class="form-control" name="product_specification" id="product_specification" value="<?php echo $product_specification ?? ''; ?>">
                                </textarea>
                                </div>
                                <!-- x---Specifications----x -->

                                <!-- ---Submit Button---- -->
                                <input type="submit" value="Add Product" class="btn btn-primary" name="add_product_btn" id="pro-submit" />


                                <!-- ---Submit Button---- -->
                            </form>
                            <!-- -----x-------------form----------------x------------ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal add product -->



            <!-- Modal edit Product -->
            <div class="modal fade font-rubik" id="edit_product_data_Modal" tabindex="-1" role="dialog" aria-labelledby="edit_prodct_data_Modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title_category">Edit Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- ------------------form---------------------------- -->
                            <form method="POST" enctype="multipart/form-data" id="edit_product">
                                <div class="form-row">
                                    <input type="hidden" name="edit_pro_id" id="edit_pro_id">
                                    <!-- ---product Name--- -->
                                    <div class="form-group col-md-3">
                                        <label for="productName">Product Name</label>
                                        <input type="text" class="form-control" name="edit_pro-name" id="edit_pro-name" value="<?php echo $productName  ?? ''; ?>" />
                                    </div>
                                    <!-- -x--product Name--x- -->

                                    <!-- ---Brand--- -->
                                    <div class="form-group col-md-3">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" name="edit_pro-brand" id="edit_pro-brand" value="<?php echo $brand  ?? ''; ?>" />
                                    </div>
                                    <!--x---Brand---x -->
                                    <!-- ---In stock--- -->

                                    <div class="form-group col-md-3">
                                        <label for="stock">In Stock</label>
                                        <input type="number" class="form-control" name="edit_pro-inStock" id="edit_pro-inStock" value="<?php echo $inStock  ?? ''; ?>" />
                                    </div>
                                    <!-- x---In stock---x -->
                                    <!-- ---Unit Price--- -->
                                    <div class="form-group col-md-3">
                                        <label for="unitPrice">Unit Price</label>
                                        <input type="number" class="form-control" name="edit_pro-unitPrice" id="edit_pro-unitPrice" value="<?php echo $unitPrice  ?? ''; ?>" />
                                    </div>
                                    <!--x---Unit Price---x -->
                                </div>
                                <div class="form-row my-2">
                                    <!-- ---file---- -->
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input mb-3" name="edit_pro-image" id="edit_pro-image" value="<?php echo $image  ?? ''; ?>" />
                                            <label class="custom-file-label" for="customFile">Upload Product Image</label>
                                            <span id="uploaded-image"></span>
                                        </div>
                                    </div>
                                    <!-- file -->
                                    <!-- category -->
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="edit_product_category" name="edit_product_category" placeholder="Category">
                                    </div>
                                </div>




                                <div class="form-row">
                                    <!-- ---Seller---- -->
                                    <div class="form-group col-md-6">
                                        <label for="seller">Seller</label>
                                        <input type="text" class="form-control" name="edit_pro-seller" id="edit_pro-seller" value="<?php echo $seller  ?? ''; ?>" />
                                    </div>
                                    <!-- x---Seller----x -->
                                    <!-- ---Seller Contact---- -->
                                    <div class="form-group col-md-6">
                                        <label for="seller_contact">Seller Contact</label>
                                        <input type="text" class="form-control" name="edit_pro-seller-contact" id="edit_pro-seller-contact" value="<?php echo $seller_contact ?? ''; ?>" />
                                    </div>
                                    <!-- -x--Seller Contact----x -->
                                </div>
                                <!-- ---Details---- -->
                                <div class="form-group">
                                    <label for="product_details">Details</label>
                                    <textarea type="text" class="form-control" id="edit_product_details" name="edit_product_details" value="<?php echo $product_details ?? ''; ?>">
                                    </textarea>
                                </div>
                                <!-- ---Details---- -->

                                <!-- ---Specifications---- -->
                                <div class="form-group">
                                    <label for="specification">Specifications</label>
                                    <textarea type="text" class="form-control" name="edit_product_specification" id="edit_product_specification" value="<?php echo $product_specification ?? ''; ?>">
                                </textarea>
                                </div>
                                <!-- x---Specifications----x -->

                                <!-- ---Submit Button---- -->
                                <input type="submit" value="Edit" class="btn btn-primary" name="edit_product_btn_submit" id="edit_product_btn_submit" />


                                <!-- ---Submit Button---- -->
                            </form>
                            <!-- -----x-------------form----------------x------------ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal product category -->


            <!-- card users -->
            <div class="col-sm-3">
                <div class="card bg-light mb-3 font-rale" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <?php
                        //get products data and diaplay count using cartcount method
                        $usersCount = $user->getUsersList();
                        ?>
                        <span>
                            <h2 class="card-text m-1"><?php echo $cart->cartCount($usersCount) ?? 0; ?> <i class="fas fa-arrow-up text-danger"></i></h2>
                        </span>
                        <span>
                            <h2><i class="fas fa-user m-1"></i></h2>
                        </span>
                    </div>
                </div>
            </div>
            <!---x- card users --x--->


            <!-- card products -->
            <div class="col-sm-3">
                <div class="card bg-light mb-3 font-rale" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <?php
                        //get products data and diaplay count using cartcount method
                        $productCount = $product->displayProducts();
                        ?>
                        <span>
                            <h2 class="card-text m-1"><?php echo $cart->cartCount($productCount) ?? 0; ?> <i class="fas fa-arrow-up text-danger"></i></h2>
                        </span>
                        <span>
                            <h2><i class="fas fa-money-bill-alt m-1"></i></h2>
                        </span>
                    </div>
                </div>
            </div>
            <!---x- card products --x--->


            <!-- card categories -->
            <div class="col-sm-3">
                <div class="card bg-light mb-3 font-rale" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <?php $categoryCount = $category->DisplayCategory(); ?>
                        <span>

                            <h2 class="card-text m-1"><?php echo $cart->cartCount($categoryCount) ?? 0; ?> <i class="fas fa-arrow-up text-danger"></i></h2>
                        </span>
                        <span>
                            <h2><i class="fas fa-chart-bar"></i></h2>
                        </span>
                    </div>
                </div>
            </div>
            <!---x- card categories --x--->

            <!-- card deliveries -->
            <div class="col-sm-3">
                <div class="card bg-light mb-3 font-rale" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Deliveries</h5>
                        <span>
                            <h2 class="card-text m-1">1000 + <i class="fas fa-arrow-up text-danger"></i></h2>
                        </span>
                        <span>
                            <h2><i class="fas fa-shopping-cart"></i></h2>
                        </span>
                    </div>
                </div>
            </div>
            <!---x- card deliveries --x--->

            <!-- charts -->
            <!-- users -->
            <div class="col-sm-6 my-3 font-rale">
                <h5 class="font-rale m-2"><strong>Users</strong></h5>
                <div class="table-responsive">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Date Added</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $Sn = 0;
                        $userList = $user->getUsersList();
                        foreach ($userList as $row) :
                            $Sn += 1;

                        ?>
                            <tbody>
                                <tr id="userRowHide" data-id="<?php echo $row['id']; ?>">
                                    <th scope="row"><?php echo $Sn; ?></th>
                                    <td><?php echo $row['username'] ?? 'Username'; ?></td>
                                    <td><?php echo $row['created_at'] ?? 'Date joined'; ?></td>
                                    <td> <span><button data-id="<?php echo $row['id']; ?>" class="btn btn-danger p-1 delete_button">Delete User</button></span></td>
                                </tr>

                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <!-- categories -->
            <div class="col-sm-6 my-3 font-rale">
                <h5 class="font-rale m-2"><strong>Categories</strong></h5>
                <div class="table-responsive">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $categoryList = $category->DisplayCategory();
                        $Sn = 0;
                        foreach ($categoryList as $row) :
                            $Sn += 1;
                        ?>
                            <tbody>
                                <tr id="categoryRowHide" data-id="<?php echo $row['id']; ?>">
                                    <th scope="row"><?php echo $Sn; ?></th>
                                    <td><?php echo $row['title'] ?? 'Title'; ?></td>
                                    <td><span><button class="btn btn-success p-1 edit_category_btn" type="button" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#edit_data_Modal">Edit Category</button></span></td>
                                    <td> <span><button class="btn btn-danger p-1 delete_category" data-id="<?php echo $row['id']; ?>">Delete Category</button></span></td>
                                </tr>

                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <!--------- products----- -->
            <div class=" col-sm-12">
                <h5 class="font-rale m-2"><strong>Products</strong></h5>
                <div class="table-responsive font-rale">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">In Stock</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $Sn = 0;
                        $productList = $product->displayProductsLimit($table = 'products', 15);
                        foreach ($productList as $row) :
                            $Sn += 1;
                        ?>
                            <tbody>
                                <tr id="productRowHide" data-id="<?php echo $row['id']; ?>">
                                    <th scope="row"><?php echo $Sn; ?></th>
                                    <td><img src="./uploads/<?php echo $row['product_image'] ?? 'Image'; ?>" alt="Image" style="width:80px; height:80px"></td>
                                    <td><?php echo $row['product_name'] ?? 'Name'; ?></td>
                                    <td><?php echo $row['brand'] ?? 'Brand'; ?></td>
                                    <td><?php echo $row['in_stock'] ?? 0; ?></td>
                                    <td>$ &nbsp;<?php echo $row['unit_price'] ?? 0; ?></td>
                                    <td><?php echo $row['seller'] ?? 'Seller'; ?></td>
                                    <td><?php echo $row['category'] ?? 'category'; ?></td>
                                    <td><span><button class="btn btn-success p-1 edit_product_btn" type="button" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#edit_product_data_Modal">Edit Product</button></span></td>
                                    <td> <span><button class="btn btn-danger p-1 delete_product" data-id="<?php echo $row['id']; ?>">Delete Product</button></span></td>
                                </tr>

                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
</section>
<!-- user dashboard php file -->

<!-- footer file -->
<?php
include('./Footer.php');
?>

<script>
    $(document).ready(function() {

        //add category
        $('#insert_category').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            if ($('#category_title').val() === '') {
                alert('Title is required');
            } else if ($('#category_image').val() === '') {
                alert('Image is required');
            } else if ($('#category_info').val() === '') {
                alert('Information is required');
            } else {
                $.ajax({
                    url: "insertCategory.php",
                    type: "POST",
                    // data: $('#insert_category').serialize(), 
                    data: formData,
                    enctype: 'multipart/form-data',
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(data) {
                        $('#data').html(data);
                        $('#insert_category')[0].reset();
                        $("#add_data_Modal").modal('hide');
                        console.log("inserted succesfully");

                    }
                })
            }
        })

        //edit fetch data category
        $('.edit_category_btn').on('click', function() {
            var id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "fetchCategory.php",
                method: "POST",
                data: {
                    category_id: id
                },
                dataType: "json",
                success: function(data) {
                    let newdata = '';
                    data.map((data) => {
                        newdata = data;
                        return newdata;

                    });

                    $('#edit_category_title').val(newdata.title);
                    // $('#category_image').val(newdata.category_image)
                    $('#edit_category_info').val(newdata.category_info);
                    $('#edit_category_id').val(newdata.id);
                    $('#edit_data_Modal').modal('show');


                }
            })

        });

        //edit category submit
        $('#edit_category').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            console.log('Iv been submitted')

            $.ajax({
                url: "editCategory.php",
                type: "POST",
                // data: $('#insert_category').serialize(), 
                data: formData,
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) {
                    $('#data').html(data);
                    $('#edit_category')[0].reset();
                    $("#edit_data_Modal").modal('hide');
                    console.log("Editted succesfully");


                }
            })

        })


        //delete category

        $(".delete_category").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "ajaxDeleteUser.php",
                data: {
                    category_id: id,
                },
                success: function() {
                    // alert('Category deleted');
                },
            });

            $(`#categoryRowHide[data-id='${$(this).data("id")}']`).hide();
        });



        //insert_product

        $('#insert_product').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            if ($('#pro-name').val() === '') {
                alert('Product Name is required');
            } else if ($('#pro-brand').val() === '') {
                alert('Brand is required');
            } else if ($('#pro-instock').val() === '') {
                alert('Instock is required');
            } else if ($('#pro-unitPrice').val() === '') {
                alert('Unit Price is required');
            } else if ($('#pro-image').val() === '') {
                alert('Product Image is required');
            } else if ($('#pro-seller').val() === '') {
                alert('Seller is required');
            } else if ($('#pro-seller-contact').val() === '') {
                alert('seller Contact is required');
            } else if ($('#product_details').val() === '') {
                alert('Details are required');
            } else if ($('#product_specification').val() === '') {
                alert('Product Specifications are required');
            } else {
                $.ajax({
                    url: "insertProduct.php",
                    type: "POST",
                    // data: $('#insert_category').serialize(), 
                    data: formData,
                    enctype: 'multipart/form-data',
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(data) {
                        $('#data').html(data);
                        $('#insert_product')[0].reset();
                        $("#add_product_data_Modal").modal('hide');
                        console.log("inserted succesfully");

                    }
                })
            }
        })


        //edit fetch data products
        $('.edit_product_btn').on('click', function() {
            var id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "fetchProduct.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let newdata = '';
                    data.map((data) => {
                        newdata = data;
                        return newdata;
                    });
                    console.log(newdata);

                    $('#edit_pro_id').val(newdata.id);
                    $('#edit_pro-name').val(newdata.product_name);
                    $('#edit_product_category').val(newdata.category);
                    $('#edit_pro-brand').val(newdata.brand);
                    $('#edit_pro-inStock').val(newdata.in_stock);
                    $('#edit_pro-unitPrice').val(newdata.unit_price);
                    $('#edit_pro-seller').val(newdata.seller);
                    $('#edit_pro-seller-contact').val(newdata.seller_contact);
                    $('#edit_product_details').val(newdata.product_details);
                    $('#edit_product_specification').val(newdata.product_specification);
                    $('#edit_product_data_Modal').modal('show');

                }
            })

        });


        //edit product submit
        $('#edit_product').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            console.log('Iv been submitted')

            $.ajax({
                url: "editProduct.php",
                type: "POST",
                data: formData,
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) {
                    $('#data').html(data);
                    $('#edit_product')[0].reset();
                    $("#edit_product_data_Modal").modal('hide');
                    console.log("Editted succesfully");


                }
            })

        })


        //delete product
        $(".delete_product").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "ajaxDeleteUser.php",
                data: {
                    product_id: id,
                },
                success: function() {
                    // alert('Category deleted');
                },
            });

            $(`#productRowHide[data-id='${$(this).data("id")}']`).hide();
        });

        //delete user
        $(".delete_button").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "ajaxDeleteUser.php",
                data: {
                    user_id: id,
                },
                success: function() {
                    //alert('User deleted');
                },
            });

            $(`#userRowHide[data-id='${$(this).data("id")}']`).hide();
        });

    })
</script>