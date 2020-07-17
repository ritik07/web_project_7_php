<?php
require('common/top.inc.php');
include ('Admin/configure_product.php');
$karaya_product =  new Products();
$id = $_GET['id'];
$row =  $karaya_product->getProducts1($id);
if ($row == FALSE){
    header('location: index.php');
}
$name = $row[0]['name'];
$images = $row[0]['images'];
$des = $row[0]['des'];
$sizename = $row[0]['sizename'];
// $sizedes = $row[0]['sizedes'];
$depthname = $row[0]['depthname'];
$depthname = $row[0]['depthname'];
$price = $row[0]['price'];
$heightname  = $row[0]['heightname'];

?>
<style>
    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
    }
    
    div.scrollmenu img {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }
</style>

    <!-- END nav -->

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                <?php     if($images!="")
									{
                                        $files_array = explode(',',substr($images,0,strlen($images)-1));
                                        $count = count($files_array);
										 $img =  "/php/web_project_7/admin/images/".$files_array[0];
                                            ?>
                    <a href="<?php echo $img ?>" class="image-popup"><img src="<?php echo $img ?>" style="width: 100%;height: 500px;" class="img-fluid" alt=""></a>
                    <div class="scrollmenu">
               <?php    
                                    }  
            for($i=1;$i<$count;$i++){
                 $img =  "/php/web_project_7/admin/images/".$files_array[$i];
                                    ?>      
                        <a href="<?php echo $img ?>" class="image-popup"><img src="<?php echo $img ?>" style="width: 200px;height: 200px;"></a>
                      <?php

                                        }
                    ?>
                    </div>
                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>
                        <?php echo $name; ?>
                    </h3>

                    <p class="price"><span>RS. <?php echo $price; ?></span></p>
                    <p>
                    <?php echo $des; ?>
                    </p>
                    

                    <p><a href="#" class="btn btn-black py-3 px-5 mr-2" style="border-radius: 0px;">
                        Enquiry 
                    </a></p>

                </div>
            </div>




            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Size</a>

                        <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Depth</a>

                     <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Height</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">

                    <div class="tab-content bg-light" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <h3 class="mb-4">
                                <?php echo $sizename; ?>
                                </h3>
                                <!-- <p><?php echo $sizedes; ?></p> -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4"><?php echo $depthname; ?></h3>
                                <!-- <p><?php echo $depthdes; ?></p> -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4"><?php echo $heightname; ?></h3>
                                <!-- <p><?php echo $heightdes; ?></p> -->
                            </div>
                        </div>
                    
   
                        <!-- <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    <h3 class="mb-4">23 Reviews</h3>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                     </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                     </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                         <i class="ion-ios-star-outline"></i>
                                                     </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="rating-wrap">
                                        <h3 class="mb-4">Give a Review</h3>
                                        <p class="star">
                                            <span>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     (98%)
                                                 </span>
                                            <span>20 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     (85%)
                                                 </span>
                                            <span>10 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     (98%)
                                                 </span>
                                            <span>5 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     (98%)
                                                 </span>
                                            <span>0 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     <i class="ion-ios-star-outline"></i>
                                                     (98%)
                                                 </span>
                                            <span>0 Reviews</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

require('common/footer.inc.php');

?>