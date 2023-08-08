<?php
  include('includes/header.php');

  class ArraySorter {
    private $arr;

    public function __construct($arr) {
        $this->arr = $arr;
        $this->bubbleSort();
    }

    private function bubbleSort() {
      $array = count($this->arr);
      for ($i = 0; $i < $array; $i++) {
          for ($j = 0; $j < $array - $i - 1; $j++) {
              if ($this->arr[$j] > $this->arr[$j + 1]) {
                  $temp = $this->arr[$j];
                  $this->arr[$j] = $this->arr[$j + 1];
                  $this->arr[$j + 1] = $temp;
              }
          }
      }
    }

    public function median() {
        $array = count($this->arr);
        if ($array % 2 == 1) {
            return $this->arr[$array / 2];
        } else {
            $median1 = $this->arr[$array / 2];
            $median2 = $this->arr[$array / 2 - 1];
            return ($median1 + $median2) / 2;
        }
    }

    public function largestNumber() {
        return $this->arr[count($this->arr) - 1];
    }

    public function sortedArray() {
        return $this->arr;
    }
  }

  class ArrayAnalyzer {
      private $analyzer;

      public function __construct($arr) {
          $this->analyzer = new ArraySorter($arr);
      }

      public function showResults() {
          $median = $this->analyzer->median();
          $largest = $this->analyzer->largestNumber();

          echo "Sorted Array: " . implode(', ', $this->analyzer->sortedArray()) . "<br>";
          echo "Median: $median<br>";
          echo "Largest Value: $largest<br>";
      }
  }
?>

  <div class="container box mt-5 pb-3">
   <h3 class="mt-3" style="text-align: center;"><b>Bubble Sort</b></h3><br />

    <?php
      $arrayValue = [32, 11, 5, 1, 8, 19, 50, 14];
      $analyzer = new ArrayAnalyzer($arrayValue);
      $analyzer->showResults();
    ?>
    
  </div>

 </body>
</html>