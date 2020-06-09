
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
                <th>first name</th>
                <th>first name</th>
                <th>register no</th>
                <th>email</th>
                <th>username</th>
                <th>status</th>
                <th>dateTime</th>
                <th>action</th>
            </thead>
            <tbody>

                <?php
                    require_once 'db.php';
                    $table = 'students';  // it should be string; --literal string

                    if(isset($_GET['activeId'])){
                        $id = $_GET['activeId'];
                        echo $id;

                        $query = "UPDATE $table SET `status`= 'active' WHERE id = $id";
                        $result = mysqli_query($link,$query);
                        if($result){
                            echo "yes";
                        }else{
                            echo "no";
                        }
                    }
                    
                    if(isset($_GET['inactiveId'])){
                        $id = $_GET['inactiveId'];
                        $query = "UPDATE $table SET `status`='inactive' WHERE id = $id";
                        $result = mysqli_query($link,$query);
                
                    }
                ?>
                <?php

                    $query = "SELECT * FROM $table WHERE 1";
                    $result = mysqli_query($link,$query);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['reg']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td>
                            <a href="students.php?activeId=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                            <a href="students.php?inactiveId=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
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