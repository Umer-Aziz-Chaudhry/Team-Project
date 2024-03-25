<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
    $valid = 1;

    if(empty($_POST['category'])) {
        $valid = 0;
        $error_message .= "Category cannot be empty<br>";
    }

    if(empty($_POST['product_name'])) {
        $valid = 0;
        $error_message .= "Product name cannot be empty<br>";
    }

    if(empty($_POST['price'])) {
        $valid = 0;
        $error_message .= "Price cannot be empty<br>";
    }

    if(empty($_POST['quantity'])) {
        $valid = 0;
        $error_message .= "Quantity cannot be empty<br>";
    }

    $path = $_FILES['product_image']['name'];
    $path_tmp = $_FILES['product_image']['tmp_name'];

    if($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif, or png file<br>';
        }
    }

    if($valid == 1) {

        // Check if the form was submitted without changing the featured image
        if($path == '') {
            // Update without changing the featured image
            $statement = $pdo->prepare("UPDATE products SET 
                                        product_name=?, 
                                        price=?, 
                                        quantity=?, 
                                        description_=?, 
                                        category=?, 
                                        active=?
                                        WHERE product_id=?");
            $statement->execute(array(
                                        $_POST['product_name'],
                                        $_POST['price'],
                                        $_POST['quantity'],
                                        $_POST['description'],
                                        $_POST['category'],
                                        $_POST['active'],
                                        $_REQUEST['id']
                                    ));
        } else {
            // Update and change the featured image
            // Assuming we delete the old image from the server
            unlink('../assets/uploads/'.$_POST['current_product_image']);

            $final_name = 'product-featured-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file($path_tmp, '../assets/uploads/'.$final_name);

            $statement = $pdo->prepare("UPDATE products SET 
                                        product_name=?, 
                                        price=?, 
                                        quantity=?, 
                                        product_image=?, 
                                        description_=?, 
                                        category=?, 
                                        active=?
                                        WHERE product_id=?");
            $statement->execute(array(
                                        $_POST['product_name'],
                                        $_POST['price'],
                                        $_POST['quantity'],
                                        $final_name,
                                        $_POST['description'],
                                        $_POST['category'],
                                        $_POST['active'],
                                        $_REQUEST['id']
                                    ));
        }

        $success_message = 'Product is updated successfully.';
    }
}

if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM products WHERE product_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    if($total == 0) {
        header('location: logout.php');
        exit;
    } else {
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $product_name = $row['product_name'];
            $price = $row['price'];
            $product_image = $row['product_image'];
            $description = $row['description_'];
            $quantity = $row['quantity'];
            $category = $row['category'];
            $active = $row['active'];
        }
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Product</h1>
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
                            <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Price <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="quantity" class="form-control" value="<?php echo $quantity; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Category <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="category" class="form-control" value="<?php echo $category; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" rows="5"><?php echo $description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Active <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="active" class="form-control" required>
                                    <option value="yes" <?php echo ($active == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo ($active == 'no') ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Existing Product Image</label>
                            <div class="col-sm-4">
                                <img src="../assets/uploads/<?php echo $product_image; ?>" style="width:100px;"><br>
                                <input type="hidden" name="current_product_image" value="<?php echo $product_image; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Change Product Image</label>
                            <div class="col-sm-4">
                                <input type="file" name="product_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success" name="form1">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
