<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Products</h1>
    </div>
    <div class="content-header-right">
        <a href="product-add.php" class="btn btn-primary btn-sm">Add Product</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                            <tr>
                                <th width="10">#</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Active?</th>
                                <th>Category</th>
                                <th>Company Name</th>
                                <th width="80">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT product_id, product_name, price, quantity, active, category, company_name, product_image FROM products ORDER BY product_id DESC");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td style="width:82px;"><img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" style="width:80px;"></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td>$<?php echo $row['price']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td>
                                        <?php if($row['active'] == 'yes') {echo '<span class="badge badge-success" style="background-color:green;">Yes</span>';} else {echo '<span class="badge badge-danger" style="background-color:red;">No</span>';} ?>
                                    </td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td>                                        
                                        <a href="product-edit.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs" data-href="product-delete.php?id=<?php echo $row['product_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
                <p style="color:red;">Be careful! This product will be deleted from related tables also.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
