<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1 class="mt-5"><b><u>Specialised Field of Faculty</u></b></h1>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="GET">
                    <div class="input-group mt-5">
                        <!-- <label for="go">search bar </label> -->
                        <input type="text" id="go" placeholder="click here to search" name="search" class="form-control"
                            value="<?php    
                                if(isset($_GET['search'])){
                                    echo $_GET['search'];
                                }
                            ?>">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Email-Id</th>
                            <th>Name of the Faculty</th>
                            <th>Field of Specialisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id=1;
                            $con = mysqli_connect("localhost","root","","trip");
                            if(isset($_GET['search'])){
                                $searched_val = $_GET['search'];
                                $query = "SELECT * FROM `trip table1` WHERE CONCAT(Name) LIKE '%$searched_val%'";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run)>0){
                                    
                                    foreach($query_run as $items){
                        ?>

                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $items['Email'] ?></td>
                            <td><?= $items['Name'] ?></td>
                            <td><?= $items['Field of Specialisation'] ?></td>


                        </tr>
                        <?php
                                    }
                                }
                            else{
                                ?>
                        <tr>
                            <td colspan="4">No record found</td>
                        </tr>
                        <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</body>

</html>