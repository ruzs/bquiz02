<fieldset>
  <legend>會員登入</legend>
  <table>
    <tr>
      <td>帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>
        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
      </td>
      <td>
        <a href="?do=forgot">忘記密碼</a>
        <a href="?do=reg">尚未註冊</a>
      </td>
    </tr>
  </table>
</fieldset>
<script>
  function reset() {
    $("#acc,#pw").val("");
  }

  function login() {
    let user = {
      acc: $("#acc").val(),
      pw: $("#pw").val()
    }
    $.post("./api/chk_acc.php", user, (result) => {
      console.log(result);
      if (parseInt(result) === 1) {
        //有此帳號
        $.post("./api/chk_acc.php", user, (result) => {
          console.log(result);
          if (parseInt(result) === 1) {
            // 帳密正確
            if (user.acc === "admin") {
              location.href = 'back.php';
            } else {
              location.href = 'index.php';
            }
          } else {
            // 密碼錯誤
            alert("密碼錯誤");
            reset()
          }
        })
      } else {
        //無此帳號
        alert("查無此帳號");
        reset()
      }
    })
    console.log(user);
  }
</script>