<?php 
require './db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $captchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
   $idea = isset($_POST['idea']) ? $_POST['idea'] : null;

   if ($captchaResponse === null || $idea === null) {
      http_response_code(403);
      exit;
   }

   $recaptchaSecretKey = '6LdiVEInAAAAAMvUkKGoGpGOUX4cKgJbKa7sg6Yo';
   $verificationURL = "https://www.google.com/recaptcha/api/siteverify";
   $data = [
      'secret' => $recaptchaSecretKey,
      'response' => $captchaResponse,
      'remoteip' => $_SERVER['REMOTE_ADDR'],
   ];

   $options = [
      'http' => [
         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
         'method' => 'POST',
         'content' => http_build_query($data),
      ],
   ];

   $context = stream_context_create($options);
   $verify = file_get_contents($verificationURL, false, $context);
   $captchaSuccess = json_decode($verify);

   $response = [];

   if ($captchaSuccess->success) {
      $sql = "INSERT INTO ideas (idea) values ('$idea')";
      if(mysqli_query($conn,$sql)) {
         $sqlElement = "SELECT * FROM ideas ORDER BY  id DESC LIMIT 1";
         $result = $conn->query($sqlElement);
         $element = $result->fetch_assoc();
         $element = '<div class="row suggestions">'.
                        '<div class="col-lg-1 col-md-2">'.
                           date("M j, Y", strtotime($element["created_at"])).
                        '</div>'.
                        '<div class="col">'.$element["idea"] . '</div>'.
                     '</div>';
         $response['success'] = true;
         $response['element'] =  $element;
         $response['message'] = "Thanks for your ideas. ❤️";
      } else {
         $response['success'] = false;
         $response['message'] = "Something went wrong.";
      }

   } else {
      $response['success'] = false;
      $response['message'] = "reCAPTCHA verification failed";
   }

   
   header('Content-Type: application/json');
   echo json_encode($response);
} else {
   http_response_code(403);
}
?>