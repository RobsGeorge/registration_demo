<?php

function sendMail($msg,$subject,$mailto,$email_from){

// the message
    //$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);
    $headers = 'From: '.$email_from."\r\n";

// send email
    mail($mailto, $subject, $msg,$headers);

}

?>


<?php

sendMail("Your Mahragan Password: George2006", "Mahragan Player Password", "georgenagi777@gmail.com", "Mahragan2020");
echo "Sent Mail Successfully!";
?>
