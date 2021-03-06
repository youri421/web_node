<?
    session_start();
    
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "CMyFeeds.php";
   include "CFeed.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $my_feeds=new CMyFeeds($db, $template);
   $feed=new CFeed($db, $template);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><? print $_REQUEST['sd']['website_name']; ?></title>
<script src="../../../flat/js/vendor/jquery.min.js"></script>
<script src="../../../flat/js/flat-ui.js"></script>
<script src="../../../utils.js"></script>
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
   .font_12 { font-size:20px;  }
   .font_10 { font-size:18px;  }
   .font_14 { font-size:22px;  }
}

</style>

</head>

<body>

<?
   $template->showTopBar("trade");
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
     $template->showLocation("../../assets/feeds/index.php", "Data feeds", "", "Feed Details");
	 
	 // Details
	 $feed->showPanel($_REQUEST['symbol']);
	 
	 // Modal
	 $feed->showNewFeedBranchModal($_REQUEST['symbol']);
	 
	 // But
	 $feed->showNewBranchBut($_REQUEST['symbol']);
	 
	 // New branch ?
	 switch ($_REQUEST['act'])
	 {
	   case "new_branch" :   $feed->newBranch($_REQUEST['dd_branch_fee_adr'], 
	                                          $_REQUEST['feed_symbol'], 
				                        	  $_REQUEST['txt_branch_name'], 
						                      $_REQUEST['txt_branch_desc'], 
						                      $_REQUEST['dd_branch_type'], 
						                      $_REQUEST['txt_branch_rl'], 
						                      $_REQUEST['txt_branch_symbol'], 
						                      $_REQUEST['txt_branch_fee'], 
						                      $_REQUEST['txt_branch_days']);
							break;
						
	   case "vote" : $template->vote($_REQUEST['dd_vote_net_fee'], 
		                            $_REQUEST['dd_vote_adr'], 
				                    $_REQUEST['vote_target_type'], 
				                    $_REQUEST['vote_targetID'], 
				                    $_REQUEST['vote_type']);
				     break;
	 }
	 
	// Show branches
	$feed->showBranches($_REQUEST['symbol']);
 ?>
 
 


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
