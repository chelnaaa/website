<?php
if( empty($_POST['token']) ){
	echo '<span class="notice">Error!</span>';
	exit;
}
if( $_POST['token'] != 'FsWga4&@f6aw' ){
	echo '<span class="notice">Error!</span>';
	exit;
}

$name = $_POST['name'];
$from = $_POST['email'];
$phone = $_POST['phone'];
$subject = stripslashes(nl2br($_POST['subject']));
$message = stripslashes(nl2br($_POST['message']));

// Nomor WhatsApp tujuan (format internasional tanpa +, jadi 62 untuk Indonesia)
$wa_number = '6282244101285';

// Buat isi pesan WhatsApp
$wa_message = "Halo, saya $name.%0A"
            ."Email: $from%0A"
            ."Telepon: $phone%0A"
            ."Subjek: $subject%0A"
            ."Pesan:%0A$message";

// Redirect ke WhatsApp
$wa_url = "https://wa.me/$wa_number?text=$wa_message";

// Tampilkan pesan sukses lalu redirect
echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Terima Kasih!</h3>Pesan kamu akan dikirim ke WhatsApp kami...</div>';
echo "<script>setTimeout(function(){ window.location.href='$wa_url'; }, 2000);</script>";
?>
