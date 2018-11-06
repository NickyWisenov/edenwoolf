<?php

include_once 'database.php';
include_once('PHPMailer/PHPMailer.php');

function siteURL() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    return $protocol;
}

define('SITE_URL', siteURL());
define('HOME_URL', SITE_URL . $_SERVER['SERVER_NAME'] . '/web/');

function SendMail($data) {
    $template = '<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    </head>
    <body>
        <table style="max-width: 620px; width: 100%; margin: 0 auto; border-collapse: collapse; border: none; font-family:verdana; background-color: #fff; border: transparent; font-family:Arial, Helvetica, sans-serif;">
            <tbody>
            <tr>
                <td style="padding: 15px 30px;background-color: #284039; text-align: center;"><img src="' . HOME_URL . 'frontend/images/mail-logo.png" alt="" ></td>
            </tr>
            <tr>
                <td colspan="2" style="padding:40px 30px; text-align: center;color: #000;vertical-align: middle;">
                    <div style="color: #000;font-size: 22px;"> Hi ' . $data['data']['NAME'] . ', <br/> There are carers in your area who meet your requirements. Please see below </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;background-color: #e7ffff; padding:20px 15px 5px;">
                    ' . $data['data']['CONTENT'] . '
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;padding: 8px 15px;background-color: #e7ffff;color:#4d4a4a;font-size:13px;line-height: 20px;">
                    {{email_message}} 
                </td>
            </tr>
            <tr>
                    <td colspan="2" style="text-align: center; padding:10px; background-color: #e7ffff;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border-top: 1px solid #dcdcdc;padding-top: 10px;">
                            <tr>
                                <td style="text-align:left;">
                                    <div style="text-align:left; color: #010101; padding-bottom:7px; font-size: 13px; font-weight:500;">Sent by EdenWoolf Team </div>
                                    <div style="text-align:left; color: #383636; padding-bottom: 10px; font-size: 12px;">Copyright © 2018 Edenwolf. All rights reserved.</div>
                                </td>
                                <td style="text-align:right; width:15%;">
                                    <table width="80" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td><a href="#"><img src="' . HOME_URL . 'frontend/images/soc-f.png" alt=""></a></td>
                                            <td><a href="#"><img src="' . HOME_URL . 'frontend/images/soc-t.png" alt=""></a></td>
                                            <td><a href="#"><img src="' . HOME_URL . 'frontend/images/soc-p.png" alt=""></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
    $content = $data['data']['message'];
//    $headers = "MIME-Version: 1.0" . "\r\n";
//    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//    $headers .= 'From: admin@edenwoolf.com' . "\r\n" .
//            'Reply-To: no-reply@edenwoolf.com' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
    $va = str_replace('{{email_message}}', $content, $template);
//    return mail($data['to'], $data['subject'], $va, $headers);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@edenwoolf.com';
    $mail->Password = 'qxvbluxtqkerqtqn';
    $mail->AddReplyTo('no-reply@edenwoolf.com', 'no-reply@edenwoolf.com');
    $mail->SetFrom('admin@edenwoolf.com', 'admin@edenwoolf.com');
    $mail->Subject = $data['subject'];
//    $mail->Body = $va;
    $mail->AddAddress($data['to'], $data['to']);
    $mail->WordWrap = 50;
    $mail->MsgHTML($va);
//    $mail->AddAttachment("test.pdf", "test.pdf");
    return $mail->Send();
}

function get_email_data($code, $replacedata = array()) {
    $sql = "SELECT * FROM email WHERE email_code = '$code'";
    $result = mysql_query($sql);
    $email_data = mysql_fetch_assoc($result);
    $email_msg = "";
    $email_array = array();
    $email_msg = $email_data['body'];
    $subject = $email_data['subject'];
    if (!empty($replacedata)) {
        foreach ($replacedata as $key => $value) {
            $email_msg = str_replace("{{" . $key . "}}", $value, $email_msg);
        }
    }
    return array('body' => $email_msg, 'subject' => $subject);
}

?>