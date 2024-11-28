<?php
$connection = mysqli_connect("localhost", "root", "", "crud_app");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$edit = $name = $department = $address = $contact = $email = '';

if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $sql = "SELECT * FROM student WHERE id = '$edit'";
    $run = mysqli_query($connection, $sql);

    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_assoc($run);
        $name = $row['name'];
        $department = $row['department'];
        $address = $row['address'];
        $contact = $row['contact'];
        $email = $row['email'];
    } else {
        echo "No record found";
        exit();
    }
}

if (isset($_POST['submit'])) {
    $edit = $_POST['edit'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "UPDATE student SET name = '$name', department = '$department', address = '$address', contact = '$contact', email = '$email' WHERE id = '$edit'";

    if (mysqli_query($connection, $sql)) {
        echo '<script>location.replace("index.php")</script>';
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Details CRUD</h1>
                    </div>

                    <div class="card-body">
                        <form action="edit.php" method="post">
                            
                            <input type="hidden" name="edit" value="<?php echo $edit; ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" id="department" placeholder="Department" value="<?php echo $department; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo $address; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact Number" value="<?php echo $contact; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email; ?>">
                            </div>
                            <br />
                            <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
