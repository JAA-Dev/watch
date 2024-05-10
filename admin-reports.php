<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");
    include "database.php";
?>
    <div class="rigth-container">
        <div class="header-text">
            <h2>Reports</h2>
        </div>
    </div>
    <div class="headding">
            <table>
                <tr>
                    <td>
                        <form action="admin-reports-filter.php" method="POST" enctype="multipart/form-data">
                            <select name="txtfilter" id="">
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                            <input class="btnsearch" type="submit" value="Filter">
                        </form>
                    </td>
                    <td>
                    <div>
                        <form action="admin-report-printall.php" method="POST" enctype="multipart/form-data">
                            <input class="btnsearch" type="submit" value="Print">
                        </form>
                </div>
                    </td>
                </tr>
            </table>

            <div class="container-user">
                <table class="table">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <!-- <th>Reciept Name</th> -->
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "Select * from transaction";
                                $result = mysqli_query($con, $sql);
                                $subtotal = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['invoice_id'];
                                        // $f = $row['prod_file'];
                                        $first = $row['total_price'];
                                        $second = $row['date_create'];
                                        $subtotal += $row['total_price'];
                                        echo '<tr>
                                        <td>'.$id.'</td>
                
                                        <td>'.$second.'</td>
                                        <td>'.$first.'</td>
                                        <td>
                                        <button id="btned"><a href="admin-reports-view.php?view='.$id.'"><i class="fa fa-pencil-square"></i> View</a></button>
                                        <button id="btned"><a href="admin-report.print.php?view='.$id.'"><i class="fa fa-pencil-square"></i> Print</a></button>
                                        </td>
                                        </tr>
                                        ';
                                    }
                                }
                            ?>

                        </tbody>
                        
                        
                    </table>
                    
            </div>
            <div class="total-text">
            <h3>Total Income: <?php echo $subtotal ?></h3>
            </div>
            </div>



<?php
    include("admin-design/admin-footer.php");
?>