<div class="container">
    <div class="offset-sm-1">
    <h5>Answer: </h5>
    <?php 
    $qry="select * from answers where question_id=$qid";
    $result=$conn->query($qry);
    foreach($result as $row){
          $answer=$row['answer'];
          echo "<div class='row'>
          <p class='answer-wraper'>$answer</p>
          </div>";
    }
    ?>
</div>
</div>