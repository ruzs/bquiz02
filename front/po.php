<div>
  目前位置 : 首頁 > 分類網誌 > <span id="type">健康新知</span>
</div>

<fieldset style="display: inline-block;vertical-align:top">
  <legend>分類網誌</legend>
  <?php
  foreach ($News->type as $key =>$type) {
    echo "<a href='#' class='type' data-type='$key' style='display:block'>";
    echo $type;
    echo "</a>";
  }
  ?>
</fieldset>
<fieldset style="display: inline-block;">
  <legend>文章列表</legend>
  <div id="content">

  </div>
</fieldset>
<script>
  $(".type").on("click",function () {
    $("#type").text($(this).text());
    getList($(this).data("type"));
  })
function getList(type) {
  $.get("./api/get_list.php",{type},(list)=>{
    $("#content").html(list);
  })
}
function getNews(id) {
  $.get("./api/get_news.php",{id},(news)=>{
    $("#content").html(news);
  })
}
</script>