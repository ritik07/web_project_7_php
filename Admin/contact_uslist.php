<?php
require ("../common/connection.inc.php");
require('common/admin_top.inc.php');
include('configue_contact.php');

//sql query for showing the users details
$karaya_contact = new Contact();


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
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Subject</th>
                                       <th>Message</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 $row = $karaya_contact->getData();
                                 if($row == FALSE){
                                    $count = 0;
                                 }
                                 else{
                                     $count = count($row);
                                 }
                                 for($j=0; $j<$count ; ++$j){
                                 ?>
                                    <tr>
                                        <td class="serial">
                                            <?php
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row[$j]['name'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row[$j]['email'];
                                            ?>
                                        </td>
                                        <td>
                                                <?php
                                                echo $row[$j]['subject']
                                                ?>
                                       </td>
                                        <td>
                                                <?php
                                                echo $row[$j]['message']
                                                ?>
                                       </td>
                                    </tr>

                                 </tbody>
                                  <?php
                                  ++$i;
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
