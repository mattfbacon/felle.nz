<?php
$url = $_SERVER['REQUEST_URI'];
$redirect_path = "/tmp/felle.nz-redirect-url";
if ($url == "/r/change") {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		echo '<form method="POST"><input type="text" placeholder="full URL including protocol" name="url" required autocomplete="off"><input type="password" placeholder="password" name="password" required><input type="submit"></form>';
	} else {
		if (!password_verify($_POST['password'], "$2y$10$90XFbOVgiX265PmTpvuYIO3tnZytu5/7ZfsQVTQSHEUBs9LwfOUHS")) {
			http_response_code(403);
			echo 'skill issue';
			return;
		}
		$file = fopen($redirect_path, "w");
		fwrite($file, $_POST['url']);
		fclose($file);
		echo 'changed to ';
		echo $_POST['url'];
	}
} else {
	$file = fopen($redirect_path, "r");
	$fsize = filesize($redirect_path);
	$redirect_url = fread($file, $fsize);
	fclose($file);
	header('Location: ' . $redirect_url);
	exit();
}
?>
