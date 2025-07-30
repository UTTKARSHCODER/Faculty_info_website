<?php
$server = "localhost";
$password = "";
$username = "root";
$dbname = "trip";

$con = mysqli_connect($server, $username , $password,$dbname);

if(!$con){
    die("ERROR: something is lost");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["upFile"])){
    $filename = $_POST["file_name"];
    $fileTemp_storage = $_FILES["upFile"]["tmp_name"];
    $fileRealName = $_FILES["upFile"]["name"];


    $finalDir_File = "uploads/";

    // make folder if not exist

    if(!file_exists($finalDir_File)){
        mkdir($finalDir_File,0777,true);
    }

    $final_File = $finalDir_File.basename($fileRealName);

    if(move_uploaded_file($fileTemp_storage,$final_File)){
        $sql = "INSERT INTO `trip table1`(file_name,file_path) VALUES (?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss",$filename,$final_File);
        
        if($stmt->execute()){
            echo "<div id='upload-success' data-file-path='{$final_File}' data-file-name='{$filename}'></div>";
        echo "Certificate uploaded and saved successfully.";
        }else{
        echo "ERROR: while saving the file.".$stmt->error;
        }
        
        $stmt->close();
    }
    else{
        echo "File upload failed.";
    }


}
$con->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of the individual faculty</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+AU+QLD:wght@100..400&display=swap" rel="stylesheet">
    <!-- <script src="style.js"></script> -->
    <script>
    var urlParams = new URLSearchParams(window.location.search);
    var itemId = urlParams.get('id');
    </script>
</head>

<body>
    <!-- Cerificate starts -->
    <hr>
    <h1><b>Your Certificate</b></h1>

    <hr>

    <div>
        <div class="row mb-5">
            <div class="col-md-12 mb-5 d-flex align-items-center flex-column text-center">

                <h5>No Certificate till now...Click below to add</h5>
                <img src="image copy.png" alt="" style="height: 300px; width: 400px;">
            </div>
            <div class="col-md-12">
                <div class="card position-absolute bottom-0 end-0 m-3" style="width: 10rem;">
                    <div class="container text-center ">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#upload_file"><img src="image.png"
                                alt="PIC of pdf file"><i class='fas fa-folder-plus'></i>
                            <h5>Add a new certificate</h5>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- modal start -->
        <form action="redirect.html" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="upload_file" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- modal header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Certificate</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- modal body -->
                        <div>
                            <label for="name" class="mt-3 ms-3">Certificate Title :- </label>
                            <input type="text" id="name" class="m-3 h-70" name="file_name"
                                placeholder=" Enter the title here">
                            <input type="file" name="upFile" class="m-3">
                            <button type="submit">Upload File</button>
                        </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>

</html>