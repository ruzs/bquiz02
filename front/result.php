<?php
$subject = $Que->find($_GET['id']);
$options = $Que->all(['parent' => $_GET['id']]);
?>
<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
  <h3><?= $subject['text']; ?></h3>
  <?php
  foreach ($options as $opt) {
    $vote=$opt['count'];
    $all = ($subject['count'] == 0) ? 1 : $subject['count'];
    $width = round($vote / $all, 2) * 100;
    $background = ($width == 0) ? '#fff' : '#5ca';
    echo "<div style='display:flex;align-items:center'>";
    echo "<div style='width:50%'>";
    echo $opt['text'];
    echo "</div>";
    echo "<div style='width:50%;display:flex:'>";
    echo "<div style='min-width:max-content;width:{$width}%;background:{$background};height:25px;text-align:center'>";
    echo $vote . "票({$width}%)";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  ?>
  <p class='ct'>
    <button onclick="location.href='?do=que'">返回</button>
  </p>
</fieldset>