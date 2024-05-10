<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");
    include "database.php";
?>

<div class="rigth-container">
    <div class="header-text">
        <h2>Category</h2>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="admin-category-add.php" method="POST" enctype="multipart/form-data">
                <h1>Add Category</h1>
                <hr><br>
                <label for="">Category Name</label>
                <input type="text" name="txtname" id="txtname" required placeholder="Category Name"><br><br>
                <hr>
                <input id="addbtn" type="submit" value="Add Category"><br>

            </form>
        </div>
    </div>

    <!-- The Modal -->
    <!-- <div id="myModal1" class="modal1"> -->
        <!-- Modal content -->
        <!-- <div class="modal-content1">
            <span class="close1">&times;</span>
            <form action="admin-category-add.php" method="POST" enctype="multipart/form-data">
                <h1>Update Category</h1>
                <hr><br>
                <label for="">Category Name</label>
                <input type="text" name="txtname" id="txtname" required placeholder="Category Name"><br><br>
                <hr>
                <input id="addbtn1" type="submit" value="Update Category"><br>

            </form>
        </div>
    </div> -->

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
        <div class="container-user">
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
                                    <td>
                                        <button id="btned"><a href="admin-category-update.php?updateid=' . $id . '"><i class="fa fa-pencil-square"></i> Update</a></button>
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="filter.js"></script>
<script src="modal.js"></script>
<script src="modal1.js"></script>

<?php
include("admin-design/admin-footer.php");
//<button id="btned"><a href="admin-category-update.php?updateid=' . $id . '"><i class="fa fa-pencil-square"></i> Update</a></button>
?>
