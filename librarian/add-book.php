<?php
    session_start();
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>suaeb</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<?php

    require_once 'db.php';
    $table = 'books';

    if(isset($_POST['add_book'])){

        $book_name = $_POST['book_name'];
        $book_auth_name = $_POST['book_auth_name'];
    
        $book_image_name = $_FILES['book_image']['name'];
    
        $book_publication_name = $_POST['book_publication_name'];
        $book_purchase_date = $_POST['book_purchase_date'];
        $book_price = $_POST['book_price'];
        $book_qty = $_POST['book_qty'];
        $book_available_qty = $_POST['book_available_qty'];
        $librarian_username = $_POST['librarian_username'];
    
        $query = "INSERT INTO `books`(`book_name`, `book_image`, `book_auth_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `book_available_qty`, `librarian_username`) VALUES ('$book_name','$book_auth_name','$book_image_name','$book_publication_name','$book_purchase_date',$book_price,$book_qty,$book_available_qty,'$librarian_username')";

        $result = mysqli_query($link,$query);

        if($result){
            move_uploaded_file($_FILES['book_image']['tmp_name'],"../images/$book_image_name");
            $_SESSION['add_book_success'] = 'successfully book added';

        }else{
            $_SESSION['add_book_error'] = 'not book added';
        }
        
    }
?>


<div class="wrap">
    <div class="page-body animated slideInDown">
        <div class="box">
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">

                <?php
                    if(isset($_SESSION['add_book_success'])){
                        echo "<div class='alert alert-success'>".$_SESSION['add_book_success']."</div>";
                        unset($_SESSION['add_book_success']);
                    }
                    if(isset($_SESSION['add_book_error'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['add_book_error']."</div>";
                        unset($_SESSION['add_book_error']);
                    }
                ?>
                    <form acton="add-book.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_name" id="name" placeholder="book name">
                                <i class="fa fa-book"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="file" class="form-control" name="book_image" id="name" placeholder="last name">
                                <i class="fa fa-image"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_auth_name" id="email" placeholder="book auth name">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_publication_name" id="username" placeholder="book publication name">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_purchase_date" placeholder="book purchase date">
                                <i class="fa fa-time"></i>
                            </span> 
                        </div>                        
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name ='book_price' placeholder="book price">
                                <i class="fa fa-dollor"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_qty" placeholder="book qty">
                                <i class="fa fa-number"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_available_qty" placeholder="book available qty">
                                <i class="fa fa-number"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="librarian_username" placeholder="librarian username">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class='btn btn-block btn-primary' name="add_book" value="Add book" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            want to go home?, <a href="index.php">home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>

</body>
</html>
