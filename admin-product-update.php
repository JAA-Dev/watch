
<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");
    include "database.php";

    $id = $_GET['updateid'];
    $sql = "Select * from watch_info where watch_ID=$id";
    $result = mysqli_query($con,$sql);
    $row1 = mysqli_fetch_assoc($result);
    $img = $row1['watch_Image'];
    $name = $row1['watch_Name'];
    $cate = $row1['watch_Category'];
    $price = $row1['watch_Price'];
    $qty = $row1['watch_Qty'];

    // $password = $_POST['confirmtxt'];
    $sql1 = "Select * from admin_info";
    $confirmpass = mysqli_query($con, $sql1);
    $confirmpass_run = mysqli_fetch_assoc($confirmpass);
    $pass = $confirmpass_run['Admin_Password'];

    if (isset($_POST['updatebtn'])) {
        // if($_POST['confirmtxt'] == $pass){
            $names = $_POST['txtname'];
            $cates = $_POST['txtcate'];
            $prices = $_POST['txtprice'];
            $qtys = $_POST['txtqty'];
        
            // Check if a new file has been uploaded
            if ($_FILES['file']['error'] != 4) { // Error code 4 means no file was uploaded
                $img_loc = $_FILES['file']['tmp_name'];
                $img_name = $_FILES['file']['name'];
                $img_des = "uploads/".$img_name;
                move_uploaded_file($img_loc,'uploads/'.$img_name);
        
                // Update the image in the database
                $query = "UPDATE watch_info SET watch_Image='$img_des' WHERE watch_ID='$id'";
                mysqli_query($con, $query);
            }
            else if($_POST['txtcate'] > 0){
                $query1 = "UPDATE watch_info SET watch_Category='$cates' WHERE watch_ID='$id'";
                mysqli_query($con, $query1);
            }


        
            // Update other fields
            $query1 = "UPDATE watch_info SET watch_Name='$names', watch_Price='$prices', watch_Qty='$qtys' WHERE watch_ID='$id'";
            mysqli_query($con, $query1);
        
            echo "<script>
            alert('Updated Succesfully');
            location.href='admin-product.php';</script>";
        }
        // else{
        //     echo "<script>
        //     alert('Invalid Password');
        //     location.href='admin-books.php';</script>";
        // }
    // }
        
?>
    <div class="rigth-container">
        <div class="header-text">
            <h2>Product</h2>
        </div>
    </div>

    <!-- The Modal -->
    <div  class="modal-update2">
        <!-- Modal content -->
        <div class="modal-content-update2">
            <a href="admin-product.php" class="close1">&times;</a>
            <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Update Watch</h1>
                    <hr><br>
                    <label id="label" for="">Images</label>
                    <input type="file" name="file" id="file" value="<?php echo $img ?>">
                    <label for="">Watch Name</label>
                    <input id="fName" name="txtname" type="text" placeholder="Watch Name" value=<?php echo $name ?>> <br><br>

                    <label id="catelabel" for="txtcate">Category</label>
                    <select name="txtcate" id="txtcate1" required>
                    <option value="<?php echo $cate?>"><?php echo $cate?></option>
                        <?php
                        $sql = "SELECT Category_ID, Category_Name FROM category";
                        $result = mysqli_query($con, $sql);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Category_Name']}'>{$row['Category_Name']}</option>";
                        }
                        ?>
                    </select><br><br>
                    <label for="">Price</label>
                    <input id="mobile" name="txtprice" type="text" placeholder="Price" value=<?php echo $price ?>> <br>
                    <label for="">Quantity</label>
                    <input id="address" name="txtqty" type="text" placeholder="Quantity"value=<?php echo $qty ?>> <br><br>

                    <!-- <label id="catelabel" for="">Confirm Password</label>
                    <input type="password" name="confirmtxt"> -->
                    <hr>
                    <input id="btn1" type="submit" name="updatebtn"  value="Update Watch" ><br>
                </form>
        </div>
    </div>

    <div class="container-table">
        <div class="buttons">
            <button id="addButton">Add</button>
            <form action="admin-product-multidel.php" method="GET" enctype="multipart/form-data">
            <button id="btndelete" type="submit" name="delete" >Delete Selected</button>
            <input type="text" id="searchInput" placeholder="Search...">
            <select name="sort" id="sort">
                <option value="">Sort</option>
                <option value="ACD">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
        </div>
        <table class="table" id="categoryTable">
        <?php
            if (isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-success text-center">
                    <h4><?= $_SESSION['status']; ?></h4>
                </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
                        <thead>
                            <tr>
                                <th>Delete</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Watch Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sold</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                    <?php
                        $rows = mysqli_query($con, "SELECT * FROM watch_info");
                        $i = 1;
                        // foreach($rows as $ro)
                        
                        $sql = "Select * from watch_info";
                        $result = mysqli_query($con, $sql);
                        if($result){
                            // echo $row['name'];
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['watch_ID'];
                                $img = $row['watch_Image'];
                                $name = $row['watch_Name'];
                                $cate = $row['watch_Category'];
                                $price = $row['watch_Price'];
                                $qty = $row['watch_Qty'];
                                $sold = $row['SoldCount'];
                                
                                
                                echo '<tr>
                                <td> <input type="checkbox" name="ids[]" value="'.$id.'" ></td>
                                <td>'.$id.'</td>
                                <td><img src='.$img.' width="50" height="50"></td>
                                <td>'.$name.'</td>
                                <td>'.$cate.'</td>
                                <td>'.$price.'</td>
                                <td>'.$qty.'</td>
                                <td>'.$sold.'</td>
                                <td><button id="btned"><a href="admin-product-update.php?updateid='.$id.'"><i class="fa fa-pencil-square"></i> Update</a></button>
                                    <button id="btndel"><a href="admin-product-delete.php?deleteid='.$id.'" ><i class="fa fa-trash"></i> Delete</a></button>
                                </td>
                                </tr>
                                ';
                            }
                        }    
                    ?>
    
                        </tbody>   
                    </table>
                    </form>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./filter.js"></script>
<!-- <script src="./modal.js"></script> -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  var modal = document.querySelector('.modal-update2');
  modal.style.display = 'block'; // Set the display style to block to make the modal visible
});
</script>

<?php
    include("admin-design/admin-footer.php");
?>