<?
    session_start();
    
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "../CAssets.php";
   include "CSpecMkts.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $assets=new CAssets($db, $template);
   $mkts=new CSpecMkts($db, $template);
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
   .font_12 { font-size:20px;  }
   .font_10 { font-size:18px;  }
   .font_14 { font-size:22px;  }
}

</style>

</head>

<body>

<?
   $template->showTopBar(4);
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
     $template->showLocation("../../assets/assets/index.php", "Speculative Markets", "", "Markets");
	 
	  // Menu
	 if ($_REQUEST['ud']['ID']>0)
	 $template->showNav(1,
	                    "../margin_mkts/index.php", "Markets", "",
	                    "../margin_mkts/positions.php", "My Positions", "",
						"../margin_mkts/my_mkts.php", "My Markets", "");
	else
	$template->showNav(1,
	                    "../margin_mkts/index.php", "Markets", "",
	                    "../margin_mkts/positions.php", "Top Positions", "");
	 
	 
	 // Help
	 $template->showHelp("In the real world trading on margin means borrowing money from your broker to buy a stock and using your investment as collateral. Investors generally use margin to increase their purchasing power so that they can own more stock without fully paying for it. Usually you will pay interest for borrowed money. Over Masknetwork, a margin market alows you to place leveraged bets against the market owner. Margin markets prices are provided by data feeds. All your losses are market owner's gains and vice versa. Below are listed available margin markets. ");
	
	// Target
	if (!isset($_REQUEST['target']))
	   $_REQUEST['target']="ID_CRYPTO";
	
	// Selector
	$assets->showSelector($_REQUEST['target']);
	
	$mkts->showMarkets(false, $_REQUEST['target']); 
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
