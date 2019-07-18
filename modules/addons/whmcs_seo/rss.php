<?php
use Illuminate\Database\Capsule\Manager as Capsule;
// *************************************************************************
// *                                                                       *
// * WHMCS SEO Module						   							   *
// * Copyright (c) WHMCS Module Shop. All Rights Reserved,                 *
// * Release Date: 26th January 2019                                       *
// * Version 2.0.2 Stable                                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: contact@whmcsmoduleshop.com                                    *
// * Website: https://whmcsmoduleshop.com                                  *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.  This software  or any other *
// * copies thereof may not be provided or otherwise made available to any *
// * other person.  No title to and  ownership of the  software is  hereby *
// * transferred.                                                          *
// *                                                                       *
// * You may not reverse  engineer, decompile, defeat  license  encryption *
// * mechanisms, or  disassemble this software product or software product *
// * license.  WHMCS Module Shop may terminate this license if you don't   *
// * comply with any of the terms and conditions set forth in our end user *
// * license agreement (EULA).  In such event,  licensee  agrees to return *
// * licensor  or destroy  all copies of software  upon termination of the *
// * license.                                                              *
// *                                                                       *
// * Please see the EULA file for the full End User License Agreement.     *
// *                                                                       *
// *************************************************************************
if(!isset($_GET['feed'])){echo 'Additional parameters required to use this file.';exit;}

global $CONFIG;
$whmcsurl = $CONFIG['SystemURL'].'/';
$companyname = $CONFIG['CompanyName'];
$seourls = $CONFIG['SEOFriendlyUrls'];


global $_LANG;

switch($_GET['feed']){

	case "announcements":
	case "news":
	case "a":
		header("HTTP/1.1 302 Found");
		header("Location: ".$whmcsurl."announcementsrss.php");
		exit;
	break;

	case "networkissues":
	case "issues":
	case "network":
	case "i":
		header("HTTP/1.1 302 Found");
		header("Location: ".$whmcsurl."networkissuesrss.php");
		exit;
	break;

	case "knowledgebase":
	case "kb":
	case "articles":
		header("Content-Type: application/xml; charset=UTF-8");
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>'."\n";
			echo '<rss version="2.0">'."\n";
				echo '<channel>'."\n";

				echo '<title><![CDATA['.$companyname.' '.$_LANG['knowledgebasetitle'].' '.$_LANG['knowledgebasepopular'].']]></title>'."\n";
				echo '<description><![CDATA['.$_LANG['addonm']['rss_kb_desc'].']]></description>'."\n";
				echo '<link>'.$whmcsurl.'</link>'."\n";

				$results = Capsule::table('tblknowledgebase')->where('private', '')->get();
				$kbarticles = array();
				foreach($results as $data){
					$kbarticles[$data->id] = array(
						'title' => $data->title,
						'id' => $data->id,
						'article' => $data->article
					);
				}


				$results = Capsule::table('tblknowledgebasecats')->where('hidden', '')->get();
				$kbcats = array();
				foreach($results as $data){
					$kbcats[] = array(
						'id' => $data->id,
						'name' => $data->name
					);
				}

				$results = Capsule::table('tblknowledgebaselinks')->get();
				$kblinks = array();
				foreach($results as $data){
					$kblinks[] = array(
						'categoryid' => $data->categoryid,
						'articleid' => $data->articleid
					);
				}


				foreach($kbcats as $cats){
					echo '<item>'."\n";
					echo '<title><![CDATA['.$cats['name'].']]></title>'."\n";
					echo '<description><![CDATA['.$cats['name'].']]></description>'."\n";

					if($seourls){
						echo '<link>'.$whmcsurl.'knowledgebase/'.$cats['id'].'/'.getmodrewritefriendlystring($cats['name']).'</link>'."\n";
					}else{
						echo '<link>'.$whmcsurl.'knowledgebase.php?action=displaycat&amp;catid='.$cats['id'].'</link>'."\n";
					}//if

					echo '</item>'."\n";

					foreach($kblinks as $link){
						if($link['categoryid'] == $cats['id']){

							$article = $kbarticles[$link['articleid']];

							echo '<item>'."\n";
								echo '<title><![CDATA['.$article['title'].']]></title>'."\n";
								echo '<description><![CDATA['.strip_tags(substr($article['article'],0,140)).']]></description>'."\n";

								if($seourls){
									echo '<link>'.$whmcsurl.'knowledgebase/'.$article['id'].'/'.getmodrewritefriendlystring($article['title']).'.html</link>'."\n";
								}else{
									echo '<link>'.$whmcsurl.'knowledgebase.php?action=displayarticle&amp;id='.$article['id'].'</link>'."\n";
								}//if
							echo '</item>'."\n";

						}//if
					}//foreach

				}//foreach
				echo '</channel>'."\n";

			echo '</rss>'."\n";
	break;

	case "products":
	case "p":
		header("Content-Type: application/xml; charset=UTF-8");
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>'."\n";
			echo '<rss version="2.0">'."\n";
				echo '<channel>'."\n";

				echo '<title><![CDATA['.$companyname.' '.$_LANG['subaccountpermsproducts'].']]></title>';
				echo '<description><![CDATA['.$_LANG['addonm']['rss_p_desc'].']]></description>';
				echo '<link>'.$whmcsurl.'</link>';

				$results = Capsule::table('tblproductgroups')->where('hidden', '')->get();
				foreach($results as $data){
					echo '<item>'."\n";
					echo '<title><![CDATA['.$data->name.']]></title>'."\n";
					echo '<description><![CDATA['.$data->name.']]></description>'."\n";
					echo '<link>'.$whmcsurl.'cart.php?gid='.$data->id.'</link>'."\n";
					echo '</item>'."\n";


					$result2 = Capsule::table('tblproducts')->where('hidden', '')->where('gid', $data->id)->get();
					foreach($result2 as $data2){
						echo '<item>'."\n";
						echo '<title><![CDATA['.$data2->name.']]></title>'."\n";
						echo '<description><![CDATA['.strip_tags(substr($data2->description,0,140)).']]></description>'."\n";
						echo '<link>'.$whmcsurl.'cart.php?a=add&amp;pid='.$data2->id.'</link>'."\n";
						echo '</item>'."\n";
					}
				}

				echo '<item>'."\n";
					echo '<title><![CDATA['.$_LANG['registerdomain'].']]></title>'."\n";
					echo '<description><![CDATA['.$_LANG['registerdomain'].']]></description>'."\n";
					echo '<link>'.$whmcsurl.'cart.php?a=add&amp;domain=register</link>'."\n";
				echo '</item>'."\n";

				echo '</channel>'."\n";

			echo '</rss>'."\n";
	break;
}//switch
?>
