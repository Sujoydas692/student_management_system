<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container text-left">
      <br>
      <a class="btn btn-danger" href="admin/login.php">Admin Login</a>
      <br>
      <br>
      <h1 class="text-center">Welcome to Student Management System</h1>
      <hr>
      <br>
      <br>

      
      
    </div>

    <div class="row">
        <div class="col-sm-4 offset-4">
          <form action="" method="POST">

        <table class="table table-bordered">
          <tr>
            <th colspan="2" class="text-center">STUDENT INFORMATION</th>
          </tr>
           <tr>
            <td><label for="choose">Choose Dep.</label></td>
            <td>
              <select class="form-control" id="choose" name="choose">
                <option value="">Select</option>
                <option value="CSE">COMPUTER SCIENCE & ENGINEERING</option>
                <option value="EEE">ELECTRICAL & ELECTRONIC ENGINEERING</option>
                <option value="ETE">ELECTRONICS & TELECOMMUNICATION ENGINEERING</option>
                <option value="SE">SOFTWARE ENGINEERING</option>
                <option value="TE">TEXTILE ENGINEERING</option>
              </select>
            </td>
          </tr>
           <tr>
            <td><label for="roll">Student ID</label></td>
            <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Enter Your Studen ID"></td>
          </tr>
           <tr>
            <td colspan="2" class="text-center"><input class="btn btn-info" type="submit" name="show_info" value="Show Info"></td>
          </tr>
        </table>
        
      </form>
          
        </div>

        
      </div>
      <br>
      <br>

      <?php
      include 'admin/connection.php';

      if (isset($_POST['show_info'])) {

        $choose = $_POST['choose'];
        $roll = $_POST['roll'];

        $result = mysqli_query($con,"SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll'");

        if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);

          ?>

           <div class="row">
        <div class="col-sm-6 offset-3">
          <table class="table table-bordered">
            <tr>
              <td rowspan="4">
                <img src="admin/student images/<?= $row['image'] ?>" class="img-thumbnail" width="200px">
              </td>
              <td>Name</td>
              <td><?= ucwords($row['name']) ?></td>
            </tr>
            <tr>
              <td>Student ID</td>
              <td><?= $row['roll'] ?></td>
            </tr>
            <tr>
              <td>Department</td>
              <td><?= $row['class'] ?></td>
            </tr>
             <tr>
              <td>City</td>
              <td><?= ucwords($row['city']) ?></td>
            </tr>
          </table>
          
          
        </div>
        
      </div>

        <?php  
          
        }else {
          ?>

          <script type="text/javascript">
            alert('Data Not Found');

          </script>

          <?php }} ?>

      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>