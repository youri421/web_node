<?
   session_start();
   
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "../CApp.php";
   include "CGlobals.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $app=new CApp($db, $template);
   $globals=new CGlobals($db, $template, $_REQUEST['ID']);
   
   if (!isset($_SESSION['userID'])) $this->kern->redirect("../../../index.php");
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

<style type="text/css" media="screen">
    #globals_code { 
        width:90%;
		height:600px;
		margin:0 auto;
    }
</style>

</head>

<body>

<?
   $template->showTopBar("app");
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
     $template->showLocation("../../app/mine/index.php", "My Applications", "", "Global Variables");
	 
	 // Menu
	 $template->showNav(3,
	                    "edit.php?ID=".$_REQUEST['ID'], "Source Code", "",
	                    "storage.php?ID=".$_REQUEST['ID'], "Storage", "",
						"globals.php?ID=".$_REQUEST['ID'], "Globals", "");
	 print "<br>";
	 
	 switch ($_REQUEST['act'])
	 {
	    case "add" : $globals->addGlobal($_REQUEST['ID'],
		                                $_REQUEST['dd_var_fee'],
                                        $_REQUEST['dd_var_type'],
                                        $_REQUEST['txt_var_id'],
                                        $_REQUEST['txt_var_name'],
                                        $_REQUEST['txt_var_desc'],
                                        $_REQUEST['txt_min_val'],
                                        $_REQUEST['txt_max_val'],
                                        $_REQUEST['txt_val'],
                                        $_REQUEST['txt_val_str']);
				 break;
				 
		case "del" : $globals->removeGlobal($_REQUEST['par_1']);
		             break;
	 }
	 
	 $globals->showPage();
	 //$globals->toJSON();
	 
	
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
