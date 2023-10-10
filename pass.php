<?php
$characters = "abcdefghijklmnopqrtsuvwxyzABCDEFGHIJKLMNOPQRTSUVWXYZ0123456789!@#$%^&*()[]{}/=?+`~-_'\",<.>\\|";
$output = "";
while(strlen($output) < 40) {
	$output .= $characters[random_int(0, strlen($characters) - 1)];
}
echo '<p style="user-select: all">';
echo htmlspecialchars($output);
echo '</p>';
?>
