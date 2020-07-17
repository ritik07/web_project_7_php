<?php
require('common/top.inc.php');
include('Admin/configure_product.php');
$karaya_product = new Products();
if(isset($_GET["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}
?>
    <!-- END nav -->


    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg');margin-top: 15px;">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Cart</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-cart" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                                    $proid = $values['item_id'];
                                    $row = $karaya_product->getProducts1($proid);
                                    $images=$row[0]['images'];
            
                                    $files_array = explode(',',substr($images,0,strlen($images)-1));

                                     $img =  "/php/web_project_7/admin/images/".$files_array[0];
                            ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(<?php echo $img; ?>);width: 250px;object-fit: cover;"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3>
                                           <?php echo $row[0]['name']; ?>
                                        </h3>
                                        <p>
                                            <?php echo $row[0]['des'];?>
                                            
                                        </p>
                                    </td>

                                    <td class="price">RS.                                             <?php echo $row[0]['price'];?>
</td>
                                </tr>
                                <?php
                        }
                                ?>
                                <!-- END TR-->
                                

                                <!-- END TR-->
                            </tbody>
                        </table>
                        <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4" style="border-radius: 0%;">Send Enquiry</a></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div> -->
        </div>

    </section>


<?php
require('common/footer.inc.php');

?>