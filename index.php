<?php 
require './db_connection.php';
$sql = "SELECT * FROM Ideas";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<link rel="stylesheet" href="./style.css" />
		<link rel="icon" type="image/x-icon" href="./favicon.ico" />
		<title>Athn - Athena</title>
	</head>
	<body>
		<div class="bg py-3">
			<div class="container bg-white py-3 rounded-3">
			<div class="nav p-3 rounded d-flex justify-content-center gap-3">
				<button class="py-1 px-2 rounded fs-4 active" data-target="suggest">Suggest</button>
				<button class="py-1 px-2 rounded fs-4" data-target="ideas">
					Ideas
					<div class="count"><?php echo $result->num_rows?></div>
				</button>
			</div>

			<div class="suggest">
				<div class="row justify-content-center">
					<p class="notice_title mt-3">Help Me Build My Homepage!</p>
					<p class="notice px-lg-5 px-2 px-md-3 px-2 my-lg-3 my-2">
						I'm currently out of ideas for my homepage, and I could really use your creative input. If you have
						a suggestion, please share it below. Your ideas will play a vital role in shaping my website!
					</p>
					<div class="col-md-8 col-11">
						<form>
							<textarea
								name="idea"
								placeholder="Type your suggestion here"
								class="w-100 border-black rounded border mt-3"
								rows="10"></textarea>
							<div class="g-recaptcha my-1" data-sitekey="6LdiVEInAAAAAGkGAJVHI8_qM1lJXXp8uoPnwnfs"></div>
							<p class="text-danger err_notice">Required</p>
							<button class="w-100 send">
								<span>Send</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g><circle cx="12" cy="3" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate0" attributeName="r" begin="0;svgSpinners12DotsScaleRotate2.end-0.5s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="16.5" cy="4.21" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate1" attributeName="r" begin="svgSpinners12DotsScaleRotate0.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="7.5" cy="4.21" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate2" attributeName="r" begin="svgSpinners12DotsScaleRotate4.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="19.79" cy="7.5" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate3" attributeName="r" begin="svgSpinners12DotsScaleRotate1.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="4.21" cy="7.5" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate4" attributeName="r" begin="svgSpinners12DotsScaleRotate6.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="21" cy="12" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate5" attributeName="r" begin="svgSpinners12DotsScaleRotate3.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="3" cy="12" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate6" attributeName="r" begin="svgSpinners12DotsScaleRotate8.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="19.79" cy="16.5" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate7" attributeName="r" begin="svgSpinners12DotsScaleRotate5.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="4.21" cy="16.5" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate8" attributeName="r" begin="svgSpinners12DotsScaleRotatea.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="16.5" cy="19.79" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotate9" attributeName="r" begin="svgSpinners12DotsScaleRotate7.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="7.5" cy="19.79" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotatea" attributeName="r" begin="svgSpinners12DotsScaleRotateb.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><circle cx="12" cy="21" r="1" fill="#000"><animate id="svgSpinners12DotsScaleRotateb" attributeName="r" begin="svgSpinners12DotsScaleRotate9.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".27,.42,.37,.99;.53,0,.61,.73" values="1;2;1"/></circle><animateTransform attributeName="transform" dur="6s" repeatCount="indefinite" type="rotate" values="360 12 12;0 12 12"/></g></svg>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="ideas">
				<div class="row justify-content-center">
					<p class="notice_title mt-3">Check Out These Cool People's Ideas</p>
					<div class="idea_container">
						<?php
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<div class="row suggestions">';
								echo '<div class="col-lg-1 col-md-2">' . date("M j, Y", strtotime($row["created_at"])) . '</div>';
								echo '<div class="col">' . $row["idea"] . '</div>';
								echo '</div>';
							}
						} else {
							echo 
							'<div class="noIdeas p-5 my-5">
								<img src="https://i.giphy.com/media/ENAoKdrOYXYb0SuKB8/giphy.webp"/>
								<span>No one haven\'t suggest anything.</span>
								<a>wanna suggest?</a>
							</div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<span class="watermark">01010100</span>
	</body>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="./script.js"></script>
</html>
