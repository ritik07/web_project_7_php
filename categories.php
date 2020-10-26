<?php
require('common/top.inc.php');
$query = "select * from categories where status='1' ";
$row = query_list($query, $con);
if($row == FALSE){
    $count = 0;
}
else{
    $count = count($row);
}
?>
    <!-- END nav -->


    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg');margin-top: 15px;">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Categories</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light" style="margin-top: 20px;">

        <div class="container">
            <div class="row">
                <div class="col order-md-last">
                    <div class="row">
                    
                    <?php
    for($i=0;$i<$count;$i++){
        $img = "/php/web_project_7/admin/images/".$row[$i]['category_image'];
                    ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="products.php?id=<?php echo $row[$i]['id']?>" class="img-prod"><img class="img-fluid" src="<?php echo $img; ?>" style="object-fit: cover;width: 100%;height: 400px;">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3>
                                        <?php  echo $row[$i]['category_name']; ?>
                                    </h3>
                                    <div class="d-flex">
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="products.php?id=<?php echo $row[$i]['id']?>" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                        <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                                    </p>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="products.php?id=<?php echo $row[$i]['id']?>" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                        <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                                    </p>
                                </div>
                            </div>
                        </div>
<?php
    }
?>


                    </div>
                </div>
            </div>
        </div>
    </section>

   <?php
require('common/footer.inc.php');

?>
