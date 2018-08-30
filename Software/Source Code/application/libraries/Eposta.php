<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-16 23:27:04
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   tepeu
 * @Last Modified time: 2018-08-29 21:06:39
 */
class Eposta
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function passwordReset($name, $hash, $email)
	{
		$this->ci->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'in-v3.mailjet.com';
		$config['smtp_user'] = '2c10fe9be12813d2ca6b8e1d66967944';
		$config['smtp_pass'] = '90d924e89018cac5874a19b5b527cd98';
		$config['smtp_port'] = 	587;
		$config['mailtype']  = 'html';
		$this->ci->email->initialize($config);
		$this->ci->email->from('no-reply@yazilim.tk');
		$this->ci->email->to($email);
		$this->ci->email->subject('Şifre Sıfırlama');
		$this->ci->email->message('<!doctype html><html>
  		<head><meta name="viewport" content="width=device-width"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Şifre Sıfırlama</title>
    	<style>
	    @media only screen and (max-width: 620px) {
	      table[class=body] h1 {
	        font-size: 28px !important;
	        margin-bottom: 10px !important;
	      }
	      table[class=body] p,
	            table[class=body] ul,
	            table[class=body] ol,
	            table[class=body] td,
	            table[class=body] span,
	            table[class=body] a {
	        font-size: 16px !important;
	      }
	      table[class=body] .wrapper,
	            table[class=body] .article {
	        padding: 10px !important;
	      }
	      table[class=body] .content {
	        padding: 0 !important;
	      }
	      table[class=body] .container {
	        padding: 0 !important;
	        width: 100% !important;
	      }
	      table[class=body] .main {
	        border-left-width: 0 !important;
	        border-radius: 0 !important;
	        border-right-width: 0 !important;
	      }
	      table[class=body] .btn table {
	        width: 100% !important;
	      }
	      table[class=body] .btn a {
	        width: 100% !important;
	      }
	      table[class=body] .img-responsive {
	        height: auto !important;
	        max-width: 100% !important;
	        width: auto !important;
	      }
	    }
	    @media all {
	      .ExternalClass {
	        width: 100%;
	      }
	      .ExternalClass,
	            .ExternalClass p,
	            .ExternalClass span,
	            .ExternalClass font,
	            .ExternalClass td,
	            .ExternalClass div {
	        line-height: 100%;
	      }
	      .apple-link a {
	        color: inherit !important;
	        font-family: inherit !important;
	        font-size: inherit !important;
	        font-weight: inherit !important;
	        line-height: inherit !important;
	        text-decoration: none !important;
	      }
	      .btn-primary table td:hover {
	        background-color: #34495e !important;
	      }
	      .btn-primary a:hover {
	        background-color: #34495e !important;
	        border-color: #34495e !important;
	      }
	    }
	    </style>
  		</head><body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    	<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      	<tr>
        	<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        	<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          	<div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Merhaba '.$name.',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Aşağıdaki butona tıklayarak şifrenizi sıfırlayabilirsiniz. Bağlantı 20 dakika için geçerli olacaktır.</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="'.base_url('sifre-sifirla/'.$hash).'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Şifremi Sıfırla</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Bu bağlantıya sadece istek gönderen IP erişebilir.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Saygılarımızla.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">INNCREA</span>
		                  </td>
		                </tr>
		              </table>
		            </div>
		          </div>
		        </td>
		        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
		      </tr>
		    </table>
		  </body>
		</html>');
		if($this->ci->email->send()){
			return TRUE;
		}
		return FALSE;
	}
	public function sendUserMail($data)
	{
		$this->ci->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'in-v3.mailjet.com';
		$config['smtp_user'] = '2c10fe9be12813d2ca6b8e1d66967944';
		$config['smtp_pass'] = '90d924e89018cac5874a19b5b527cd98';
		$config['smtp_port'] = 	587;
		$config['mailtype']  = 'html';
		$this->ci->email->initialize($config);
		$this->ci->email->from('no-reply@yazilim.tk');
		$this->ci->email->to($data["musteri_mail"]);
		$this->ci->email->subject('Kullanıcı Bilgileri: '.$data["musteri_kAdi"]);
		$this->ci->email->message('<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <title>Kullanıcı Bilgileri</title>
  <!--[if !mso]><!-- -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
  #outlook a { padding: 0; }
  .ReadMsgBody { width: 100%; }
  .ExternalClass { width: 100%; }
  .ExternalClass * { line-height:100%; }
  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
  p { display: block; margin: 13px 0; }
</style>
<!--[if !mso]><!-->
<style type="text/css">
  @media only screen and (max-width:480px) {
    @-ms-viewport { width:320px; }
    @viewport { width:320px; }
  }
</style>
<!--<![endif]-->
<!--[if mso]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
<!--[if lte mso 11]>
<style type="text/css">
  .outlook-group-fix {
    width:100% !important;
  }
</style>
<![endif]-->
<style type="text/css">
  @media only screen and (min-width:480px) {
    .mj-column-per-100 { width:100%!important; }
  }
</style>
</head>
<body style="background: #F4F4F4;">
  
  <div class="mj-container" style="background-color:#F4F4F4;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="margin:0px auto;max-width:600px;background:transparent url(http://go.mailjet.com/tplimg/mtrq/b/ox8s/mg1qn.png) top center / auto repeat;"><!--[if mso | IE]>
      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;">
        <v:fill origin="0.5, 0" position="0.5,0" type="tile" src="http://go.mailjet.com/tplimg/mtrq/b/ox8s/mg1qn.png" />
        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
      <![endif]--><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent url(http://go.mailjet.com/tplimg/mtrq/b/ox8s/mg1qn.png) top center / auto repeat;" align="center" border="0" background="http://go.mailjet.com/tplimg/mtrq/b/ox8s/mg1qn.png"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td style="vertical-align:top;width:600px;">
      <![endif]--><div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;" align="left"><div style="cursor:auto;color:#5e6977;font-family:Arial, sans-serif;font-size:13px;line-height:24px;text-align:left;"><style></style><p style="text-align: center; margin: 10px 0;"><b><span style="font-size:28px"><span style="color:#ffffff">KULLANICI BİLGİLERİ</span></span></b></p></div></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table><!--[if mso | IE]>
        <p style="margin:0;mso-hide:all"><o:p xmlns:o="urn:schemas-microsoft-com:office:office"> </o:p></p>
        </v:textbox>
      </v:rect>
      <![endif]--></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="margin:0px auto;max-width:600px;background:#ffffff;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td style="vertical-align:top;width:600px;">
      <![endif]--><div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;" align="left"><div style="cursor:auto;color:#5e6977;font-family:Arial, sans-serif;font-size:13px;line-height:20px;text-align:left;"><style></style><p style="margin: 10px 0;"><span style="font-size:18px">Merhaba '.$data["musteri_adSoyad"].',</span></p><p style="margin: 10px 0;"><span style="font-size:18px">Giriş bilgileriniz aşağıdaki gibidir.</span></p><p style="margin: 10px 0;"><span style="font-size:18px">Kullanıcı Adı: '.$data["musteri_kAdi"].'</span></p><p style="margin: 10px 0;"><span style="font-size:18px">Şifre: '.$data["sifre"].'</span></p><p style="margin: 10px 0;"><span style="font-size:18px">Aşağıdaki linkten panele giriş yapabilirsiniz.</span></p><p style="margin: 10px 0;"><span style="font-size:18px">Giriş Link: <a target="_blank" href="http://'.base_url("giris").'">'.base_url("giris").'</a></span></p></div></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="margin:0px auto;max-width:600px;background:#ffffff;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td style="vertical-align:top;width:600px;">
      <![endif]--><div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:15px;padding-bottom:0px;" align="left"><div style="cursor:auto;color:#5e6977;font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;"><style></style><p style="margin: 10px 0;"><span style="font-size:18px">Saygılarımızla, Inncrea</span></p></div></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></div>
</body>
</html>');
		if($this->ci->email->send()){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file Eposta.php */
/* Location: ./application/libraries/Eposta.php */
