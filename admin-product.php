<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");
    include "database.php";
        
?>
    <div class="rigth-container">
        <div class="header-text">
            <h2>Product</h2>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content1">
            <span class="close">&times;</span>
            <form action="admin-product-add.php" method="POST" enctype="multipart/form-data">
                <h1>Add Category</h1>
                <hr><br>
                <label id="label" for="">Images</label><br>
                <input type="file" name="file" id="file" required><br>
                <label id="label" for="">Watch Name</label><br>
                <input type="text" name="txtname" id="txtname" required placeholder="Watch Name"><br><br>
                <label id="catelabel" for="txtcate">Category</label>
                <select name="txtcate" id="txtcate1" required>
                    <?php
                    $sql = "SELECT Category_ID, Category_Name FROM category";
                    $result = mysqli_query($con, $sql);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Category_Name']}'>{$row['Category_Name']}</option>";
                    }
                    ?>
                </select><br><br>
                <label id="label" for="">Price</label><br>
                <input type="number" name="txtprice" id="txtprice" pattern="^\d+(\.\d{1,2})?$" required placeholder="Price"><br> <!--step="0.01"-->
                <label id="label" for="">Quantity</label><br>
                <input type="number" name="txtqty" id="txtqty" required placeholder="Qty"><br>
                <input id="addbtn" type="submit" name="addbtn" value="Add Watch"><br>
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

        <div class="container-user">
            <table class="table" id="categoryTable" >
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

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./filter.js"></script>
<script src="./modal.js"></script>

<?php
    include("admin-design/admin-footer.php");
?>