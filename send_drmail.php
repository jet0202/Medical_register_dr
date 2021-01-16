<?php

require_once 'vendor/autoload.php';

use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

include 'Config.php';

// $sql = "SELECT * FROM registered_doctors WHERE dr_email<>''";
$sql = "SELECT * FROM registered_doctors WHERE dr_email = 'jeremy.thompson@barbados.gov.bb'";
$result = mysqli_query($conn, $sql);

$numrows = mysqli_num_rows($result);

if($numrows > 0){
    while ($row = mysqli_fetch_assoc($result)) {

        $fname = $row['dr_fname'];
        $surname = $row['dr_surname'];
        $fullname = $fname." ".$surname;
        $reg_no = $row['reg_no'];
        $email = $row['dr_email'];
        $total_credits = $row['Num_of_credits'];

        if($total_credits > 30){
            $remaining_credits = 0;
        }elseif($total_credits <= 30){
            $remaining_credits = 30 - $total_credits;
        }
        

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("barbados_medical_council@barbados.gov.bb", "Administrator");
        $email->setSubject("Barbados Medical Council - Credit count");
        $email->addTo("jeremy.thompson@barbados.gov.bb", $fullname);
        $email->addContent(
            "text/html",
            "<p><b>Dear $fullname</b>,</p><br>"
                . "<p>This email is to keep you updated about the amount of credits you currently require to be able to register for the upcoming year.</p>
                <p>The total number of credits you currently have are - <u><b>$total_credits</b></u></p>
                <p>Therefore, you will require <u><b>$remaining_credits</b></u> credits to be able to register for the upcoming year.</p>
                <center><p>Yours faithfully,</p>"
                
        );

        $apiKey = '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';
        $sendgrid = new \SendGrid($apiKey);
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
            // header("Location: https://www.google.com");
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}



?>