<div class="box">
  <div>請輸入信箱以查詢密碼</div>
  <div><input type="text"name="email"id="email"></div>
  <div id="result"></div>
  <div><button onclick="forgot()">尋找</button></div>
</div>
<script>
  function forgot() {
    $("#email").val();
    $.get('./api/forgot.php',{email:$("#email").val()},(result)=>{
      $("#result").html(result);
    })
  }
</script>