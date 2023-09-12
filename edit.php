<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  

$edit = $_GET['edit'];

$sql = "select * from student where id = '$edit'";

$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_array($result)) {
    $uid = $row['id'];
    $name = $row['name'];
    $address = $row['address'];
    $mobile = $row['mobile'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $sql = "update student set name= '$name', address= '$address', mobile='$mobile' where id =  '$edit'";

    if (mysqli_query($conn, $sql)) {
        echo '<script> location.replace("crud.php")</script>';
    } else {
        echo "Something Error: " .$conn->connect_error;
    }
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 </head>
 <body>
<div class="container">
            <div class="row">
                 <div class="col-md-10">
                    <div class="card">
                    <div class="card-header">
                        <h1> Student Crud Application </h1>
                    </div>
                <button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a> </button><br>
                <form class="form-inline" method="POST" action="edit.php?edit=<?php echo $edit; ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control"value="<?php echo $name; ?>" name="name" placeholder="Name">
      </div>
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control" value="<?php echo $address; ?>" name="address" placeholder="Address">
      </div>
      <div class="col-md-3 mb-3">
        <input type="number" class="form-control" name="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile No">
      </div>
      <div class="col-md-3 mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</form>
                     <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                                    <tr>
                                    <td><?php echo $uid ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $address ?></td>
                                    <td><?php echo $mobile ?></td>

                                    <td>
                                    <button class="btn btn-success"> <a href='edit.php?edit=<?php echo $uid ?>' class="text-light"> Edit </a> </button> &nbsp;
                                   <button class="btn btn-danger"><a href='delete.php?delete=<?php echo $uid ?>' class="text-light"> Delete </a> </button>
                                    </td>
                               </tr>
                                
                    </tbody>
                    </table>
                    </div>
                    </div>
                </div>

            </div>
        </div>

</body>
</html>