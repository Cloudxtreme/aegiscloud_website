<?php
include("class.phpmailer.php"); //匯入PHPMailer類別
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['phone']) 		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
  !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
//  !filter_var($_POST['name'],FILTER_VALIDATE_NAME)
//  !filter_var($_POST['phone'],FILTER_VALIDATE_PHONE)

)

//  {
//	echo "No arguments Provided!";
//	return false;
//   }
	
$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
//$to = 'your-email@your-domain.com'; // PUT YOUR EMAIL ADDRESS HERE

$mail= new PHPMailer(); //建立新物件
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "tls"; // Gmail:ssl, office365:tls
$mail->Host = "smtp.office365.com"; //SMTP server
$mail->Port = 587;  //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8"; //郵件編碼
 
$mail->Username = "shuqun.liu@aegiscloud.com.tw"; //office365 account
$mail->Password = "Kcid1219"; //

$mail->From = "shuqun.liu@aegiscloud.com.tw"; //office365 account
$mail->FromName = "Online Customer Service"; //寄件者姓名
 
$mail->Subject ="Business Contact Form: ".$name; // EDIT THE EMAIL SUBJECT LINE HERE
//$mail->Body = "You have received a new message from your website's contact form."."<br>Here are the details:<br>"."<br>Name: ".$name."<br>Phone: ".$phone."<br>Email: ".$email_address."<br><br>Message: <br>".$message;
$mail->Body = "You have received a new message from your website's contact form."."<br>Here are the details:<br>"."<br>Name: ".$name."<br>Email: ".$email_address."<br><br>Message: <br>".$message;
$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress("purevita@gmail.com"); //收件者郵件及名稱
 
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
} else {
	echo "<div align=center>感謝您的回覆，我們將會盡速處理!</div>";
}
return true;		
?>
