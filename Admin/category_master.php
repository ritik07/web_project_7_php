<?php
require ("../common/connection.inc.php");
require('common/admin_top.inc.php');

$test = '';

//Code for setting enable and disable of a category
if(isset($_GET['type']) && $_GET['type']!=''){
    // $test = "working";
    $type = get_Safe_value($con, $_GET['type']);
    if($type=='status'){
        $operataion = get_Safe_value($con, $_GET['operation']);
        $id = get_Safe_value($con, $_GET['id']);

        if($operataion == 'active'){
            $status = "1";
        }else{
            $status = "0";
        }
        //mysql query for updating the status
        $update_status  = "update categories set status='$status' where id='$id'";
        mysqli_query($con, $update_status);

    }

    //code for deleting a category
    if($type=='delete'){
        $id = get_Safe_value($con, $_GET['id']);

        //mysql query for deleting a category
        $delete_category  = "delete from categories where id='$id'";
        mysqli_query($con, $delete_category);

    }


}

//sql query for categories
$sql = "SELECT * FROM categories ORDER BY id asc";
//sql query into res
$res = mysqli_query($con, $sql);

?>
    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                               <!-- The Modal -->
                        <div style="margin-top: 10%;width: 50%;margin-left: 30%;" id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content d-flex align-items-center">
                                <h4 style="color: rgb(219, 17, 17);margin-top: 20px;"> <i class="fa fa-warning" aria-hidden="true"></i> confirm you want to delete this data?</h4>
                                <div class='flex' style='margin-bottom:20px'>
                                <a class='btn' style='background-color: rgb(224, 78, 41);color: #fff;margin-top: 20px;' href='?type=delete&id=".$name['id']."'>
                                    CONFIRM
                                </a>  <a class='btn closed' style='background-color: rgb(224, 139, 41);color: #fff;margin-top: 20px;' href='#'>
                                    CANCLE
                                </a>
                            </div>";
                                
                               
                         
                            </div>

                        </div>
                            <div class="row">
                                <div class="col">
                                <h3 class="box-title">
                                <strong>
                                Categories
                                </strong>
                            </h3>
                                </div>
                                <div class="col">
                                <a style="float:right" class="btn btn-outline-primary" href="manage_categories.php">
                                <i class="fa fa-plus" style="margin-right:5px" aria-hidden="true"></i>Add Categories
                            </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row=mysqli_fetch_assoc($res)){
                                        ?>
                                        <tr>

                                            <td class="serial">
                                                <?php echo $i ;?>
                                            </td>
<!-- 
                                            <td>
                                                <?php echo $row['id']?>
                                            </td> -->

                                            <td>
                                                <?php echo $row['category_name']?>
                                            </td>

                                            <td>
                                                <?php
                                                echo "<img src='images/".$row['category_image']."'>"
                                                ?>
                                            </td>


                                            <td>
                      
                                                <?php
                                                if($row['status'] == 1){
                                                    echo "<a class='btn btn-success' href='?type=status&operation=deactive&id=".$row['id']."'>
                                                        Active
                                                    </a>&nbsp";
                                                }else {
                                                    echo "<a class='btn' style='background-color: rgb(252, 181, 49);color: #fff;' href='?type=status&operation=active&id=" . $row['id'] . "'>
                                                        Deactive
                                                    </a>&nbsp";
                                                }
                                                //link to delete a category
                                                echo "<button id='myBtn' class='btn' style='background-color: rgb(224, 78, 41);color: #fff;' href='?type=delete&id=".$row['id']."'>
                                                Delete </button>&nbsp";
                                                // echo "<a href='?type=delete&id=".$row['id']."'>
                                                //         Delete
                                                //     </a>&nbsp";
                                                //link to edit a category
                                                echo "<a class='btn btn-info' style='color: #fff;' href='manage_categories.php?type=edit&id=".$row['id']."'>
                                                        Edit
                                                    </a>&nbsp";
                                                ?>
                                            </td>

                                        </tr>
                                        
                                    <?php ++$i;; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closed")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<?php
require('common/admin_footer.inc.php');
?>