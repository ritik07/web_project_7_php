<?php
require('common/top.inc.php');
if (isset($_GET['id'])){
    $id =  $_GET['id'];
}
else{
    header('location: index.php');
}

$querycat = 'select * from categories where status="1" and id="'.$id.'" ';
$query = 'select * from product where status="1" and catid="'.$id.'" ';
$row = query_list($query, $con);
if($row == FALSE){
    $count = 0;
}
else{
    $count = count($row);
}

$rowcat = query_list($querycat, $con);
if($rowcat == FALSE){
    header('loaction: index.php');
}
$catname = $rowcat[0]['category_name'];
?>


    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg');margin-top: 15px;">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">
                        <?php  echo $catname; ?>
                    </h1>
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
                    $j = 0;
                    for($j; $j<$count; ++$j){
                        $images=$row[$j]['images'];
            
                                        $files_array = explode(',',substr($images,0,strlen($images)-1));

										 $img =  "/php/web_project_7/admin/images/".$files_array[0];
                                            ?>

                            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                                <div class="product">
                                    <a href="product_single.html" class="img-prod">
                                    <img class="img-fluid" src="<?php echo $img;?>" style="object-fit: cover;width: 100%;height: 400px;">
                                    <div class="overlay"></div>
                                </a>
                                    <div class="text py-3 px-3">
                                        <h3>
                                            <a href="product_single.php?id=<?php echo $row[$j]['id'] ?>">
                                                <?php  echo $row[$j]['name'] ?>
                                            </a>
                                        </h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <?php
                                                if($row[$j]['price']==""){
                                                        echo "Price Not Available";
                                                } else{
                                                    ?>

                                                <p class="price"><span class="price-sale">RS.   <?php  echo $row[$j]['price'] ?></span></p>
                                            <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="cart.php?add_to_cart=add&id=<?php echo $row[$j]['id']?>" class="add-to-cart text-center py-2 mr-1"><span>ADD TO CART<i class="ion-ios-add ml-1"></i></span></a>

                                            <a href="product_single.php?id=<?php echo $row[$j]['id']; ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
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