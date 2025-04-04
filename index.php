<?php

if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "us-trip";

        $con = mysqli_connect($server, $username, $password, $database);
        
        if (!$con){
            die("connection to this database failed due to".mysqli_connect_error());
        }
        // echo "success connecting to the db";
        
        // Check if the form was submitted

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['branch']) && !empty($_POST['email']) && !empty($_POST['gender'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $branch = $_POST['branch'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
            

                $sql = "INSERT INTO `us-trip` ( `name`, `address`, `branch`, `email`, `gender`,`dt`) VALUES ('$name', '$address', '$branch', '$email', '$gender', current_timestamp());";
                

                if (!mysqli_query($con, $sql)) {
                    echo "<br> ERROR: ". mysqli_error($con);
                }
                else {
                    echo "<br> data inserted successfully!";
                }
            }
            else {
                echo "<br> all fields are required";
            }
        }
            // Close the database connection
            mysqli_close($con);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- <img src="https://mipuntajedecreditoenusa.com/wp-content/uploads/2023/07/Cheap-Vacation-Spots-In-The-USA-1024x569.png" class="img-fluid" id="bg" alt="us-trip" class="opacity-25"> -->
    <div class="img">
    <div class="container  bg-gradient" >
        <h2>Welcome To US trip</h2>
        <p>Enter the details and submit the form to confirm your participation in trip</p>

        <!-- form creation -->
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInpuName1" name="name" placeholder="enter your name" required>
              </div>

              <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
              </div>

              <div class="mb-3">
                <label for="exampleInputBranch1" class="form-label">Branch</label>
                <input type="text" class="form-control" id="exampleInputBranch1" name="branch" placeholder="enter your branch" required>
              </div>

              

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="enter your email" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <!-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="enter password">
            </div> -->

            <select class="form-select" name="gender" aria-label="Default select example">
                <option value="" selected disabled>gender</option>
                <option value="male">male</option>
                <option value="female">Female</option>
                <option value="prefer not to say">Prefer not to say</option>
              </select>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="index.js"></script>


  </body>
</html>

