<?php
  include('includes/header.php');
  
  $result = '';
  function fibonacci($fibNum){
    if($fibNum == 1){
      $result = '0';
      return '<h4 class="mt-3 mb-3"><b>Fibonacci Series</b></h4>'.$result;
    }
    else{
      $first = 0;
      $second = 1;
    
      $result = $first.' '.$second.' ';
    
      for($i = 2; $i < $fibNum; $i++){
        $third = $first + $second;
    
        $result .= $third.' ';

        $first = $second;
        $second = $third;
      }
      return '<h4 class="mt-3 mb-3"><b>Fibonacci Series</b></h4>'.$result;
    }
  }
?>

  <div class="container box mt-5 mb-5">
   <h3 class="mt-3" style="text-align: center;"><b>Fibonacci</b></h3><br />

   <form method="POST">
    <!-- Number Input -->
    <div class="mb-3">
      <label for="fibNum" class="form-label">Input a Number</label>
      <input type="number" class="form-control" id="fibNum" name="fibNum" min="1" max="20" required>
      <div class="form-text">Numbers between 1-20.</div>
    </div>

    <!-- Submit Button -->
    <button type="submit" name="fibSubmit" class="btn btn-primary mb-3">Submit</button>
    
    </form>
  </div>

  
    <?php
    if(isset($_POST['fibSubmit'])){
      $fibNum = $_POST['fibNum'];
      fibonacci($fibNum);
    ?>
    <div class="container box mt-5">
      <?php
        echo fibonacci($fibNum);
      }
      ?>
    </div>

 </body>
</html>