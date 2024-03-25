<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
    $valid = 1;

    if(empty($_POST['category'])) {
        $valid = 0;
        $error_message .= "Category can not be empty<br>";
    }

    if(empty($_POST['product_name'])) {
        $valid = 0;
        $error_message .= "Product name can not be empty<br>";
    }

    if(empty($_POST['price'])) {
        $valid = 0;
        $error_message .= "Price can not be empty<br>";
    }

    if(empty($_POST['quantity'])) {
        $valid = 0;
        $error_message .= "Quantity can not be empty<br>";
    }

    $path = $_FILES['product_image']['name'];
    $path_tmp = $_FILES['product_image']['tmp_name'];

    if($path!='') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif, or png file<br>';
        }
    } else {
        $valid = 0;
        $error_message .= 'You must have to select a product image<br>';
    }

    if($valid == 1) {

        $final_name = 'product-' . time() . '.' . $ext;
        move_uploaded_file($path_tmp, '../uploads/'.$final_name);

        // Inserting data into the main table products
        $sql = "INSERT INTO products (product_name, price, product_image, category, company_name, description_, quantity, active) VALUES (?,?,?,?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([
            $_POST['product_name'],
            $_POST['price'],
            $final_name,
            $_POST['category'],
            $_POST['company_name'],
            $_POST['description_'],
            $_POST['quantity'],
            $_POST['active']
        ]);

        $success_message = 'Product is added successfully.';
    }
}
?>

<!-- HTML form for adding a product -->
<section class="content-header">
    <div class="content-header-left">
        <h1>Add Product</h1>
    </div>
    <div class="content-header-right">
        <a href="product.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(!empty($error_message)): ?>
            <div class="callout callout-danger">
                <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>
            <?php if(!empty($success_message)): ?>
            <div class="callout callout-success">
                <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="box box-info">
        <div class="box-body">
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Category <span>*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="category" class="form-control" placeholder="Category">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Price <span>*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Company Name</label>
                <div class="col-sm-4">
                    <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-4">
                    <textarea name="description_" class="form-control" rows="4" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Active <span>*</span></label>
                <div class="col-sm-4">
                    <select name="active" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Product Image <span>*</span></label>
                <div class="col-sm-4" style="padding-top:4px;">
                    <input type="file" name="product_image">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
                </div>
            </div>
        </div>
    </div>
</form>

        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
