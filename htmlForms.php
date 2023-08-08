<?php
  include('includes/header.php');
  include('db/conn.php');
?>

<div class="container box mt-5 mb-5" style="width: 1500px !important;">

  <div class="row">
    <div class="col">
    </div>
    <div class="col">
      <h3 class="mt-5 mb-5" style="text-align: center;"><b>MySQL Data</b></h3>
    </div>
    <div class="col">
      <!-- Button trigger Add Book modal -->
      <button type="button" class="btn btn-primary float-end mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
    </div>
  </div>
    <table class="table">
      <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $result = $conn->query("SELECT * FROM users ORDER BY id ASC");
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
        ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobileNum']; ?></td>
                    <td><?php echo $row['birthDate']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                  </tr>
                  <?php
              }
          }
          ?>
      </tbody>
    </table>
  </div>

  <!-- <div class="container box mt-5 mb-5"> -->



    <!-- Modal Create -->

    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><b>HTML Forms</b></h3>
              <!-- <h3 class="mt-3" style="text-align: center;"><b>HTML Forms</b></h3><br /> -->
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form id="htmlform" method="POST">
              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" onkeydown="return /[a-z.,Ññ ]/i.test(event.key)" required>
              </div>

              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="mobileNum" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobileNum" name="mobileNum" required>
              </div>

              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="birthDate" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" required>
              </div>

              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control pointernone" id="age" name="age" required>
              </div>

              <!-- Full Name Input -->
              <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                  <option selected value='' hidden></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                </select>
              </div>

              <!-- Submit Button -->
              <button type="submit" id="htmlSubmit" name="htmlSubmit" class="btn btn-primary float-end mb-3">Submit</button>
              
            </form>
          </div>

        </div>
      </div>
    </div>


  <!-- </div> -->

 </body>
</html>

<!-- AJAX store data -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#htmlSubmit').click(function() {
      var fullName = $('#fullName').val();
      var email = $('#email').val();
      var mobileNum = $('#mobileNum').val();
      var birthDate = $('#birthDate').val();
      var age = $('#age').val();
      var gender = $('#gender').val();

      if((fullName != "") && (email != "") && (mobileNum != "") && (birthDate != "") && (age != "") && (gender != "")){
        $.ajax({
          url: 'htmlFormsSubmit.php',
          type: 'POST',
          data: {
            fullName: fullName,
            email: email,
            mobileNum: mobileNum,
            birthDate: birthDate,
            age: age,
            gender: gender
          },
          success: function(response) {
            // alert(response);
            return response;        
          }
        });
      }
    });
});
</script>

<script type = "text/javascript">
  $("#birthDate").change(function(){
    var birthDate = $('#birthDate').val();
    birthDate = new Date(birthDate);
    var today = new Date();

    var totalAge = Date.now() - birthDate.getTime();
    ageYear = new Date(totalAge);
    ageYear = Math.abs(ageYear.getUTCFullYear() - 1970);

    $('#age').val(ageYear);
  });
</script>
