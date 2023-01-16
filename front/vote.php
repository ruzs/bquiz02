<?php
$subject = $Que->find($_GET['id']);
$options = $Que->all(['parent' => $_GET['id']]);
?>
<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
  <form action="./api/vote.php" method='post'>
    <h3><?= $subject['text']; ?></h3>
    <?php
    foreach ($options as $opt) {
      echo "<p>";
      echo "<input type=radio name='opt' value='{$opt['id']}'>";
      echo $opt['text'];
      echo "</p>";
    }
    ?>
    <p class='ct'>
      <input type="submit" value="我要投票">
    </p>
  </form>

</fieldset>