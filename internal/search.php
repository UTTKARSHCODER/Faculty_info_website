<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search bar</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- bootstrap link -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2 style="text-align: center;" class="mt-5">Search bar -</h2>
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
                            <th>Name</th>
                            <th>Email-Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $con = mysqli_connect("localhost","root","","trip");
                            if(isset($_GET['search'])){
                                $searched_val = $_GET['search'];
                                $query = "SELECT * FROM `trip table1` WHERE CONCAT(Name) LIKE '%$searched_val%'";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run)>0){
                                    
                                    foreach($query_run as $items){
                                        ?>

                        <tr>
                            <td><?=$items['Name']; ?></td>

                            <td><?= $items['Email'] ?></td>

                        </tr>
                        <?php
                                    }
                                }
                            else{
                                ?>
                        <tr>
                            <td colspan="2">No record found</td>
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