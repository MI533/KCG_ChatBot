$(document).ready(function () {
	$(document).ajaxStart(function () {
		$("#load").css("display", "block").hide().fadeIn(300);
	});
	$(document).ajaxComplete(function () {
		$("#load").css("display", "none").hide().fadeOut(300);

	});
});

$(function () {
	var INDEX = 0;
	var msg ="";
	$("#chat-submit").click(function (e) {
		e.preventDefault();
		msg = $("#chat-input").val();
		if (msg.trim() == '') {
			return false;
		}
		generate_message(msg, 'self');



		send();

	})

	function generate_message(msg, type) {
		INDEX++;
		var str = "";
		str += "<div id='cm-msg-" + INDEX + "' class=\"chat-msg " + type + "\">";
		str += "          <span class=\"msg-avatar\">";
		if (type == 'self') {
			str += "            <img src=\"assests/image/people1.png\">";
			$("#chat-input").val('');
		}else {
			str += "            <img src=\"assests/image/icon1.jpg\">";
		}
		
		str += "          <\/span>";
		str += "          <div class=\"cm-msg-text\">";
		str += msg;
		str += "          <\/div>";
		str += "        <\/div>";
		$(".chat-logs").append(str);
		$("#cm-msg-" + INDEX).hide().fadeIn(300);
		
		$(".chat-logs").stop().animate({
			scrollTop: $(".chat-logs")[0].scrollHeight
		}, 1000);
	}

	function send() {
		
		$.ajax({

			url: "../../msg.php?msg=" + msg,

			success: function (result) {
				
				generate_message(result, 'user');
			}
		});

	}
	$(document).delegate(".chat-btn", "click", function () {
		var value = $(this).attr("chat-value");
		var name = $(this).html();
		$("#chat-input").attr("disabled", false);
		generate_message(name, 'self');
	})

	$("#chat-circle").click(function () {
		$("#chat-circle").toggle('scale');
		$(".chat-box").toggle('scale');
	})

	$(".chat-box-toggle").click(function () {
		$("#chat-circle").toggle('scale');
		$(".chat-box").toggle('scale');
	})

})
