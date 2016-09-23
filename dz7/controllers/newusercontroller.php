<?php
class newuserController extends Controller {
	public function indexAction() {
		extract($_POST, EXTR_OVERWRITE);
		require_once 'models/users.php';

		$ud = users::where('login', '=', $login)->get();
		$error = true;
		$errorcode = 'Пользователь с таким именем уже существует';
		if ((!isset($ud))||(empty($ud))||(count($ud)==0)) {
			if($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=6LerCioTAAAAAPJBRPWQhS-hSs2XKdGAftFYI-AJ&response=".$_POST['g-recaptcha-response']);
				$out = curl_exec($curl);
				$capcha = json_decode($out, true);
				if ($capcha['success']) {
					$users = new users();
					$users->login = $login;
					$users->password = $password;
					$users->ip = $_SERVER['REMOTE_ADDR'];
					if ($users->save()) {
						$mail = new PHPMailer;
						//$mail->SMTPDebug = 3;                               // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'forloftphp';                 // SMTP username
						$mail->Password = 'forloftphpPassword';                           // SMTP password
						$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to

						$mail->setFrom('forloftphp@yandex.ru', 'phpdz06');
						$mail->addAddress($email);               // Name is optional
						$mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Регистрация в домашнем задании';
						$mail->Body    = 'Уважаемый <b>'.$login.'</b>! Вы только что зарегистрировались. Возрадуемся!';
						$mail->AltBody = 'Вы только что зарегистрировались, ура!';

						if(!$mail->send()) {
							$errorcode = $mail->ErrorInfo;
						} else {
							$error = false;
							$errorcode = 'Вы успешно зарегистрированы. Можете пройти авторизацию';
						}
					} else {
						$errorcode = $user;
					}
				} else {
					$errorcode = 'Похоже, вы всё-таки, робот :(';
				}
			} else {
				$errorcode = 'Похоже, капча не хочет работать :(';
			}
		}

		echo json_encode(['error'=>$error, 'errorcode'=>$errorcode]);
	}
}