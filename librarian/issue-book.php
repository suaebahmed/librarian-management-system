<?php require_once "header.php" ?>

<div class="content">
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="#">issue book</a></li>
            </ul>
        </div>
    </div>

    <?php   
        if(isset($_POST['add-issue-book'])){
            echo "<pre>";
                print_r($_POST);
            echo "</pre>";
        }
    ?>
        <!-- main content header ---->
    <div class="row animated fadeInUp">
        <div class="col-xs-8">
            <form action="" method="post">
                <div class="form-group">

                    <select name="student_id">
                    <option value="">select</option>
                    <?php 
                        require_once 'db.php';
                        $query = "SELECT * FROM `students` WHERE 1";
                        $result = mysqli_query($link,$query);
                        while($row = mysqli_fetch_assoc($result)):
                    ?>
                    <option value="<?php echo $row['id'] ?>">
                        <?php echo $row['username']." (".$row['reg'].")"; ?>
                    </option>
                    <?php
                        endwhile;
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    <button name="search" class="btn btn-primary" >Search</button>
                </div>
            </form>
        </div>

<!--  the below entire code depand on submit search form -->
    <?php
        if(isset($_POST['search'])){

        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
        $id = $_POST['student_id'];
    
        $query1 = "SELECT * FROM `students` WHERE id = $id";
        $result1 = mysqli_query($link,$query1);
        $row1 = mysqli_fetch_assoc($result1)

    ?>
    <div class="col-sm-12 col-md-6">
        <h4 class="section-subtitle">Basic form</h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST">
                                <div class="form-group" hidden>
                                    <label for="id">id</label>
                                    <input type="text" class="form-control" id="id" name="student_id" value="<?php echo $row1['id'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username">Student username</label>
                                    <input type="text" class="form-control" id="username" value="<?php echo $row1['username'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="book_id">Books</label>
                                    <select name="book_id">
                                        <option value="">select</option>
                                        <?php 
                                            require_once 'db.php';
                                            $query = "SELECT * FROM `books` WHERE 1";
                                            $result = mysqli_query($link,$query);
                                            while($row = mysqli_fetch_assoc($result)):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php echo $row['book_name']; ?>
                                        </option>
                                        <?php
                                            endwhile;
                                        ?>
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <label for="issue_date">Issue date</label>
                                    <input type="text" class="form-control" name="book_issue_date" id="issue_date" value="<?php echo date('d-M-Y') ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add-issue-book" class="btn btn-primary">add issue book</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
    </div>
</div>

<?php require_once "footer.php" ?>
