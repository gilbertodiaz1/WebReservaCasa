<?php
require("include/class.phpmailer.php");
require("include/class.smtp.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->Username = "jose.gilbertopinto@gmail.com";
	$mail->Password = "gilberto.7";
	$mail->CharSet = "UTF-8";

	$nombre = $_POST['first_name'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$dest = "jose.gilbertopinto@gmail.com";
	$email = $_POST['email'];
	$asunto = 'Solicitud de información';
	$cuerpo = "<!DOCTYPE>
				<html>
				<head>
				<meta name='viewport' content='width=device-width' />
				<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
				<title>ZURBemails</title>
				<style>
				* {
					margin:0;
					padding:0;
				}
				* { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

				img {
					max-width: 100%;
				}
				.collapse {
					margin:0;
					padding:0;
				}
				body {
					-webkit-font-smoothing:antialiased; 
					-webkit-text-size-adjust:none; 
					width: 100%!important; 
					height: 100%;
				}
				a { color: #2BA6CB;}
				.btn {
					text-decoration:none;
					color: #FFF;
					background-color: #666;
					padding:10px 16px;
					font-weight:bold;
					margin-right:10px;
					text-align:center;
					cursor:pointer;
					display: inline-block;
				}
				p.callout {
					padding:15px;
					background-color:#ECF8FF;
					margin-bottom: 15px;
				}
				.callout a {
					font-weight:bold;
					color: #2BA6CB;
				}
				table.social {
					background-color: #ebebeb;
				}

				table.head-wrap { width: 100%;}
				.header.container table td.logo { padding: 15px; }
				.header.container table td.label { padding: 15px; padding-left:0px;}
				table.body-wrap { width: 100%;}
				table.footer-wrap { width: 100%;	clear:both!important;
				}
				.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
				.footer-wrap .container td.content p {
					font-size:10px;
					font-weight: bold;
				}
				h1,h2,h3,h4,h5,h6 {
				font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#857030;
				}
				h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }
				h1 { font-weight:200; font-size: 44px;}
				h2 { font-weight:200; font-size: 37px;}
				h3 { font-weight:500; font-size: 27px;}
				h4 { font-weight:500; font-size: 23px;}
				h5 { font-weight:900; font-size: 17px;}
				h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}
				.collapse { margin:0!important;}
				p, ul {
					margin-bottom: 10px;
					font-weight: normal;
					font-size:14px;
					line-height:1.6;
				}
				p.lead { font-size:17px; }
				p.last { margin-bottom:0px;}
				ul li {
					margin-left:5px;
					list-style-position: inside;
				}
				ul.sidebar {
					background:#ebebeb;
					display:block;
					list-style-type: none;
				}
				ul.sidebar li { display: block; margin:0;}
				ul.sidebar li a {
					text-decoration:none;
					color: #666;
					padding:10px 16px;
					margin-right:10px;
					cursor:pointer;
					border-bottom: 1px solid #777777;
					border-top: 1px solid #FFFFFF;
					display:block;
					margin:0;
				}
				ul.sidebar li a.last { border-bottom-width:0px;}
				ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}
				.container {
					display:block!important;
					max-width:600px!important;
					margin:0 auto!important; /* makes it centered */
					clear:both!important;
				}
				.content {
					padding:15px;
					max-width:600px;
					margin:0 auto;
					display:block; 
				}
				.content table { width: 100%; }
				.column {
					width: 300px;
					float:left;
				}
				.column tr td { padding: 15px; }
				.column-wrap { 
					padding:0!important; 
					margin:0 auto; 
					max-width:600px!important;
				}
				.column table { width:100%;}
				.social .column {
					width: 280px;
					min-width: 279px;
					float:left;
				}
				.clear { display: block; clear: both; }
				@media only screen and (max-width: 600px) {
					a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

					div[class='column'] { width: auto!important; float:none!important;}
					table.social div[class='column'] {
						width:auto!important;
					}
				}
				</style>
				</head>
				<body bgcolor='#FFFFFF' topmargin='0' leftmargin='0' marginheight='0' marginwidth='0'>
				<table class='head-wrap' bgcolor='#eeeeee'>
					<tr>
						<td></td>
						<td class='header container' align=''>
							<div class='content'>
								<table>
									<tr>
										<td><h1>Gold Coast Condo</h1></td>
									</tr>
								</table>
							</div>
						</td>
						<td></td>
					</tr>
				</table>
				<table class='body-wrap' bgcolor=''>
					<tr>
						<td></td>
						<td class='container' align='' bgcolor='#FFFFFF'>
							<div class='content'>
								<table>
									<tr>
										<td>
											<h2>Solicitud de información.</h2>
										</td>
									</tr>
								</table>
							</div>
							<div class='content'>
								<table bgcolor=''>
									<tr>
										<td>
											<h5>Nombre solicitante:</h5>
											<p class=''>$nombre</p>
										</td>
									</tr>
								</table>
							</div>
							<div class='content'>
							<table bgcolor=''>
								<tr>
									<td>
										<h5>Correo Electronico:</h5>
										<p class=''>$email</p>
									</td>
								</tr>
							</table>
						</div>
						<div class='content'>
							<table bgcolor=''>
								<tr>
									<td>
										<h5>Asunto:</h5>
										<p class=''>$subject</p>
									</td>
								</tr>
							</table>
						</div>
						<div class='content'>
							<table bgcolor=''>
								<tr>
									<td>
										<h5>Mensaje:</h5>
										<p class=''>$message</p>
									</td>
								</tr>
							</table>
						</div>
						</td>
						<td></td>
					</tr>
				</table>
				</body>
				</html>";
	$mail->From = $email;
	$mail->FromName = $nombre;
	$mail->Subject = $asunto;
	$mail->AltBody = "";
	$mail->MsgHTML($cuerpo);
	$mail->AddAddress("jose.gilbertopinto@gmail.com", "Jose Gilberto Pinto");
	$mail->IsHTML(true);

	if(!$mail->send()) {
		echo "No enviado";
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}

?>