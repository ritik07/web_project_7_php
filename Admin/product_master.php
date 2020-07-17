<?php
require ("../common/connection.inc.php");
require ('common/admin_top.inc.php');

include('configure_product.php');
$karaya_product = new Products();

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
       $update_status  = "update product set status='$status' where id='$id'";
       mysqli_query($con, $update_status);

   }

   //code for deleting a category
   if($type=='delete'){
       $id = get_Safe_value($con, $_GET['id']);

       //mysql query for deleting a category
       $delete_category  = "delete from product where id='$id'";
       mysqli_query($con, $delete_category);

   }


}

?>
    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="box-title align-self-center">
                                        <strong>
                   
                           Product
                      
                           </strong>
                                    </h3>
                                </div>
                                <div class="col">
                                    
                                    <a style="float:right" class="btn btn-outline-primary" href="manage_product.php">
                                        <i class="fa fa-plus" style="margin-right:5px" aria-hidden="true"></i> Add Product
                                    </a>
                                </div>
                            </div>
                        </div>



                        <!-- The Modal -->
                        <div style="margin-top: 10%;width: 50%;margin-left: 30%;" id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content d-flex align-items-center">
                                <h4 style="color: rgb(219, 17, 17);margin-top: 20px;"> <i class="fa fa-warning" aria-hidden="true"></i> confirm you want to delete this data?</h4>
                                <?php
                                $i = 1;
                                $row = $karaya_product->getData();
                                
                                foreach($row as $name){
                                    ?>
                                    <?php
                                echo "
                                <div class='flex' style='margin-bottom:20px'>
                                <a class='btn' style='background-color: rgb(224, 78, 41);color: #fff;margin-top: 20px;' href='?type=delete&id=".$name['id']."'>
                                    CONFIRM
                                </a>  <a class='btn closed' style='background-color: rgb(224, 139, 41);color: #fff;margin-top: 20px;' href='#'>
                                    CANCLE
                                </a>
                            </div>";
                                
                                ?>
                                        <?php
                            }
                            ?>

                            </div>

                        </div>

                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <!-- <th>ID</th> -->
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>Price</th>
                                            <th>Height</th>
                                            <th>Width</th>
                                            <th>Depth</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $i = 1;
                                    $row = $karaya_product->getData();
                                    foreach($row as $name){
                                        ?>
                                            <tr>

                                                <td class="serial">
                                                    <?php echo $i ;?>
                                                </td>

                                                <!-- <td>
                                                <?php echo $name['id']?>
                                            </td> -->

                                                <td>
                                                    <?php echo $name['name']?>
                                                </td>
                                                <td>
                                                    <?php echo $name['des']?>
                                                </td>
                                                <td>
                                                    <?php echo $name['price']?>
                                                </td>

                                                <td>
                                                    <?php echo $name['heightname']?>
                                                </td>

                                                <td>
                                                    <?php echo $name['sizename']?>
                                                </td>

                                                <td>
                                                    <?php echo $name['depthname']?>
                                                </td>


                                                <td>
                                                    <?php
                                                if($name['status'] == 1){
                                                    echo "<a class='btn btn-success' href='?type=status&operation=deactive&id=".$name['id']."'>
                                                         Active
                                                    </a>&nbsp";
                                                }else {
                                                    echo "<a class='btn' style='background-color: rgb(252, 181, 49);color: #fff;' href='?type=status&operation=active&id=" . $name['id'] . "'>
                                                        Deactive
                                                    </a>&nbsp";
                                                }
                                                //link to delete a category
                                                echo "<button id='myBtn' class='btn' style='background-color: rgb(224, 78, 41);color: #fff;' href='?type=delete&id=".$name['id']."'>
                                                        Delete
                                                </button>&nbsp";
                                                //link to edit a category
                                                echo "<a class='btn btn-info' style='color: #fff;' href='manage_product.php?id=".$name['id']."'>
                                                        Edit
                                                    </a>&nbsp";
                                                ?>
                                                </td>

                                            </tr>
                                            <?php 
                                 ++$i;
                                 } ?>
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