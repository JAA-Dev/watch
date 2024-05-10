<?php
    include "database.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVA TIME</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <div class="image-logo">
                <a href="home.html"><h3 class="brand-title">Nova <span class="brand-title-span">Time</span></h3></a>
            </div>
            <div class="nav-links">
                <a href="home.html">Home</a>
                <a href="home.html#about">About</a>
                <a href="home.html#contact">Contact</a>
                <a href="collection.php">Collection</a>
            </div>
        </nav>
    </header>

    <div id="search-container">
        <div>
         <input type="text" id="search" placeholder="Search...">
        </div>
     </div>
     
     <div id="filter">
         <div id="left">
             <table>
                 <tr>
                     <td><label for="">Category:</label> </td>
                     <td>        
                         <select name="txtcate" id="txtcate1" required>
                         <option class="style-drop" value="">Category</option>
                         <?php
                            $sql = "SELECT Category_ID, Category_Name FROM category";
                            $result = mysqli_query($con, $sql);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['Category_Name']}'>{$row['Category_Name']}</option>";
                            }
                            
                    ?>
                    </select>
                     </td>
                 </tr>
             </table>
         </div>
         <div id="right">
             <table>
                 <tr>
                     <td>
                         <label for="">Price: </label>
                     </td>
                     <td>
                         <select id="sort-select">
                            <option value="">Price</option>
                             <option value="asc">Sort: Low to High</option>
                             <option value="desc">Sort: high to Low</option>
                         </select>
                     </td>
                 </tr>
             </table>
         </div>
     </div>
     <div style="text-align: center;"><h2>Watch List</h2></div> <br><br>
     <div id="product-container">
    <!-- <div style="text-align: center;"><h2>Watch List</h2></div>  -->

    <div id="product-list" style="display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-evenly;
        gap:20px;">

<?php
            $sqlBooks = "SELECT * FROM `watch_info`";
            $resultBooks = mysqli_query($con, $sqlBooks);

            if (mysqli_num_rows($resultBooks) > 0) {
                while ($book = mysqli_fetch_assoc($resultBooks)) {
                    $bookID = $book['watch_ID'];
                    $bookName = $book['watch_Name'];
                    $bookCategory = $book['watch_Category'];
                    $bookImage = $book['watch_Image'];
                    $bookPrice = $book['watch_Price'];

                    echo '
                    <div class="product" id="boroow" data-category="' . strtolower($bookCategory) . '">
                        <form action="" method="POST" style="width: 300px; background-color:  grey; text-align: center; " >
                            <img src="'.$bookImage.'" alt="" width="280px" height="250px" style="margin-top:10px;">
                            <p class="product-name" style="color:black;">' . $bookName . '</p>
                            <p class="product-category" style="color:black;">' . $bookCategory . '</p>
                            <p class="product-price" style="color:black;">' . $bookPrice . '</p>
                            <table>
                                <td>
                                    <button style="text-align: center; margin:0 0 10px 90px; padding: 10px 20px; background-color: #c3a07d;" id="btnuser1" name="addToBorrow" "><a href="users-borrow.php?categoryid='.$bookCategory.'&updateid='.$bookID.'" style="text-decoration: none; color: white;">Add to cart</a></button>
                                </td>
                            </table>
                        </form>
                    </div>';
                }
            }
            mysqli_close($con);
        ?>
    </div>
</div>
    


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="filter&search.js"></script>
</html>
