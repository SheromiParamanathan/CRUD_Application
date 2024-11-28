<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        .search-form {
            margin-top: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            padding-right: 5px;
        }

        .form-control {
            width: 920px;
        }

        #addBtn {
            margin-right: 45px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Details CRUD Application</h1>
                    </div>
                    <div class="card-body">
                        <div class="search-form">
                            <button class="btn btn-success" id="addBtn"> <a href="add.php" class="text-light"> Add Record </a></button>
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search" id="searchInput">
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>

                            <tbody id="tableBody">
                                <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection, "crud_app");

                                $sql = "select * from student";
                                $run = mysqli_query($connection, $sql);

                                $id = 1;

                                while($row = mysqli_fetch_array($run))
                                {
                                    $uid = $row['id'];
                                    $name = $row['name'];
                                    $department = $row['department'];
                                    $address = $row['address'];
                                    $contact = $row['contact'];
                                    $email = $row['email'];
                                ?>

                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $department ?></td>
                                    <td><?php echo $address ?></td>
                                    <td><?php echo $contact ?></td>
                                    <td><?php echo $email ?></td> 
                                    
                                    <td>
                                        <button class="btn btn-success"> <a href='edit.php?edit=<?php echo $uid ?>' class="text-light">Edit</a></button> &nbsp;
                                        <button class="btn btn-danger"> <a href='delete.php?del=<?php echo $uid ?>' class="text-light">Delete</a></button>
                                    </td>
                                </tr>

                                <?php $id++; } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for search functionality -->
    <script>

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableBody");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("searchInput").addEventListener("input", searchTable);
    </script>
</body>
</html>
