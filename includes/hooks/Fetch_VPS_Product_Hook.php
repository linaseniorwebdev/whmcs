<?php

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaPage', 1, function ($vars) 
{
	
	
	//Make sure code executed only in homepage.tpl (index.php)
    if (strpos($vars['filename'], 'vps-hosting') !== false || strpos($vars['filename'], 'Hostingwala_vps') !== false) {
		
		$command = "getproducts";
		$adminuser = "your_admin_username";
		$values["gid"] = your_group_id;
		$results = localAPI($command,$values,$adminuser);
        //Read products
        /*$products = Capsule::table('tblproducts')
                    ->where('gid', '4')
                    /*->orderBy('id')
					->order('ASC')
                    ->get();*/
	$products=$results['products']['product'];
	
		foreach($products as $product){
			$list[] = array_merge(explode("\n",$product['description']),array("Price:".$product['pricing']['USD']['prefix'].$product['pricing']['USD']['monthly']),array("id:".$product['pid']));
			//$pid[]=;
			//$price[]=$product['pricing']['USD']['prefix'].$product['pricing']['USD']['monthly'];
		}
			//$list[]=$pid;
			//$list[]=$price;
		$arrayName =array();
		$key2val='';
		foreach($list as $key => $lines)
		{
			foreach($lines as $key2 => $line){
				$propertyAndValue = explode(":",$line);
				
				$propertyAndValue[0] = strip_tags(trim($propertyAndValue[0]));
				$propertyAndValue[1] = strip_tags(trim($propertyAndValue[1]));
				$arrayName[$propertyAndValue[0]][]= $propertyAndValue[1];
			}
		}
		
		foreach($arrayName as $key => $value)
		{
			$arrayName[$key] = implode(',',$value);
		}
		
		foreach($arrayName as $key => $value)
		{
			$arrayName[$key] = '"'.$value.'"';
			$arrayName[$key] = str_replace(',','","',$arrayName[$key]);
			$arrayName[$key] ="var ".$key." = new Array (".$arrayName[$key].");";
		}
		
        $extra = array("products" => $products,"slider_values" => $arrayName);

        return $extra;
    }


});