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
                <form class="form-inline" method="POST" action="add.php">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control" name="address" placeholder="Address">
      </div>
      <div class="col-md-3 mb-3">
        <input type="number" class="form-control" name="mobile" placeholder="Mobile No">
      </div>
      <div class="col-md-3 mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
        <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "mydb";
     
       
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       
     if(isset($_POST['submit'])){
   
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $sql ="insert into student (name,address,mobile)values('$name','$address','$mobile')";
   
    if(mysqli_query($conn, $sql)){
        header("location:crud.php");
    } else {
        echo "something error".$conn;
    }
}

?>
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
                           <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "mydb";
              
                  
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
                  
                            $sql="select * from student";
                            $result=mysqli_query($conn,$sql);
                            $id=1;//----condition---//
                            while($row = mysqli_fetch_array($result))
                            {
                                $uid = $row['id'];
                                $name = $row['name'];
                                $address = $row['address'];
                                $mobile = $row['mobile'];
                            ?>

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
                                <?php $id++; }//--condition--// ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
                </div>

            </div>
        </div>

</body>
</html>