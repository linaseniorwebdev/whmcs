 <?php
 
 define("CLIENTAREA",true);
 //define("FORCESSL",true); // Uncomment to force the page to use https://
 
 require("init.php");
 
 $ca = new WHMCS_ClientArea();
 
 $ca->setPageTitle("Team Members");

 
 $ca->addToBreadCrumb('index.php',$whmcs->get_lang('globalsystemname'));
 
 $ca->addToBreadCrumb('team.php','Our Team');
 
 $ca->initPage();
 
 //$ca->requireLogin(); // Uncomment this line to require a login to access this page
 
 # To assign variables to the template system use the following syntax.
 # These can then be referenced using {$variablename} in the template.
 
 $ca->assign('variablename', $value);

$result = mysql_query("SELECT tp.type,tp.msetupfee,dp.extension FROM tblpricing as tp
inner join tbldomainpricing as dp on dp.id = tp.relid
where relid In (select id from tbldomainpricing)
                and currency=1");
				
				
					/*$result = mysql_query("SELECT tp.type,tp.msetupfee,dp.extension FROM tblpricing as tp
inner join tbldomainpricing as dp on dp.id = tp.relid
where relid In (select id from tbldomainpricing)");*/

 
 //$row = mysql_fetch_assoc($result);
  //echo '<pre>about'.print_r($row,true).'</pre>';
    while($row = mysql_fetch_assoc($result))
    {
		$Rows[$row['extension']][$row['type']] = $row['msetupfee'];
		
	}
	//echo '<pre>Rows'.print_r($Rows,true).'</pre>';
	

 $ca->assign('Rows', $Rows);


 # Check login status
 if ($ca->isLoggedIn()) {
 
   # User is logged in - put any code you like here
 
   # Here's an example to get the currently logged in clients first name
 
   $result = mysql_query("SELECT firstname FROM tblclients WHERE id=".$ca->getUserID());
   $data = mysql_fetch_array($result);
   echo '<pre>'.print_r($data,true).'</pre>';
   $clientname = $data[0];
 
   $ca->assign('clientname', $clientname);
 
 } else {
 
   # User is not logged in
 
 }
 
 # Define the template filename to be used without the .tpl extension
 
 $ca->setTemplate('team');
 
 $ca->output();
 
 ?>