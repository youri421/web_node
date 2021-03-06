<?
   session_start();
   
   include "../../../kernel/db.php";
   include "../../../kernel/CUserData.php";
   include "../../../kernel/CSysData.php";
   include "../../template/template/CTemplate.php";
   include "../CApp.php";
   include "../write/CWrite.php";
   
   $db=new db();
   $template=new CTemplate($db);
   $ud=new CUserData($db);
   $sd=new CSysData($db);
   $app=new CApp($db, $template);
   $write=new CWrite($db, $template, $app);
   
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
   .font_14 { font-size:20px;  }
   .font_10 { font-size:18px;  }
   .font_14 { font-size:22px;  }
}


</style>

<style type="text/css" media="screen">
    #editor_code { 
        width:100%;
		height:200px;
		margin:0 auto;
    }
	
	#exec_log { 
        width:100%;
		height:600px;
		margin:0 auto;
    }
	
	#run_code { 
        width:100%;
		height:600px;
		margin:0 auto;
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
     $template->showLocation("../../app/write/index.php", "Applications", "", "Reference");
	 
	
 ?>
 
 <br>
 <table width="90%" border="0" cellpadding="0" cellspacing="0">
   <tbody>
     <tr>
       <td width="23%" align="left" valign="top">
       
       <?
	      $write->showRefMenu();
	   ?>
       
       </td>
       <td width="6%" align="right" valign="top">&nbsp;</td>
       <td width="71%" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
         <tbody>
           <tr>
             <td class="font_18"><strong>SUBSTR</strong></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td bgcolor="#f5f5f5" class="font_16" height="40px"><strong>&nbsp;&nbsp;SUBSTR dest, haystack, start, end</strong></td>
           </tr>
           <tr>
             <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
               <tbody>
                 <tr>
                   <td width="12%" align="right" valign="top" class="fnt_14">&nbsp;</td>
                   <td width="3%">&nbsp;</td>
                   <td width="85%" class="fnt_14">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="right" valign="top" class="fnt_14"><strong>dest</strong></td>
                   <td>&nbsp;</td>
                   <td class="fnt_14">The operand that will hold the result. It can be a register or a variable.</td>
                 </tr>
                 <tr>
                   <td colspan="3" align="right" valign="top" class="fnt_14"><hr></td>
                   </tr>
                 <tr>
                   <td align="right" valign="top" class="fnt_14"><strong>haystack</strong></td>
                   <td align="right" valign="top" class="fnt_14">&nbsp;</td>
                   <td align="left" valign="top" class="fnt_14">The input string. Must be one character or longer. It can be a register, a variable or a string.</td> 
                 </tr>
                 <tr>
                   <td colspan="3" align="right" valign="top" class="fnt_14">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="right" valign="top" class="fnt_14"><strong>start</strong></td>
                   <td align="right" valign="top" class="fnt_14">&nbsp;</td>
                   <td align="left" valign="top" class="fnt_14">The start position of substring inside haystack.It can be a register, a variable or an integer.</td>
                 </tr>
                 <tr>
                   <td colspan="3" align="right" valign="top" class="fnt_14">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="right" valign="top" class="fnt_14"><strong>end</strong></td>
                   <td align="right" valign="top" class="fnt_14">&nbsp;</td>
                   <td align="left" valign="top" class="fnt_14">The end position of substring inside haystack.It can be a register, a variable or an integer.</td>
                 </tr>
                 </tbody>
             </table></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td height="60px" align="center" bgcolor="#f5f5f5" class="fnt_14"><table width="90%" border="0" cellpadding="0" cellspacing="0">
               <tbody>
                 <tr>
                   <td>Returns the portion of <strong>haystack</strong> specified by the <strong>start</strong> and <strong>length</strong> parameters and stores the result into <strong>dest</strong> operand.</td>
                 </tr>
               </tbody>
             </table></td>
           </tr>
           <tr>
             <td height="50" class="fnt_14">&nbsp;</td>
           </tr>
           <tr>
             <td height="30" valign="top" class="fnt_14">Example</td>
           </tr>
           <tr>
             <td class="fnt_14" align="left">
             
             <div id="editor_code" align="left">// Application entry point
#start#

// Initialize r1
mov r1, 43.23
             
// change r1 to string
tostring r1
 </div>


           <script src="../write/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
           <script>
              var editor_code = ace.edit("editor_code");
              editor_code.setTheme("ace/theme/chrome");
              editor_code.getSession().setMode("ace/mode/assembly_x86");
			  editor_code.setShowPrintMargin(false);
			  
	 		  editor_code.getSession().on('change', function(e) 
			  {
                  $('#but_save').removeAttr('disabled'); 
				  $('#but_test').attr('disabled', 'disabled');
			  });
			   
           </script>
             
             </td>
           </tr>
           <tr>
             <td class="fnt_14">&nbsp;</td>
           </tr>
         </tbody>
       </table></td>
     </tr>
   </tbody>
 </table>
 <br>
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
