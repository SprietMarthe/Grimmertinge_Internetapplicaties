<?php

	if( empty( $_POST['token'] ) ){
		echo '<span class="notice">Error!</span>';
		exit;
	}
	if( $_POST['token'] != 'FsWga4&@f6aw' ){
		echo '<span class="notice">Error!</span>';
		exit;
	}

	$name = $_POST['first_name'];
	$from = 'scoutsgrimmertinge@gmail.com'
	$phone = $_POST['gsm_ouder'];
	$subject = ' Bevestigingsmail inschrijving lid bij scouts grimmertinge';

	$headers ="From: Form Contact <$from>\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/html; charset=iso 8859-1";

	ob_start();
	?>
		Hi imransdesign!<br /><br />
		<?php echo ucfirst( $name ); ?>  has sent you a message via contact form on your website!
		<br /><br />

		Name: <?php echo ucfirst( $first_name ); ?><br />
		Email: <?php echo $from; ?><br />
		Phone: <?php echo $gsm_ouder; ?><br />
		<?php echo $message; ?>
		<br />
		<br />
		============================================================
	<?php
	$body = ob_get_contents();
	ob_end_clean();

	$to = $_POST['email_ouder'];

	$s = mail($to,$subject,$body,$headers,"-t -i -f $from");

	if( $s == 1 ){
		echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Thank You!</h3>Your message has been sent successfully.</div>';
	}else{
		echo '<div>Your message sending failed!</div>';
	}


?>
