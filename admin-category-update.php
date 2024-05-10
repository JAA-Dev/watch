<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");
    include "database.php";

    $id = $_GET['updateid'];
    $sql1 = "select * from category where Category_ID='$id'";
    $result1 = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($result1);
    $fname = $row['Category_Name'];

    if(isset($_POST['txtupdate'])){
        $Fname = $_POST['txtname'];
        
        $sql1 = "UPDATE category set Category_ID='$id',Category_Name='$Fname' where Category_ID='$id'";
        $result1 = mysqli_query($con, $sql1);
        if($result1){
            echo"
            <script>
                alert('Updated Successfully!');
                location.href='admin-category.php';
            </script>
            ";
        }
        else{
            echo "Data not inserted ";
        }
    }
?>

<div class="rigth-container">
     <!-- The Modal -->
    <div  class="modal-update1">
        <!-- Modal content -->
        <div class="modal-content-update1">
            <a href="admin-category.php"  class="close" >&times;</a>
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>Update Category</h1>
                <hr><br>
                <label for="">Category Name</label>
                <input type="text" name="txtname" id="txtname" required value="<?php echo $fname ?>"><br><br>
                <hr>
                <input id="addbtn" type="submit" name="txtupdate" value="Update Category"><br>

            </form>
        </div>
    </div>
    <div class="header-text">
        <h2>Category</h2>
    </div>

   
    

    <div class="container-table1">
        <div class="buttons">
            <button id="addButton">Add</button>
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
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($con, "SELECT * FROM category");
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['Category_ID'];
                        $first = $row['Category_Name'];
                        echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $first . '</td>
                                <td><button id="btned"><a href="admin-category-update.php?updateid=' . $id . '"><i class="fa fa-pencil-square"></i> Update</a></button>
                                    <button id="btndel"><a href="admin-category-delete.php?deleteid=' . $id . '"><i class="fa fa-trash"></i> Delete</a></button>
                                </td>
                                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./filter.js"></script>
<!-- <script src="./modal.js"></script> -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  var modal = document.querySelector('.modal-update1');
  modal.style.display = 'block'; // Set the display style to block to make the modal visible
});
</script>

<?php
include("admin-design/admin-footer.php");
?>
