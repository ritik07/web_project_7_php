<?php
require ("../common/connection.inc.php");
require('common/admin_top.inc.php');

//sql query for showing the users details
$sql = "SELECT * FROM users order by id asc";
$res = mysqli_query($con, $sql);


//Code for setting enable and disable of a category
if(isset($_GET['type'])){
   // $test = "working";
   $type = get_Safe_value($con, $_GET['type']);
   if($type=='status'){
       $operataion = get_Safe_value($con, $_GET['operation']);
       $id = get_Safe_value($con, $_GET['id']);
       if($operataion == 'active'){
           $status = "1";
       }else{
           $status = "0";
           unset($_SESSION['email']);
           unset($_SESSION['id']);
           $_SESSION['STATUS'] = 'loggedout';
       }
       //mysql query for updating the status
       $update_status  = "update users set status='$status' where id='$id'";
       mysqli_query($con, $update_status);

   }
      header("location:index.php");
}


?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Information</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>

                                    <tr>
                                       <th class="serial">#</th>
                                       <!-- <th>
                                       ID
                                       </th> -->
                                       <th>Email id</th>
                                       <th>Phone number</th>
                                       <!-- <th>Status</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i =0;
                                 while ($row = mysqli_fetch_assoc($res)){
                                 $i++;
                                 ?>
                                    <tr>
                                        <td class="serial">
                                            <?php
                                            echo $i;
                                            ?>
                                        </td>
                                        <!-- <td>
                                            <?php
                                            echo $row['id']
                                            ?>
                                        </td> -->
                                        <td>
                                            <?php
                                            echo $row['email']
                                            ?>
                                        </td>
                                        <td>
                                                <?php
                                                echo $row['number']
                                                ?>
                                       </td>
<!-- 
                                       <td>
                                                <?php
                                                if($row['status'] == 1){
                                                    echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>
                                                        Active
                                                    </a>&nbsp";
                                                }else {
                                                    echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>
                                                        Deactive
                                                    </a>&nbsp";
                                                }
                                                ?>

                                            </td> -->

                                    </tr>

                                 </tbody>
                                  <?php
                                  }
                                  ?>
                              </table>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('common/admin_footer.inc.php');
?>
