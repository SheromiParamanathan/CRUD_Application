<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, "crud_app");

    if(isset($_POST["submit"]))
        {
         echo $uid = $_POST['id'];
         echo $name = $_POST['name'];
         echo $department = $_POST['department'];
         echo $address = $_POST['address'];
         echo $contact = $_POST['contact'];
         echo $email = $_POST['email'];

         $sql = "INSERT INTO student(name,department,address,contact,email) VALUES (' $name',' $department',' $address',' $contact',' $email')";

         if(mysqli_query($connection,$sql))
         {
            echo '<script>location.replace("index.php")</script>';
         }
         else 
         {
            echo " Some Error" . $connection->error;
         }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Student Details</h1>
                    </div>

                    <div class="card-body">

                    <form action="add.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" name="department" class="form-control" id="department" placeholder="Department">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">contact Number</label>
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact Number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <br />
                        <input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
                    </form> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
