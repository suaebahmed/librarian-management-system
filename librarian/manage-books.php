<?php require_once "header.php" ?>

<div class="content">
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- main content header ---->
    <div class="row animated fadeInUp">
       
    <div class="col-sm-12">
        <table class="table bordered">
            <thead>
                <th>ID</th>
                <th>name</th>
                <th>author</th>
                <th>image</th>
                <th>publisher</th>
                <th>purchase date</th>
                <th>price</th>
                <th>qty</th>
                <th>available qty</th>
                <th>librarian username</th>
                <th>dateTime</th>
                <th>action</th>
            </thead>
            <tbody>

                <?php
                    require_once 'db.php';
                    $table = 'books';  // it should be string; --literal string

                    if(isset($_GET['delete'])){
                        $id = $_GET['delete'];

                        $query = "DELETE FROM $table WHERE id = $id";
                        $result = mysqli_query($link,$query);
                        if($result){
                            echo "yes";
                        }else{
                            echo "no";
                        }
                    }
                ?>
                <?php

                    $query = "SELECT * FROM $table WHERE 1";
                    $result = mysqli_query($link,$query);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['book_author']; ?></td>

                        <td><img width="50px" height="50px" src="../images/<?php echo $row['book_image']; ?>"></td>

                        <td><?php echo $row['book_publication_name']; ?></td>
                        <td><?php echo $row['book_purchase_date']; ?></td>
                        <td><?php echo $row['book_price']; ?></td>
                        <td><?php echo $row['book_qty']; ?></td>
                        <td><?php echo $row['book_available_qty']; ?></td>
                        <td><?php echo $row['librarian_username']; ?></td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td>
                            <a href="manage-books.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                            <a href="update-book.php?editId=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    </div>
</div>

<?php require_once "footer.php" ?>
