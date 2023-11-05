$(document).ready(function () {
	$(".idea_container").append($(".idea_container").children().get().reverse());

	$(".nav button").click(function () {
		if (!$(this).hasClass("active")) {
			$(".nav button").removeClass("active");
			$(this).addClass("active");

			$(".suggest, .ideas").hide();
			target = $(this).data("target");
			$(`.${target}`).fadeIn();
		}
	});

	$("[name=idea]").on("input change  blur", function () {
		$(this).val() == "" ? $(".err_notice").fadeIn() : $(".err_notice").hide();
	});

	$("form").submit(function (e) {
		e.preventDefault();
		data = $(this).serialize();
		if ($("[name=idea]").val() && grecaptcha.getResponse()) {
			$(".send").attr("disabled", true).children("span").hide().end().children("svg").show();
			$.ajax({
				url: "./post.php",
				data: data,
				method: "POST",
				success(res) {
					if (res.success) {
						formClear();
						$(".count").text(Number($(".count").text()) + 1);
						$(".idea_container").prepend(res.element);
						toast(res.message);
						detectNone();
					} else {
						formClear();
						toast("Something Went Wrong");
					}
					$(".send").attr("disabled", false).children("span").show().end().children("svg").hide();
				},
				error(xhr, status, error) {
					formClear();
					toast(error);
					console.error(error, status, xhr);
					$(".send").attr("disabled", false).children("span").show().end().children("svg").hide();
				},
			});
		} else {
			if (!grecaptcha.getResponse()) {
				$(".err_notice").text("Please validate reCAPTCHA");
			}
			if (!$("[name=idea]").val()) {
				$(".err_notice").text("Please provide your ideas to submit.");
			}

			$(".err_notice").fadeIn();
		}
	});

	const formClear = () => {
			grecaptcha.reset();
			$("[name=idea]").val("");
			$(".err_notice").hide();
		},
		toast = (text) => {
			Toastify({
				gravity: "bottom",
				position: "center",
				text: text,
			}).showToast();
		};

	(detectNone = () => {
		if (Number($(".count").text()) > 0) {
			$(".noIdeas").detach();
		}
	})();

	$(".noIdeas a").click(function () {
		$('[data-target="suggest"]').click();
		$("[name='idea']").focus();
	});
});
