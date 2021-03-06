<?
   session_start();
   
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "../CTransactions.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $trans=new CTransactions($db, $template);
   
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MaskNetwwork - All transactions</title>
<link rel="stylesheet" href="../../../style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="../../../dd.js" type="text/javascript"></script>
<script src="../../../utils.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">$(document).ready(function() { $("body").tooltip({ selector: '[data-toggle=tooltip]' }); });</script>


</head>
<center>
<body background="../../template/template/GIF/back.png" style="margin-top:0px; margin-left:0px; margin-right:0px; ">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="66" align="center" valign="top" background="../../template/template/GIF/top_bar.png" style="background-position:center"><table width="1020" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td align="left">
            <?
			    $template->showTopMenu();
			?>
            </td>
            </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="1018" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="800" align="center" valign="top" background="../../template/template/GIF/back_middle.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="205" height="18" align="right" valign="top"><table width="201" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td height="170" align="center" valign="middle" style="border-bottom-width:1px; border-bottom-style:inset; border-bottom-color:#ffffff;">
                  <?
				     $template->showBalancePanel();
				  ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <?
			   $trans->showLeftMenu(1);
			?>
            </td>
            <td width="610" height="1000" align="center" valign="top">
           
            <?
			   $template->showHelp("Below the last transactions executed are displayed. A transaction is confirmed in the network in about 2 minutes. Then, the transaction is final and it cannot be reversed. The transactions can have attached data such as a message or other information.");
			   
			   if ($_REQUEST['act']!="send_coins" && 
			       $_REQUEST['act']!="send_otp_coins" && 
				   $_REQUEST['act']!="send_req_coins")
			      $trans->showTrans("ID_ALL");
			   else
			   {
				  if ($_REQUEST['act']=="send_coins")
		          
				  // Simple send  
				  $trans->sendCoins($_REQUEST['dd_net_fee'], 
			                        $_REQUEST['dd_from'], 
								    $_REQUEST['txt_to'], 
								    $_REQUEST['txt_msk'], 
								    "MSK", 
								    $_REQUEST['txt_mes'], 
								    $_REQUEST['txt_escrower']);
				 
				 // OTP ?
				 if ($_REQUEST['act']=="send_otp_coins")
				 $trans->sendCoins($_REQUEST['h_net_fee_adr'], 
			                        $_REQUEST['h_from_adr'], 
								    $_REQUEST['h_to_adr'], 
								    $_REQUEST['h_amount'], 
								    "MSK", 
								    $_REQUEST['h_mes'], 
								    $_REQUEST['h_escrower'],
									$_REQUEST['txt_old_pass']);
									
				 // Request data ?
				 if ($_REQUEST['act']=="send_req_coins")
				 $trans->sendCoins($_REQUEST['h_net_fee_adr'], 
			                        $_REQUEST['h_from_adr'], 
								    $_REQUEST['h_to_adr'], 
								    $_REQUEST['h_amount'], 
								    "MSK", 
								    $_REQUEST['h_mes'], 
								    $_REQUEST['h_escrower'],
									$_REQUEST['h_old_pass']);
			   }
			   
			    if ($_REQUEST['act']=="send_block")
			     {
			       $db->sendBlock();
			       $template->showOK("Your request has been successfully recorded"); 
			      }
				  
				  // Data modal
				  $trans->showReqDataModal();
			?>
            
            </td>
            <td width="203" align="center" valign="top">
            <?
			   $template->showRightPanel();
			   $template->showAds();
			?>
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="0"><img src="../../template/template/GIF/bottom_sep.png" width="1018" height="20" alt=""/></td>
    </tr>
    <tr>
      <td height="50" align="center" background="../../template/template/GIF/bottom_middle.png">
      <?
	     $template->showBottomMenu();
	  ?>
      </td>
    </tr>
    <tr>
      <td height="0"><img src="../../template/template/GIF/bottom.png" width="1018" height="20" alt=""/></td>
    </tr>
  </tbody>
</table>
</body>
</center>
</html>