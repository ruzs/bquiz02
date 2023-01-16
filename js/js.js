// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}
$(document).ready(() => {
	$('.goods').on('click', function () {
		let news = $(this).data('news');
		let user = $(this).data('user');
		let num = parseInt($(this).siblings('.num').text())
		console.log(news, user, num)
		$.post("./api/good.php", { news, user }, () => {
			if ($(this).text() == "讚") {
				$(this).text("收回讚")
				$(this).siblings('.num').text(num + 1)
			}
			else {
				$(this).text("讚")
				$(this).siblings('.num').text(num - 1)
			}
		})
	})
})