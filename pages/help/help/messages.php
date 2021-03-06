<?
   session_start();
   
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "CHelp.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $help=new CHelp();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><? print $_REQUEST['sd']['website_name']; ?></title>
<script src="../../../flat/js/vendor/jquery.min.js"></script>
<script src="../../../flat/js/flat-ui.js"></script>
<link rel="stylesheet"./ href="../../../flat/css/vendor/bootstrap/css/bootstrap.min.css">
<link href="../../../flat/css/flat-ui.css" rel="stylesheet">
<link href="../../../style.css" rel="stylesheet">
<link rel="shortcut icon" href="../../../flat/img/favicon.ico">

<style>
@media only screen and (max-width: 1000px)
{
   .balance_usd { font-size: 40px; }
   .balance_msk { font-size: 40px; }
   #but_send { font-size:30px; }
   #td_balance { height:100px; }
   #div_ads { display:none; }
   .txt_help { font-size:20px;  }
   .font_14 { font-size:20px;  }
   .font_10 { font-size:18px;  }
   .font_14 { font-size:22px;  }
}

</style>

</head>

<body>

<?
   $template->showTopBar("help");
?>
 

 <div class="container-fluid">
 
 <?
    $template->showBalanceBar();
 ?>


 <div class="row">
 <div class="col-md-1">&nbsp;</div>
 <div class="col-md-8" align="center" style="height:100%; background-color:#ffffff">
 
 <?
     // Location
     $template->showLocation("../../help/help/index.php", "Help", "", "Messages");
	 
	 $help->showMenu(6);
 ?>
 
 <br><br>
 <table width="90%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
     <tr>
       <td><span class="font_18"><strong>Messaging</strong></span></td>
     </tr>
     <tr>
       <td ><hr></td>
     </tr>
     <tr>
       <td class="font_14">Communication with customers is essential, especially in the anonymous market, in which participants'confidence in our business partners may initially be reduced. For this we designed a messaging system with which you can send short and encrypted messages to any address.</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td class="font_14">Messages are encrypted using the recipient's public key and only the recipient can decrypt them. Also, sender’s anonymity is guaranteed. There is no IP address or other available information except the address that sent the message.</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td><span class="font_14">The cost of sending a message is 0.0001 MSK / message. You can send unlimited messages / day. </span></td>
     </tr>
     <tr>
       <td height="50">&nbsp;</td>
     </tr>
     <tr>
       <td><span class="font_16"><strong>Sending a message</strong></span></td>
     </tr>
     <tr>
       <td ><hr></td>
     </tr>
     <tr>
       <td class="font_14">To send a message, go to the Messages page (click Messages in the main menu bar). This page shows 
         the last messages received. Click Compose button. The following menu will be displayed:</td>
     </tr>
     <tr>
       <td height="30">&nbsp;</td>
     </tr>
     <tr>
       <td height="30" align="center"><img src="GIF/mes.png" class="img-responsive"/></td>
     </tr>
     <tr>
       <td height="30">&nbsp;</td>
     </tr>
     <tr>
       <td><span class="font_14"><strong>Network Fee Address</strong></span> <span class="font_14">- Any service as renting an address name or setting additional options must be paid. In this field you specify where the coins will be taken for the payment of this service.</span></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td><span class="font_14"><strong>Sender Address</strong></span> <span class="font_14">- The address you want to appear at sender</span></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td><span class="font_14"><strong>Recipient Address</strong></span> <span class="font_14">- The address who will receive the message.</span></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
   </tbody>
 </table>
 </div>
 <div class="col-md-2" id="div_ads"><? $template->showAds(); ?></div>
 <div class="col-md-1">&nbsp;</div>
 </div>
 </div>
 
 <?
    $template->showBottomMenu();
 ?>
 
</body>
</html>
