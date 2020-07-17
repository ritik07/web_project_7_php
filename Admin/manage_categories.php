<?php
require ("../common/connection.inc.php");
require('common/admin_top.inc.php');
$categories="";
$image="";
$msg= '';
$test = '';


if(isset($_GET['id'])){
    //storing the value of id in to a variable
    $id = get_Safe_value($con, $_GET['id']);
    //mysql query for showing the data as per the id
    $res = mysqli_query($con, "SELECT * FROM categories WHERE id='$id'");
    $count = mysqli_num_rows($res);

    if($count>0){
        $row = mysqli_fetch_assoc($res);
        $categories = $row['category_name'];
        $image = $row['category_image'];
    }else{
        header('location: categories.php');
        die();
    }
}
//post req for new category added
if (isset($_POST['submit'])){
    
if(isset($_POST['image']))
{
	$image=$_POST['image'];
		
	if($_FILES['file1']['name']!="")
	{
		include("image_single.php");
		
		$file = $_SERVER['DOCUMENT_ROOT'] . "/php/web_project_7/admin/images/" . $_POST['image'];		
		if (!unlink($file))
		{
			echo ("Error deleting $file");
		}
	}
	
}

else
{
	if($_FILES['file1']['name']=="")
	{
		header("Location: manage_categories.php");
		exit();
	}
	else
	{
        include("image_single.php");
	}
}


    //storing the value of categories in to a variable
    $categories = get_Safe_value($con, $_POST['categories']);

    // the path to store the uploaded image
    //$path = "images/".basename($_FILES['image']['name']);

    //get the image into a variable


    //check if category already exist
    

        if(isset($_GET['id'])&& $_GET['id']!=''){
            mysqli_query($con, "UPDATE categories set category_name='$categories' WHERE id='$id'");
            mysqli_query($con, "UPDATE categories set category_image='$image' WHERE id='$id'");
        }else{
            // inserting the saved value into the database //query
            mysqli_query($con, "INSERT INTO categories(category_name, category_image, status) values('$categories','$image','1')");

            if (move_uploaded_file($_FILES['image']['tmp_name'],$path)){
                $msg = "Image uploaded successfully";
            }else{
                $msg = "An error occurred while uploading the image";
            }
        }
        header('location: category_master.php');
        die();

    
}


?>

    <div class="content pb-0">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><strong>Categories</strong><small>Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Category name</label>

                                    <input type="text" required name="categories" id="company" value="<?php echo $categories ?>" placeholder="Enter your categories name" class="form-control">
                                    <label for="categories" class=" form-control-label">Upload Image</label>
                                    <input type="file" name="file1"  class="form-control-label" style="margin-top: 20px" >
                                    <?php
                                        if(isset($_GET['id'])){
                                    ?>
                                    <input type="hidden" name="image" value="<?php echo $image ?>" >
                                    <?php
                                        }
                                        ?>
                                </div>

                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                                <div style="margin: 5px">
                                    <?php echo $msg?>
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