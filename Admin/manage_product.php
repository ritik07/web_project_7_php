<?php
require ("../common/connection.inc.php");
require('common/admin_top.inc.php');
include('configure_product.php');

$name=$des=$images=$price=$sizename=$depthname=$heightname=$catid='';
$id=0;
if($_SERVER['REQUEST_METHOD']=="POST")
{		
$id=$_POST['id'];
//Creating Object of Userrole Class
if(isset($_POST['images'])){
    $image = $_POST['images'];
}
include('image_generals.php');
$karya_object = new Products();
//Adding Data into Object
$karya_object->name = $_POST['name'];
$karya_object->catid= $_POST['catid'];
$karya_object->des=$_POST['des'];
// $karya_object->sizedes=$_POST['sizedes'];
$karya_object->heightname=$_POST['heightname'];
$karya_object->sizename=$_POST['sizename'];
$karya_object->depthname=$_POST['depthname'];
$karya_object->price=$_POST['price'];
$karya_object->images=$images;

if($id==0)
{	
	//Calling add Function to add data into database
	$karya_object->addRecord();			
	$_SESSION['msg'] = "1 Product record added";			
}
else
{
	$karya_object->UpdateRecord();		
	$_SESSION['msg'] = "1 Product record Updated";			
}


//calling connection close function
$karya_object->closeconnection();	

header("Location: product_master.php");
exit();
	
}
else
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$karya_object = new Products();
		
		//Adding Data into Object		
		$karya_object->id=$id;
		
		$row = $karya_object->getrecordbyid();
		
		$count=count($row);

		if($count<1)
		{
			echo "Error in fetching record";
			exit();
		}
				
		$name = $row[0]['name'];
		$price = $row[0]['price'];
		$catid=$row[0]['catid'];
		$des=$row[0]['des'];
		$sizename=$row[0]['sizename'];
		//$sizedes=$row[0]['sizedes'];
		$depthname=$row[0]['depthname'];
		$heightname=$row[0]['heightname'];
		$images=$row[0]['images'];

	}
}

?>

    <div class="content pb-0">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-header">
                            <strong> 
                        <i>
                        <span>
                        <a href="product_master.php">Products</a>
                        </span>/<span> Manage Products <i class="fa fa-pencil" aria-hidden="true"></i> </span>
                        </i>
                        </strong>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">ID</label>
                                    <input type="text" required name="id" id="company" value="<?php echo $id ?>" placeholder="Enter your product name" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Product name</label>
                                    <input type="text" required name="name" id="company" value="<?php echo $name ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Category name</label>
                                    <select type="text" required name="catid" id="company" class="form-control">
                                        <option value="-1" >Enter your categories name</option>
                                        <?php
    
                                                $query = "select * from categories where status='1' ";
                                                $row = query_list($query, $con);
                                                if($row == FALSE){
                                                    $count = 0;
                                                }
                                                else{
                                                    $count = count($row);
                                                }
                                                for($j=0;$j<$count;$j++){
                                            if($row[$j]['id'] == $catid){
                                            ?>
                                            <option selected value="<?php echo $row[$j]['id']?>"><?php echo $row[$j]['category_name']?></option>
                                            <?php
                                            }else{
                                                ?>
                                                <option value="<?php echo $row[$j]['id']?>"><?php echo $row[$j]['category_name']?></option>
                                                <?php                                      
                                                                                          }                                          }
                                     ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Product price</label>
                                    <input type="text" name="price" id="company" value="<?php echo $price ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Product Description</label>
                                    <input type="text" required name="des" id="company" value="<?php echo $des ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Width</label>
                                    <input type="text" required name="sizename" id="company" value="<?php echo $sizename ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Depth</label>
                                    <input type="text" required name="depthname" id="company" value="<?php echo $depthname ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Height</label>
                                    <input type="text" required name="heightname" id="company" value="<?php echo $heightname ?>" placeholder="Enter your product name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product" class=" form-control-label">Upload Image</label>
                                    <input type="file" name="files[]" class="form-control-label" multiple style="margin-top: 20px">
                                    <?php
                                            if(isset($_GET['id'])){
                                        ?>
                                        <input type="hidden" name="images" value="<?php echo $image ?>">
                                        <?php
                                            }
                                            ?>
                                </div>

                                <!-- <label for="product" class=" form-control-label">SIze des</label>
                                    <input type="text" required name="sizedes" id="company" value="" 
                                    placeholder="Enter your product name" class="form-control"> -->

                            </div>

                            <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                            <div style="margin: 5px">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
require('common/admin_footer.inc.php');
?>