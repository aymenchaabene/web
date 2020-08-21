
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'mailsetup/PHPMailerAutoload.php';

function sendnewslettre($subject="test",$fromname='Ben Ghorbel Meubles',$too='safwane.ettih@esprit.tn',$message='test')
{
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";

//enable this if you are using gmail smtp, for mandrill app it is not required
$mail->SMTPSecure = 'tls';                            

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "safou55wow@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "22101995";
//Set who the message is to be sent from
$mail->setFrom('newslettre@meublebenghorbel.com', $fromname);
//Set an alternative reply-to address
$mail->addReplyTo('reply-to@yoursitename.com', 'Reply-to Name');
//Set who the message is to be sent to
foreach ($too as $to)
{
$mail->addAddress($to, 'To Name');
}
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors

	$messagehtml.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Template 9</title>
    <style type="text/css">
      /* Client-specific Styles */
                /* Force Outlook to provide a "view in browser" menu link. */
               /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
               .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
               .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  */
               /*STYLES*/
               /*IPAD STYLES*/
               @media only screen and (max-width: 640px) {
               a[href^="tel"], a[href^="sms"] {
               text-decoration: none;
               color: #9ec459; /* or whatever your want */
               pointer-events: none;
               cursor: default;
               }
               .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
               text-decoration: default;
               color: #9ec459 !important;
               pointer-events: auto;
               cursor: default;
               }
               table[class=devicewidth] {width: 440px!important;text-align:center!important;}
               td[class=devicewidth] {width: 440px!important;text-align:center!important;}
               img[class=devicewidth] {width: 440px!important;text-align:center!important;}
               img[class=banner] {width: 440px!important;height:147px!important;}
               table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
               table[class=icontext] {width: 345px!important;text-align:center!important;}
               img[class="colimg2"] {width:420px!important;height:243px!important;}
               table[class="emhide"]{display: none!important;}
               img[class="logo"]{width:440px!important;height:110px!important;}
               }
               /*IPHONE STYLES*/
               @media only screen and (max-width: 480px) {
               a[href^="tel"], a[href^="sms"] {
               text-decoration: none;
               color: #9ec459; /* or whatever your want */
               pointer-events: none;
               cursor: default;
               }
               .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
               text-decoration: default;
               color: #9ec459 !important;
               pointer-events: auto;
               cursor: default;
               }
               table[class=devicewidth] {width: 280px!important;text-align:center!important;}
               td[class=devicewidth] {width: 280px!important;text-align:center!important;}
               img[class=devicewidth] {width: 280px!important;text-align:center!important;}
               img[class=banner] {width: 280px!important;height:93px!important;}
               table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
               table[class=icontext] {width: 186px!important;text-align:center!important;}
               img[class="colimg2"] {width:260px!important;height:150px!important;}
               table[class="emhide"]{display: none!important;}
               img[class="logo"]{width:280px!important;height:70px!important;}
               }
    </style>
  </head>
  <body style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;padding:0;width:100% !important">
    <!-- Start of preheader -->
    <table width="100%" bgcolor="#202020" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
      <tbody>
        <tr>
          <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
              <tbody>
                <tr>
                  <td width="100%" style="border-collapse:collapse">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                      <tbody>
                        <!-- Spacing -->
                        <tr>
                          <td width="100%" height="20" style="border-collapse:collapse"></td>
                        </tr>
                        <!-- Spacing -->
                        <tr>
                          <td style="border-collapse:collapse">
                            <table width="280" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                              <tbody>
                                <tr>
                                  <td align="left" valign="middle" style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #ffffff">
                                    '.$subject.'
                                             </td>
                                </tr>
                              </tbody>
                            </table>
                            <table width="280" align="left" border="0" cellpadding="0" cellspacing="0" class="emhide" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                              <tbody>
                                <tr>
                                  <td align="right" valign="middle" style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #ffffff">
                                    <a href="#" style="color:#9ec459;text-decoration:none;text-decoration:none !important;text-decoration: none; color: #ffffff">View Online </a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <!-- Spacing -->
                        <tr>
                          <td width="100%" height="20" style="border-collapse:collapse"></td>
                        </tr>
                        <!-- Spacing -->
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End of preheader -->
    <!-- Start of LOGO -->
    <table width="100%" bgcolor="#e8eaed" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
      <tbody>
        <tr>
          <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
              <tbody>
                <tr>
                  <td width="100%" style="border-collapse:collapse">
                    <table bgcolor="#e8eaed" width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                      <tbody>
                        <tr>
                          <!-- start of image -->
                          <td align="center" style="border-collapse:collapse">
                            <a target="_blank" href="#" style="color:#9ec459;text-decoration:none;text-decoration:none !important"><img width="600" border="0" height="150" alt="" style="outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;border:none;display:block; border:none; outline:none; text-decoration:none;" src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-9/13091943_10208341642292747_2517541640076371437_n.jpg?oh=3f1c78b354cd04a0b23340528b9e10f9&oe=579DEE7A" class="logo"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end of image -->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End of LOGO -->
    <!-- start textbox-with-title -->
    <table width="100%" bgcolor="#e8eaed" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
      <tbody>
        <tr>
          <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
              <tbody>
                <tr>
                  <td width="100%" style="border-collapse:collapse">
                    <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                      <tbody>
                        <!-- Spacing -->
                        <tr>
                          <td width="100%" height="20" style="border-collapse:collapse"></td>
                        </tr>
                        <!-- Spacing -->
                        <tr>
                          <td style="border-collapse:collapse">
                            <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                              <tbody>
                                <!-- Title -->
                                <tr>
                                  
                                </tr>
                                <!-- End of Title -->
                                <!-- spacing -->
                                <tr>
                                  <td height="5" style="border-collapse:collapse"></td>
                                </tr>
                                <!-- End of spacing -->
                                <!-- content -->
                                <tr>
                                  <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
                                    '.$message.'
                                             </td>
                                </tr>
                                <!-- End of content -->
                                <!-- Spacing -->
                                <tr>
                                  <td width="100%" height="5" style="border-collapse:collapse"></td>
                                </tr>
                                <!-- Spacing -->
                                <!-- button -->
                                <tr>
                                  <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight:bold; color: #333333; text-align:left;line-height: 24px;">
                                   
                                  </td>
                                </tr>
                                <!-- /button -->
                                <!-- Spacing -->
                                <tr>
                                  <td width="100%" height="20" style="border-collapse:collapse"></td>
                                </tr>
                                <!-- Spacing -->
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- end of textbox-with-title -->
    <!-- Start of 2-columns -->
    
    <table width="100%" bgcolor="#202020" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
      <tbody>
        <tr>
          <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
              <tbody>
                <tr>
                  <td width="100%" style="border-collapse:collapse">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                      <tbody>
                        <!-- Spacing -->
                        <tr>
                          <td width="100%" height="20" style="border-collapse:collapse"></td>
                        </tr>
                        <!-- Spacing -->
                        <tr>
                          <td align="center" valign="middle" style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #ffffff">
                            you have recevied this email because you have subscribed to newslettre@meublebenghorbel.com<br>
                             If you no longer wish to recive emails please  <a href="#" style="color:#9ec459;text-decoration:none;text-decoration:none !important;text-decoration: none; color: #9ec459">unsubscribe </a>
                          </td>
                        </tr>
                        <!-- Spacing -->
                        <tr>
                          <td width="100%" height="20" style="border-collapse:collapse"></td>
                        </tr>
                        <!-- Spacing -->
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End of postfooter -->
  </body>
</html>';

	
$mail->msgHTML($messagehtml);
	
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
}

?>

