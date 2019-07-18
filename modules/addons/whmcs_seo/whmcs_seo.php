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
if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

require_once(dirname(__FILE__) . '/Seo.php');


function whmcs_seo_config() {

    $configarray["name"] = "WHMCS SEO";
    $configarray["description"] = "This module automatically adds SEO Titles, Meta Descriptions and Meta Keywords tags to your WHMCS pages. If you dont provide the tags, the module will automatically try to generate suitable content for the tags from the page content. This is the ultimate SEO tool for WHMCS.";
    $configarray["version"] = "2.0.2";
    $configarray["author"] = '<a href="https://whmcsmoduleshop.com" target="_blank" title="WHMCS Module Shop"><img src="../modules/addons/'.basename(__FILE__, '.php').'/logo.png" alt="WHMCS Module Shop"/></a>';
    $configarray["language"] = "english";
    $configarray["premium"] = true;
    $configarray["fields"]["license"] = array ("FriendlyName" => "License", "Type" => "text", "Size" => "50", "Description" => "Enter your your license key.");
    return $configarray;

}

function whmcs_seo_activate($vars = []){

	try {
		if(!Capsule::schema()->hasTable('mod_whmcs_seo_items')) {
			Capsule::schema()->create(
				'mod_whmcs_seo_items',
				function ($table) {
					$table->increments('id');
					$table->text('type');
					$table->text('rel_id');
                    $table->timestamps();
				}
			);
		}
	} catch (\Exception $e) {
		return array('status'=>'error','description'=>'There was a problem activating the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
	}

	try {
		if(!Capsule::schema()->hasTable('mod_whmcs_seo_item_fields')) {
			Capsule::schema()->create(
				'mod_whmcs_seo_item_fields',
				function ($table) {
					$table->increments('id');
					$table->string('rel_id');
					$table->string('type');
					$table->text('language')->nullable();
					$table->text('value');
                    $table->timestamps();
				}
			);
		}
	} catch (\Exception $e) {
		return array('status'=>'error','description'=>'There was a problem activating the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
	}

   	return array('status'=>'success','description'=>'The module was activated successfully');


}

function whmcs_seo_deactivate($vars){

    $settings = Seo::getInstance()->getSettings();

    if($settings['delete_table'] == 'yes'){
		try {
            Capsule::table('tbladdonmodules')->where('module', '_seo_settings')->delete();
			Capsule::schema()->dropIfExists('mod_whmcs_seo_items');
			Capsule::schema()->dropIfExists('mod_whmcs_seo_item_fields');
		} catch (\Exception $e) {
			return array('status'=>'error','description'=>'There was a problem deactivating the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
		}
	}//if

	return array('status'=>'success','description'=>'The module was deactivated successfully');

}

function whmcs_seo_upgrade($vars){

	if(version_compare($vars['version'], '2.0.0', '<')){
		try {
            if(!Capsule::schema()->hasTable('mod_whmcs_seo_items')) {
                Capsule::schema()->create(
                    'mod_whmcs_seo_items',
                    function ($table) {
                        $table->increments('id');
                        $table->text('type');
                        $table->text('rel_id');
                        $table->timestamps();
                    }
                );
            }
		} catch (\Exception $e) {
			return array('status'=>'error','description'=>'There was a problem upgrading the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
		}
		try {
            if(!Capsule::schema()->hasTable('mod_whmcs_seo_item_fields')) {
                Capsule::schema()->create(
                    'mod_whmcs_seo_item_fields',
                    function ($table) {
                        $table->increments('id');
                        $table->string('rel_id');
                        $table->string('type');
                        $table->text('language')->nullable();
                        $table->text('value');
                        $table->timestamps();
                    }
                );
            }
		} catch (\Exception $e) {
			return array('status'=>'error','description'=>'There was a problem upgrading the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
		}

		try{
            $items = Capsule::table('mod_whmcs_seo')->get();
            foreach($items as $item){
                $record = SeoItem::firstOrCreate([
                    'type' => 'page',
                    'rel_id' => $item->file
                ]);

                $fields = [
                    'title',
                    'key',
                    'desc',
                    'key',
                    'bots_index',
                    'bots_follow',
                    'bots_archive',
                    'bots_snippet',
                    'bots_odp',
                    'ogimage',
                    'ogtitle',
                    'ogdesc',
                    'ogsection',
                    'ogtag',
                    'twittercreator',
                    'twittertitle',
                    'twitterdesc',
                    'twitterimage'
                ];
                foreach($fields as $field){
                    $fieldValues = unserialize($item->{$field});
                    foreach($fieldValues as $language => $value){
                        if($field == 'key'){
                            $field = 'keyword';
                        }
                        if($value != ''){
                            $record->fields()->firstOrCreate([
                                'type' => $field,
                                'language' => $language,
                                'value' => $value
                            ]);
                        }
                    }
                }
            }

            $items = Capsule::table('mod_whmcs_seo_extra')->get();
            foreach($items as $item){
                $record = SeoItem::firstOrCreate([
                    'type' => $item->type,
                    'rel_id' => $item->relid
                ]);

                $fields = [
                    'title',
                    'keyword',
                    'desc',
                    'key',
                    'bots_index',
                    'bots_follow',
                    'bots_archive',
                    'bots_snippet',
                    'bots_odp',
                    'ogimage',
                    'ogtitle',
                    'ogdesc',
                    'ogsection',
                    'ogtag',
                    'twittercreator',
                    'twittertitle',
                    'twitterdesc',
                    'twitterimage'
                ];
                foreach($fields as $field){
                    $fieldValues = unserialize($item->{$field});
                    foreach($fieldValues as $language => $value){
                        if($value != ''){
                            $record->fields()->firstOrCreate([
                                'type' => $field,
                                'language' => $language,
                                'value' => $value
                            ]);
                        }
                    }
                }
            }

            Capsule::schema()->dropIfExists('mod_whmcs_seo');
            Capsule::schema()->dropIfExists('mod_whmcs_seo_extra');

            $settings = Capsule::table('tbladdonmodules')
                ->where('module', 'whmcs_seo')
                ->whereNotIn('setting', ['local_license', 'license', 'nhplicense', 'version', 'access'])
                ->where('value', '!=', '')
                ->get();
            foreach($settings as $setting){
                Seo::getInstance()->saveSetting($setting->setting, $setting->value);
            }
            Capsule::table('tbladdonmodules')
                ->where('module', 'whmcs_seo')
                ->whereNotIn('setting', ['local_license', 'license', 'nhplicense', 'version', 'access'])
                ->delete();

        } catch (\Exception $e) {
            return array('status'=>'error','description'=>'There was a problem upgrading the module, please try again. If the problem persists contact support. Error: ' . $e->getMessage());
        }
	}

}

function recursive_parent($collection, $parentId = 0, $parentColumn = 'parentid', $nameColumn = 'name'){
    $result = new \Illuminate\Support\Collection();
    $collection->each(function($item) use ($collection, $parentId, $result, $parentColumn, $nameColumn){
        $item->disabled = false;
        if($item->{$parentColumn} == $parentId){
            $result->push($item);
            $subItems = recursive_parent($collection, $item->id);
            foreach($subItems as $sub){
                $sub->{$nameColumn} = '- ' . $sub->{$nameColumn};
                $result->push($sub);
            }
        }
    });
    return $result;
}

function whmcs_seo_output($vars) {

    $seo = Seo::getInstance();

    $seo->saveSettings();

    $dlCats = recursive_parent(new \Illuminate\Support\Collection(Capsule::table('tbldownloadcats')->orderBy('parentid', 'asc')->get()));

    $knowledgebaseCats = recursive_parent(new \Illuminate\Support\Collection(Capsule::table('tblknowledgebasecats')->orderBy('parentid', 'asc')->get()));

    $knowledgebaseTags = (new \Illuminate\Support\Collection(Capsule::table('tblknowledgebasetags')->groupBy('tag')->get()))->map(function($item){
        $item->disabled = false;
        return $item;
    });

    $knowledgebaseArticles = (new \Illuminate\Support\Collection(
            Capsule::table('tblknowledgebase')
                ->join('tblknowledgebaselinks', 'tblknowledgebase.id', '=', 'tblknowledgebaselinks.articleid')
                ->orderBy('order', 'asc')
                ->get()
        ))->map(function($item){
            $item->title = utf8_encode($item->title);
            $item->article = utf8_encode($item->article);
            $item->disabled = false;
            return $item;
        });

    $announcements = (new \Illuminate\Support\Collection(
            Capsule::table('tblannouncements')
                ->where('parentid', '0')
                ->get()
        ))->map(function($item){
            $item->title = utf8_encode($item->title);
            $item->announcement = utf8_encode($item->announcement);
            $item->disabled = false;
            return $item;
        });

    $cartGroups = (new \Illuminate\Support\Collection(
            Capsule::table('tblproductgroups')
                ->get()
        ))->map(function($item){
            $item->disabled = false;
            return $item;
        });
    ?>

    <div class="successbox" style="display: none;"><p>Settings Saved!</p></div>

        <ul class="nav nav-tabs admin-tabs" role="tablist">
            <li class="active"><a href="#pages" role="tab" data-toggle="tab" id="pages-link">Pages</a></li>
            <li><a href="#knowledgebase-cats" role="tab" data-toggle="tab" id="knowledgebase-cats-link">KB Categories</a></li>
            <li><a href="#knowledgebase-tags" role="tab" data-toggle="tab" id="knowledgebase-tags-link">KB Tags</a></li>
            <li><a href="#knowledgebase-articles" role="tab" data-toggle="tab" id="knowledgebase-articles-link">KB Articles</a></li>
            <li><a href="#announcements" role="tab" data-toggle="tab" id="announcements-link">Announcements</a></li>
            <li><a href="#download-cats" role="tab" data-toggle="tab" id="download-cats-link">Download Categories</a></li>
            <li><a href="#cart-groups" role="tab" data-toggle="tab" id="cart-groups-link">Product Groups</a></li>
            <li><a href="#settings-tab" role="tab" data-toggle="tab" id="settings-link">Settings</a></li>
            <li><a href="#settings-meta" role="tab" data-toggle="tab" id="settings-meta-link">Meta Tags</a></li>
            <li><a href="#opengraph" role="tab" data-toggle="tab" id="opengraph-link">Open Graph</a></li>
            <li><a href="#facebook" role="tab" data-toggle="tab" id="facebook-link">Facebook</a></li>
            <li><a href="#twitter" role="tab" data-toggle="tab" id="twitter-link">Twitter</a></li>
            <li><a href="#help" role="tab" data-toggle="tab" id="help-link">Help</a></li>
        </ul>

        <form id="settings" action="" method="post">

            <div class="tab-content admin-tabs">

                <div class="tab-pane active" id="pages">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Pages</h1>

                        <p>These are your custom page SEO settings.</p>
                        <p>Simply enter the URL its used on and add your content.</p>
                        <p>Dont forget you can target URLs with query string variables!</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-window-maximize" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Page Url</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The URL on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in pages" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Title</span>
                                        <input type="text" value="{{ item.fields.title.english }} " class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" value="{{ systemUrl + item.rel_id }} " class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <p><br/><input type="button" class="btn btn-info" value="Create New Seo Item" v-on:click="addItem({type: 'page'}, $event)"/></p>

                    </div>
                </div>

                <div class="tab-pane" id="knowledgebase-cats">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Knowledgebase Categories</h1>

                        <p>These are your custom Knowledgebase Category SEO settings.</p>
                        <p>For all the categories not entered here we will set some default tags so your not completely invisible to search engines.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-window-maximize" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Category</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The category on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in kbcats" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input type="text" class="form-control" disabled value="{{ getKbCat(item.rel_id).name }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">
                                <template v-for="kb in kbcatsdropdown">
                                    <li :disabled="kb.disabled == true" :class="{disabled: kb.disabled == true}">
                                        <a v-if="kb.disabled == false" v-on:click="addItem({type: 'kbcat', rel_id: kb.id}, $event)">{{ kb.name }}</a>
                                        <a class="disabled" v-if="kb.disabled == true">{{ kb.name }}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="knowledgebase-tags">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Knowledgebase Tags</h1>

                        <p>These are your custom Knowledgebase Tag SEO settings.</p>
                        <p>For all the tags not entered here we will set some default tags so your not completely invisible to search engines.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-tags" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Tag</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The tag on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in kbtags" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Tag</span>
                                        <input type="text" class="form-control" disabled value="{{ getKbTag(item.rel_id).tag }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">
                                <template v-for="kb in kbtagsdropdown">
                                    <li :disabled="kb.disabled == true" :class="{disabled: kb.disabled == true}">
                                        <a v-if="kb.disabled == false" v-on:click="addItem({type: 'kbtag', rel_id: kb.tag}, $event)">{{ kb.tag }}</a>
                                        <a class="disabled" v-if="kb.disabled == true">{{ kb.tag }}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="knowledgebase-articles">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Knowledgebase Articles</h1>

                        <p>These are your custom Knowledgebase Article SEO settings.</p>
                        <p>For all the articles not entered here we will set some default tags using the article content so your not completely invisible to search engines.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-file-text-o" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Article</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The article on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in kbarticles" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Title</span>
                                        <input type="text" class="form-control" disabled value="{{ getKbArticle(item.rel_id).title }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">

                                <template v-for="kb in kbcatsdropdown">
                                    <li class="dropdown-header">{{ kb.name }}</li>
                                    <template v-for="kbarticle in kbarticlesdropdown">
                                        <li :disabled="kbarticle.disabled == true" :class="{disabled: kbarticle.disabled == true}" v-if="kbarticle.categoryid == kb.id">
                                            <a v-if="kbarticle.disabled == false" v-on:click="addItem({type: 'kbarticle', rel_id: kbarticle.id}, $event)">{{ kbarticle.title }}</a>
                                            <a class="disabled" v-if="kbarticle.disabled == true">{{ kbarticle.title }}</a>
                                        </li>
                                    </template>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="announcements">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Announcements</h1>

                        <p>These are your custom Announcement SEO settings.</p>
                        <p>For all the announcements not entered here we will set some default tags using the announcement content so your not completely invisible to search engines.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-newspaper-o" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Announcement</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The announcement on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in announcements" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Title</span>
                                        <input type="text" class="form-control" disabled value="{{ getAnnouncement(item.rel_id).title }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">
                                <template v-for="announcement in announcementsdropdown">
                                    <li :disabled="announcement.disabled == true" :class="{disabled: announcement.disabled == true}">
                                        <a v-if="announcement.disabled == false" v-on:click="addItem({type: 'announcement', rel_id: announcement.id}, $event)">{{ announcement.title }}</a>
                                        <a class="disabled" v-if="announcement.disabled == true">{{ announcement.title }}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="download-cats">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Download Categories</h1>

                        <p>These are your custom Download Category SEO settings.</p>
                        <p>For all the categories not entered here we will set some default tags so your not completely invisible to search engines.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-cloud-download" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Category</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The Category on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in dlcats" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input type="text" class="form-control" disabled value="{{ getDlCat(item.rel_id).name }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">
                                <template v-for="dl in dlcatsdropdown">
                                    <li :disabled="dl.disabled == true" :class="{disabled: dl.disabled == true}">
                                        <a v-if="dl.disabled == false" v-on:click="addItem({type: 'dlcat', rel_id: dl.id}, $event)">{{ dl.name }}</a>
                                        <a class="disabled" v-if="dl.disabled == true">{{ dl.name }}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="cart-groups">
                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Product Groups</h1>

                        <p>These are your custom Product Group SEO settings.</p>

                        <hr/>

                        <div class="row" style="margin-top: 30px;margin-bottom: 20px;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-cart-plus" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Group</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>The group on which these settings will be used.</small></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-search" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Preview</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>This is an estimation of how your page will appear.</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <p class="text-center"><span class="fa fa-line-chart" style="font-size: 60px;"></span></p>
                                    <p class="text-center lead" style="margin-bottom: 10px;">Statistics</p>
                                    <p class="text-center text-muted" style="margin-bottom: 0px;"><small>How are your pages performing?</small></p>
                                </div>
                            </div>
                        </div>

                        <div v-for="item in cartgroups" class="row" style="margin-bottom: 20px;padding-bottom: 10px;border-bottom: 1px solid #ccc;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input type="text" class="form-control" disabled value="{{ getCartGroup(item.rel_id).name }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Url</span>
                                        <input type="text" class="form-control" disabled value="{{ generateUrl(item) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <seo-preview :item="item" :system-url="systemUrl"></seo-preview>
                            </div>
                            <div class="col-md-3">
                                <seo-item-stats :item="item"></seo-item-stats>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">
                                    <a href="#" v-on:click="editItem(item, $event)" style="font-size: 30px;line-height:40px;color: #31b0d5;margin-right: 10px;"><span class="fa fa-eye"></span></a>
                                    <a href="#" v-on:click="deleteItem(item, $event)" style="font-size: 30px;line-height:40px;color: #d9534f;"><span class="fa fa-times"></span></a>
                                </p>
                            </div>
                        </div>

                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New Seo Item <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu">
                                <template v-for="group in cartgroupsdropdown">
                                    <li :disabled="group.disabled == true" :class="{disabled: group.disabled == true}">
                                        <a v-if="group.disabled == false" v-on:click="addItem({type: 'cartgroup', rel_id: group.id}, $event)">{{ group.name }}</a>
                                        <a class="disabled" v-if="group.disabled == true">{{ group.name }}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="settings-tab">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Settings</h1>

                        <p>Below are the configurable settings for the module. Some defaults have been set for you, but you can alter to suit your needs.</p>

                        <hr/>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Robots.txt File</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://www.robotstxt.org/robotstxt.html" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <textarea class="form-control" v-model="settings.robots_content" rows="4"></textarea>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            Enter the content you would like to use for the robots.txt file.<br/>You need to ensure the following is added to your <code>.htaccess</code> file
                                        </small>
                                    </p>
                                    <pre># WHMCS SEO Robots.txt rewrite rule
RewriteRule ^robots.txt ./index.php?m=whmcs_seo&action=robots [L,NC]</pre>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Force SEO Urls</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="yes" v-model="settings.force_seo">
                                            Yes redirect all query based urls to SEO equivalents
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="no" v-model="settings.force_seo">
                                            No dont redirect all query based urls to SEO equivalents
                                        </label>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            Do you want to redirect non-seo urls for announcements, knowledgebase, and downloads urls to their SEO equivelents?<br/><span class="text-danger">Use of this setting requires the WHMCS SEO URLs setting to be turned on.</span>
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Head Tag Comments</label>
                                <div class="col-sm-10">
                                    <select v-model="settings.display_comments" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <p class="text-muted">
                                        <small>
                                            Would you like the SEO Module to add a generator comment above the items added to the sites <code>&lt;head&gt;</code> tag?<br/>This comment do not get displayed on site and can only be seen if viewing the page source.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Delete Module Data On Deactivation?</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="yes" v-model="settings.delete_table">
                                            Yes delete all data on deactivation
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="no" v-model="settings.delete_table">
                                            No preserve my data
                                        </label>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            This displays a disabled input with the users points awarded total as a custom field on their profile page.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="settings-meta">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Meta Tags</h1>

                        <p>Below are the configurable meta tags for your sites <code>&lt;head&gt;</code>.</p>
                        <p>These tags can provide targetted information about your site.</p>
                        <p>Leave blank to disable usage.</p>

                        <hr/>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">RSS Head Links</label>
                                <div class="col-sm-10">
                                    <select v-model="settings.rss_links" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <p class="text-muted">
                                        <small>
                                            Would you like the SEO Module to add links to your module generated RSS feeds in the sites <code>&lt;head&gt;</code> tag?
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Canonical Links</label>
                                <div class="col-sm-10">
                                    <select v-model="settings.canonical" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <p class="text-muted">
                                        <small>
                                            Would you like the SEO Module to add a canonical link to your sites <code>&lt;head&gt;</code> tag?<br/>This will effect SEO URL rewritten pages such as the knowledgebase, announcements and downloads.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Default Description</label>
                                <div class="col-sm-10">
                                    <p><textarea class="form-control" v-model="settings.default_description" rows="3"></textarea></p>
                                    <p class="text-muted">
                                        <small>
                                            Enter a default description to use on pages where no setting has been added.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Default Keywords</label>
                                <div class="col-sm-10">
                                    <p><input type="text" class="form-control" v-model="settings.default_keywords"/></p>
                                    <p class="text-muted">
                                        <small>
                                            Enter some default keywords to use on pages where no setting has been added.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Abstract</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://www.metatags.org/meta_name_abstract" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.abstract"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            The abstract tag is very similar in use to the description tag.<br/>But where the description tag is designed to summaries the current page content, the abstract tag details the sites general message.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Copyright</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://www.metatags.org/meta_name_copyright" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.copyright"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            How do you explain that the photos and the text on your website are protected? You use the so called COPYRIGHT meta tag.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Reply To</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://www.metatags.org/meta_name_reply_to" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.replyto"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            This tag details who to contact regarding the site and its usage.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Distribution</label>
                                <div class="col-sm-10">
                                    <select v-model="settings.distribution" class="form-control">
                                        <option>Global</option>
                                        <option>Local</option>
                                        <option>IU</option>
                                    </select>
                                    <p class="text-muted">
                                        <small>
                                            The meta tag distribution defines the level or degree of distribution of your web-page and how it should be classified in relation to methods of distribution on the world wide web.<br/>
                                            Global - indicates that your web-page is intended for everyone,<br/>
                                            Local - intended for local distribution of your document,<br/>
                                            IU - Internal Use, not intended for public distribution.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Custom Tags</label>
                                <div class="col-sm-10">
                                    <div v-for="tag in settings.meta_tags" class="row">
                                        <div class="col-md-5">
                                            <p class="input-group">
                                                <span class="input-group-addon">Tag</span>
                                                <input type="text" class="form-control" v-model="tag.tag"/>
                                            </p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="input-group">
                                                <span class="input-group-addon">Value</span>
                                                <input type="text" class="form-control" v-model="tag.value"/>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-sm btn-danger" v-on:click="removeMetaTag(tag, $event)"><span class="fa fa-times"></span></a>
                                        </div>
                                    </div>
                                    <p><button type="button" class="btn btn-info btn-xs" v-on:click="addMetaTag($event)">Add new meta tag <span class="fa fa-plus"></span></button></p>
                                    <p class="text-muted">
                                        <small>
                                            Enter any custom meta tags you may need across the whole site.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="opengraph">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Open Graph Meta Tags</h1>

                        <p>Below are the configurable meta tags for your sites <code>&lt;head&gt;</code> targeted specifically for Open Graph Readers (Facebook and Twitter to name a few).</p>
                        <p>Each page can optionally provide their own, these will be used by default.</p>
                        <p>Leave blank to disable usage.</p>

                        <hr/>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Open Graph Site Name</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://ogp.me/" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.ogname"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            If your object is part of a larger web site, the name which should be displayed for the overall site. e.g., "IMDb".
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Open Graph Image</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://ogp.me/" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.ogimage"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            An image URL which should represent your object within the graph.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Open Graph Description</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://ogp.me/" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.ogdesc"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            A one to two sentence description of your object.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="facebook">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Facebook Meta Tags</h1>

                        <p>Below are the configurable meta tags for your sites <code>&lt;head&gt;</code> targeted specifically for Facebook and Open Graph Readers.</p>
                        <p>Each page can optionally provide their own, these will be used by default.</p>
                        <p>Leave blank to disable usage.</p>

                        <hr/>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Facebook Admins</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="https://www.facebook.com/business/help/community/question/?id=1041828329232240" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.fbadmins"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            Enter a comma separated list of Facebook Admin ID's for the site.
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Facebook App ID's</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="http://stackoverflow.com/questions/10836135/when-do-i-need-a-fbapp-id-or-fbadmins" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.fbappids"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            Enter a comma separated list of Facebook App ID's for the site.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="twitter">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Twitter Meta Tags</h1>

                        <p>Below are the configurable meta tags for your sites <code>&lt;head&gt;</code> targeted specifically for Twitter.</p>
                        <p>Each page can optionally provide their own, these will be used by default.</p>
                        <p>More information on Twitter Card usage in relation to these tags can be found here: <a href="https://dev.twitter.com/cards/getting-started" target="_blank">https://dev.twitter.com/cards/getting-started</a></p>
                        <p>Leave blank to disable usage.</p>

                        <hr/>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Site Username</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><a href="https://dev.twitter.com/cards/markup" target="_blank"><span class="fa fa-info-circle"></span></a></span>
                                        <input type="text" class="form-control" v-model="settings.twittersite"/>
                                    </div>
                                    <p class="text-muted">
                                        <small>
                                            Enter the site username as you would like it to appear on your twitter cards.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Card Type</label>
                                <div class="col-sm-10">
                                    <select v-model="settings.twittercard" class="form-control">
                                        <option>summary</option>
                                        <option>summary_large_image</option>
                                        <option>app</option>
                                        <option>player</option>
                                    </select>
                                    <p class="text-muted">
                                        <small>
                                            Choose the Twitter card type, we strongly recommend you stick with summary or summary_large_image although all options are provided.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="help">

                    <div style="overflow: hidden;">

                        <h1 style="margin-top: 20px;">Help</h1>

                        <p>The SEO Module can display settings for all areas of your WHMCS site.</p>
                        <p>Each section is broken down using the tabs above.</p>

                        <p>Where appropriate a field description describes the fields usage, or you will see a <span class="fa fa-info"></span> icon which links to further reading about an option.</p>

                        <div class="page-header">
                            <h2>Pages</h2>
                        </div>
                        <p>The pages area caters for all other situations, it can display settings for .php files, or for seo urls without the extension.</p>
                        <p>One thing to consider is the pages area can target pages with query string variables, for example:</p>
                        <p><code>index.php?one=two&three=four</code></p>
                        <p>If you provide a setting for <code>index.php?one=two&three=four</code> this will be matched first.</p>
                        <p>If one isn't found, and there is a setting for <code>index.php</code> this will be matched as a fallback.</p>

                        <div class="page-header">
                            <h2>KB Categories, KB Tags, KB Articles, Announcements, Download Categories, Product Groups</h2>
                        </div>
                        <p>All of these settings work in the same basic way, but are targeted specifically at different content areas of your WHMCS site.</p>
                        <p>To edit a current setting, click the eye icon, to add a new one click the blue dropdown below which indicated to add a new setting.</p>
                        <p>These dropdowns only contain content from the current section, and only lets you select items not already created.</p>
                        <p>When editting each one the modules edit modal will show you information at the top about the current item which can be used to inform you of the context for this setting.</p>

                        <div class="page-header">
                            <h2>General Setting</h2>
                        </div>
                        <p>The general settings area contains some basic settings which you need to review to ensure the module is working as you expect it to.</p>
                        <p><strong>Robots.txt</strong></p>
                        <p>The Robots.txt setting allows you to se what you display the crawlers of your site, clicking the info link which take you to a webpage which contains detailed information about this item.</p>

                        <div class="page-header">
                            <h2>RSS Feeds</h2>
                        </div>
                        <p>The module automatically generates RSS feeds for your Knowledgebase, Announcements, Products, and Network Issues.</p>
                        <p>The links for these feeds can be found in the module sidebar.</p>
                        <p>In the general settings you can allow the module to automatically add these as feeds to your websites <code>head</code> sections enabling auto discovery for RSS readers.</p>

                        <div class="page-header">
                            <h2>Getting Support</h2>
                        </div>
                        <p>Firstly check to make sure your license is active for the current install.</p>
                        <p>Secondly turn on PHP error reporting and reload the page where the issue occured to see if any errors are thrown.</p>
                        <p>Thirdly, if this is a admin issue, open the developer tools console and perform troublesome action, any function errors should be reported in the console.</p>
                        <p>Forthly, please ensure you are using the latest version of the module, and WHMCS.</p>
                        <p>If you are still having trouble with the module please let us know by opening a support ticket.</p>
                        <p>An active instance of the modules support and updates addon is required for a our support terms to be met.</p>
                    </div>
                </div>

            </div>
            <p><br/><input type="button" class="btn btn-success btn-lg" value="Save Changes" v-on:click="onClick"/></p>

            <?php if(isset($_GET['debug'])){echo '<pre>{{ $data | json }}</pre>';} ?>

            <div class="modal fade" tabindex="-1" role="dialog" id="editItem">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">{{ generateModalTitle(item_to_edit) }}</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-horizontal">

                                <div class="form-group" v-if="item_to_edit.type == 'page'">
                                    <label class="col-sm-2 control-label">Page Url</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">{{ systemUrl }}</span>
                                            <input type="text" class="form-control" v-model="item_to_edit.rel_id"/>
                                        </div>
                                        <p class="text-muted">
                                            <small>
                                                Enter the URL this page can be found.
                                            </small>
                                        </p>
                                    </div>
                                </div>

                                <template v-if="item_to_edit.type == 'kbcat'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category Name</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getKbCat(item_to_edit.rel_id).name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category Description</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getKbCat(item_to_edit.rel_id).description }}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-if="item_to_edit.type == 'kbtag'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tag Name</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getKbTag(item_to_edit.rel_id).tag }}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-if="item_to_edit.type == 'kbarticle'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Article Title</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getKbArticle(item_to_edit.rel_id).title }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Article Content</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{{ getKbArticle(item_to_edit.rel_id).article }}}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-if="item_to_edit.type == 'announcement'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Announcement Title</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getAnnouncement(item_to_edit.rel_id).title }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Announcement Content</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{{ getAnnouncement(item_to_edit.rel_id).announcement }}}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-if="item_to_edit.type == 'dlcat'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category Name</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getDlCat(item_to_edit.rel_id).name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category Description</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getDlCat(item_to_edit.rel_id).description }}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-if="item_to_edit.type == 'cartgroup'">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Group Name</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getCartGroup(item_to_edit.rel_id).name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Group Headline</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getCartGroup(item_to_edit.rel_id).headline }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Group Tagline</label>
                                        <div class="col-sm-10">
                                            <div style="border: 1px solid #e3e3e3;padding: 12px;max-height: 200px;overflow: scroll;">
                                                {{ getCartGroup(item_to_edit.rel_id).tagline }}
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Preview</label>
                                    <div class="col-sm-10">
                                        <seo-preview :item="item_to_edit" :system-url="systemUrl"></seo-preview>
                                    </div>
                                </div>

                                <div v-for="field_group in field_settings">

                                    <div v-if="field_group.title !== null" class="well" style="cursor: pointer;" v-on:click="field_group.open = !field_group.open">
                                        <h3 style="margin-bottom: 0px;">{{ field_group.title }} <span v-if="field_group.closes" class="fa pull-right" v-bind:class="{'fa-plus': field_group.open, 'fa-minus': !field_group.opne}"></span></h3>
                                    </div>

                                    <div class="form-group" v-for="field in field_group.fields" v-if="field_group.open" transition="fade">
                                        <label class="col-sm-2 control-label">{{ field.label }}</label>
                                        <div class="col-sm-10">

                                            <template v-if="field.type == 'text' && field.language == false">
                                                <input type="text" class="form-control" v-model="item_to_edit.fields[field.id]"/>
                                                <p v-if="field.count == true"><span class="pull-right" v-bind:class="{'text-warning': item_to_edit.fields[field.id].length < 40, 'text-success': item_to_edit.fields[field.id].length > 39 && item_to_edit.fields[field.id].length < 61, 'text-danger': item_to_edit.fields[field.id].length > 60}">{{ item_to_edit.fields[field.id] | length }}/60</span></p>
                                            </template>

                                            <template v-if="field.type == 'text' && field.language == true">
                                                <div v-sortable="{ handle: '.handle',onUpdate: onUpdate }" v-on:mouseenter="this.current_drag_field = field.id">
                                                    <div v-for="input in item_to_edit.fields[field.id]">
                                                        <div class="input-group" style="margin-bottom: 6px;">
                                                            <span class="input-group-addon handle" style="cursor:pointer;">{{ $key | capitalize }}</span>
                                                            <input type="text" class="form-control" v-model="input"/>
                                                            <span class="input-group-addon"><span class="fa fa-times text-danger" style="cursor: pointer;" v-on:click="removeLanguageField(field.id, $key, $event)"></span></span>
                                                        </div>
                                                        <p v-if="field.count == true"><span class="pull-right" v-bind:class="{'text-warning': input.length < 41, 'text-success': input.length > 40 && input.length < 61, 'text-danger': input.length > 60}">{{ input | length }}/60</span></p>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <p>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Add new language <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <template v-for="language in languages">
                                                            <li v-if="!item_to_edit.fields.hasOwnProperty(field.id) || !item_to_edit.fields[field.id].hasOwnProperty(language)"><a v-on:click="addLanguageToField(field.id, language, $event)">{{ language | capitalize }}</a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                                </p>
                                            </template>

                                            <template v-if="field.type == 'textarea' && field.language == false">
                                                <textarea class="form-control" v-model="item_to_edit.fields[field.id]" rows="3"></textarea>
                                                <p><span class="pull-right" v-bind:class="{'text-warning': item_to_edit.fields[field.id].length < 120, 'text-success': item_to_edit.fields[field.id].length > 119 && item_to_edit.fields[field.id].length < 161, 'text-danger': item_to_edit.fields[field.id].length > 160}">{{ item_to_edit.fields[field.id] | length }}/160</span></p>
                                            </template>

                                            <template v-if="field.type == 'textarea' && field.language == true">
                                                <div v-sortable="{ handle: '.handle',onUpdate: onUpdate }" v-on:mouseenter="this.current_drag_field = field.id">
                                                    <div v-for="input in item_to_edit.fields[field.id]">
                                                        <div class="input-group" style="margin-bottom: 6px;">
                                                            <span class="input-group-addon handle" style="cursor:pointer;">{{ $key | capitalize }}</span>
                                                            <textarea class="form-control" v-model="input" rows="3"></textarea>
                                                            <span class="input-group-addon"><span class="fa fa-times text-danger" style="cursor: pointer;" v-on:click="removeLanguageField(field.id, $key, $event)"></span></span>
                                                        </div>
                                                        <p><span class="pull-right" v-bind:class="{'text-warning': input.length < 120, 'text-success': input.length > 119 && input.length < 161, 'text-danger': input.length > 160}">{{ input | length }}/160</span></p>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <p>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Add new language <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <template v-for="language in languages">
                                                            <li v-if="!item_to_edit.fields.hasOwnProperty(field.id) || !item_to_edit.fields[field.id].hasOwnProperty(language)"><a v-on:click="addLanguageToField(field.id, language, $event)">{{ language | capitalize }}</a></li>
                                                        </template>
                                                    </ul>
                                                </div>
                                                </p>
                                            </template>

                                            <template v-if="field.type == 'select'">
                                                <select class="form-control" v-model="item_to_edit.fields[field.id]">
                                                    <option v-for="option in field.options">{{ option }}</option>
                                                </select>
                                            </template>
                                            <template v-if="field.type == 'bots'">
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" v-model="item_to_edit.fields.bots_index" value="NoIndex">
                                                        NoIndex
                                                    </label>
                                                </div>
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" v-model="item_to_edit.fields.bots_follow" value="NoFollow">
                                                        NoFollow
                                                    </label>
                                                </div>
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" v-model="item_to_edit.fields.bots_archive" value="NoArchive">
                                                        NoArchive
                                                    </label>
                                                </div>
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" v-model="item_to_edit.fields.bots_snippet" value="NoSnippet">
                                                        NoSnippet
                                                    </label>
                                                </div>
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" v-model="item_to_edit.fields.bots_odp" value="NoODP">
                                                        NoODP
                                                    </label>
                                                </div>
                                            </template>

                                            <template v-if="field.type == 'twitter-preview'">
                                                <twitter-summary-preview v-if="item_to_edit.fields.twittercard == 'summary'" :item="item_to_edit" :system-url="systemUrl"></twitter-summary-preview>
                                                <twitter-image-preview v-if="item_to_edit.fields.twittercard == 'summary_large_image'" :item="item_to_edit" :system-url="systemUrl"></twitter-image-preview>
                                                <twitter-player-preview v-if="item_to_edit.fields.twittercard == 'player'" :item="item_to_edit" :system-url="systemUrl"></twitter-player-preview>
                                                <twitter-app-preview v-if="item_to_edit.fields.twittercard == 'app'" :item="item_to_edit" :system-url="systemUrl"></twitter-app-preview>
                                            </template>

                                            <template v-if="field.type == 'stats'">
                                                <seo-item-stats :item="item_to_edit" expanded="true"></seo-item-stats>
                                            </template>

                                            <p class="text-muted">
                                                <small>
                                                    {{ field.description }}
                                                </small>
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <small class="pull-left text-danger">Your settings will not be saved, until you click the Save Changes Button below all settings.</small>
                            <button type="button" data-dismiss="modal" class="btn btn-success">Close Setting</button>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="loading" style="position: absolute;top:0;left:0;width:100%;height:100%;background: rgba(0,0,0,0.25);text-align: center;color: #fff;z-index: 1000;padding-top: 300px;">
                <p><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></p>
                <p>Loading...</p>
            </div>

        </form>

        <style type="text/css">
            .modal-body .input-group .input-group-addon:first-child{
                min-width: 100px;
            }
            .scrollable-menu {
                height: auto;
                max-height: 200px;
                overflow-x: hidden;
            }
        </style>

        <script type="text/x-template" id="seo-preview-template">
            <div style="border: 1px solid #e3e3e3;padding: 6px 12px;font-family: ariel, sans-serif;text-decoration: none;height: 95px;overflow:hidden;">
                <template v-if="item.fields.title.english != '' && item.fields.desc.english != ''">
                    <p style="color: #1a0dab;font-size: 18px;margin-bottom: 0px;">{{ item.fields.title.english }}</p>
                    <p style="color: #006621;font-size: 14px;margin-bottom: 0px;">{{ generateUrl() }} <span class="fa fa-sort-desc" style="position: absolute;margin-left: 4px;"></span></p>
                    <p style="color: #545454;font-size: 13px;margin-bottom: 0px;">{{ item.fields.desc.english }}</p>
                </template>
                <template v-if="!item.fields.title || !item.fields.desc || item.fields.title.english == '' || item.fields.desc.english == ''">
                    <p class="text-center text-muted" style="font-size: 26px;margin-top: 6px;"><span class="fa fa-spinner"></span></p>
                    <p class="text-center text-muted">Preview Currently Unavailable</p>
                </template>
            </div>
        </script>

        <script type="text/x-template" id="twitter-summary-preview-template">
            <div style="border-radius: .42857em;border-width: 1px;border-style: solid;border-color: #E1E8ED;box-sizing: border-box;">
                <div style="width:125px;float: left;"><img :src="imagePreview" style="max-width: 100%;height: auto;"/></div>
                <div style="width:calc(100% - 125px);float: right;box-sizing: border-box;padding: .75em;color: #1c2022;">
                    <p><strong>{{ item.fields.twittertitle }}</strong></p>
                    <p>{{ item.fields.twitterdesc }}</p>
                    <p style="color: #8899A6;">{{ generateUrl() }}</p>
                </div>
                <div style="clear: both;"></div>
            </div>
        </script>

        <script type="text/x-template" id="twitter-image-preview-template">
            <div style="border-radius: .42857em;border-width: 1px;border-style: solid;border-color: #E1E8ED;box-sizing: border-box;">
                <div style=""><img :src="imagePreview" style="max-width: 100%;height: auto;"/></div>
                <div style="box-sizing: border-box;padding: .75em;color: #1c2022;">
                    <p><strong>{{ item.fields.twittertitle }}</strong></p>
                    <p>{{ item.fields.twitterdesc }}</p>
                    <p style="color: #8899A6;">{{ generateUrl() }}</p>
                </div>
            </div>
        </script>

        <script type="text/x-template" id="twitter-player-preview-template">
            <div style="border-radius: .42857em;border-width: 1px;border-style: solid;border-color: #E1E8ED;box-sizing: border-box;">
                <div style=""><img :src="imagePreview" style="max-width: 100%;height: auto;"/></div>
                <div style="box-sizing: border-box;padding: .75em;color: #1c2022;">
                    <p><strong>{{ item.fields.twittertitle }}</strong></p>
                    <p>{{ item.fields.twitterdesc }}</p>
                    <p style="color: #8899A6;">{{ generateUrl() }}</p>
                </div>
            </div>
        </script>

        <script type="text/x-template" id="twitter-app-preview-template">
            <a href="https://dev.twitter.com/cards/types/app" target="_blank">Preview Available Here</a>
        </script>

        <script type="text/x-template" id="seo-item-stats-template">
            <div style="cursor: pointer;">
                <div class="well text-center" style="margin-bottom: 14px;" :style="{background: background_color}">
                    <h1 style="margin-bottom: 0px;color: #fff">
                        <span>{{ total_percent.toFixed() }}%</span>
                    </h1>
                </div>
                <div class="progress">
                    <div v-if="success.length > 0" class="progress-bar progress-bar-success" style="width: {{ success_percent }}%">
                        <span>{{ success.length }} Success</span>
                    </div>
                    <div v-if="warnings.length > 0" class="progress-bar progress-bar-warning" style="width: {{ warnings_percent }}%">
                        <span>{{ warnings.length }} Warnings</span>
                    </div>
                    <div v-if="errors.length > 0" class="progress-bar progress-bar-danger" style="width: {{ errors_percent }}%">
                        <span>{{ errors.length }} Errors</span>
                    </div>
                </div>
            </div>
            <div v-if="expanded">
                <p v-if="errors.length"><span class="label label-danger">Errors</span></p>
                <p v-for="error in errors" class="text-danger"><span class="fa fa-exclamation-triangle"></span> {{{ error.message }}}</p>
                <p v-if="warnings.length"><span class="label label-warning">Warnings</span></p>
                <p v-for="warning in warnings" class="text-warning"><span class="fa fa-exclamation"></span> {{{ warning.message }}}</p>
                <p v-if="success.length"><span class="label label-success">Success</span></p>
                <p v-for="s in success" class="text-success"><span class="fa fa-check"></span> {{{ s.message }}}</p>
            </div>
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.8.0/vue-resource.min.js"></script>
        <script src="https://unpkg.com/sortablejs@1.4.2"></script>
        <script src="https://unpkg.com/vue-sortable@latest"></script>

    <?php
    echo "<script>

            function whmcsUrl(item){
                if(item.type == 'kbcat'){
                    return 'knowledgebase.php?action=displaycat&catid=' + item.rel_id;
                }else if(item.type == 'kbtag'){
                    return 'knowledgebase.php?tag=' + item.rel_id;
                }else if(item.type == 'kbarticle'){
                    return 'knowledgebase.php?action=displayarticle&id=' + item.rel_id;
                }else if(item.type == 'announcement'){
                    return 'announcements.php?id=' + item.rel_id;
                }else if(item.type == 'dlcat'){
                    return 'downloads.php?action=displaycat&catid=' + item.rel_id;
                }else if(item.type == 'cartgroup'){
                    return 'cart.php?gid=' + item.rel_id;
                }
                
                return item.rel_id;
            }

            function readability(data) {
            
              // Check to see if they entered something
              var len = data.length;
              if (data.length === 0) {
                alert(\"Enter something!\");
              } else {
                var totalSyllables = 0;
                var totalSentences = 0;
                var totalWords     = 0;
            
                var delimiters = '.:;?! !@#$%^&*()+';
                var words = splitTokens(data, delimiters);
                for (var i = 0; i < words.length; i++) {
                  var word = words[i];
                  totalSyllables += countSyllables(word);
                  totalWords++;
                }
            
                // Look for sentence delimiters
                var sentenceDelim = '.:;?!';
                var sentences = splitTokens(data, sentenceDelim);
                totalSentences = sentences.length;
            
                // Calculate flesch index
                var f1 = 206.835;
                var f2 = 84.6;
                var f3 = 1.015;
                var r1 = totalSyllables / totalWords;
                var r2 = totalWords / totalSentences;
                var flesch = f1 - (f2 * r1) - (f3 * r2);
            
                // Write Report
                var report = \"\";
                
                report += \"Total Syllables: \" + totalSyllables + \"<br/>\";
                report += \"Total Words    : \" + totalWords + \"<br/>\";
                report += \"Total Sentences: \" + totalSentences + \"<br/>\";
                report += \"Flesch Index   : \" + flesch;   
                
                return flesch;
              }
            }
            
            function splitTokens(text, delims) {
              var d,sqo,sqc,str;
              str = delims;
                sqc = /\]/g.exec(str);
                sqo = /\[/g.exec(str);
                if ( sqo && sqc ) {
                  str = str.slice(0, sqc.index) + str.slice(sqc.index+1);
                  sqo = /\[/g.exec(str);
                  str = str.slice(0, sqo.index) + str.slice(sqo.index+1);
                  d = new RegExp('[\\['+str+'\\]]','g');
                } else if ( sqc ) {
                  str = str.slice(0, sqc.index) + str.slice(sqc.index+1);
                  d = new RegExp('[' + str + '\\]]', 'g');
                } else if(sqo) {
                  str = str.slice(0, sqo.index) + str.slice(sqo.index+1);
                  d = new RegExp('[' + str + '\\[]', 'g');
                } else {
                  d = new RegExp('[' + str + ']', 'g');
                }
              return text.split(d).filter(function(n){return n;});
            }
            
            function countSyllables(word) {
              var syl    = 0;
              var vowel  = false;
              var length = word.length;
            
              // Check each word for vowels (don't count more than one vowel in a row)
              for (var i = 0; i < length; i++) {
                if (isVowel(word.charAt(i)) && (vowel == false)) {
                  vowel = true;
                  syl++;
                } else if (isVowel(word.charAt(i)) && (vowel == true)) {
                  vowel = true;
                } else {
                  vowel = false;
                }
              }
            
              var tempChar = word.charAt(word.length-1);
              // Check for 'e' at the end, as long as not a word w/ one syllable
              if (((tempChar == 'e') || (tempChar == 'E')) && (syl != 1)) {
                syl--;
              }
              return syl;
            }
            
            function isVowel(c) {
              if      ((c == 'a') || (c == 'A')) { return true;  }
              else if ((c == 'e') || (c == 'E')) { return true;  }
              else if ((c == 'i') || (c == 'I')) { return true;  }
              else if ((c == 'o') || (c == 'O')) { return true;  }
              else if ((c == 'u') || (c == 'U')) { return true;  }
              else if ((c == 'y') || (c == 'Y')) { return true;  }
              else                               { return false; }
            }

            (function($){
                var thetoken = $('form#settings input[name=\"token\"]').val();
                Vue.http.options.emulateJSON = true;
                
                Vue.filter('length', function (value) {
                    return (value) ? value.length : 0;
                });
                
                Vue.component('seo-item-stats', {
                    props: ['item', 'system-url', 'expanded'],
                    computed: {
                        background_color: function(){
                            if(this.total_percent > 65){
                                return '#5cb85c';
                            }else if(this.total_percent > 40){
                                return '#f0ad4e';
                            }else{
                                return '#f0ad4e';
                            }
                        },
                        total_percent: function(){
                            var total = 0;
                            var score = 0;
                            this.errors.forEach(function(error){
                                total += error.weight;
                                score += error.score;
                            });
                            this.warnings.forEach(function(warning){
                                total += warning.weight;
                                score += warning.score;
                            });
                            this.success.forEach(function(s){
                                total += s.weight;
                                score += s.score;
                            });
                            
                            return (score / total) * 100;
                        },
                        success_percent: function(){
                           var total = this.success.length + this.warnings.length + this.errors.length;
                           return (this.success.length / total) * 100;
                        },
                        warnings_percent: function(){
                           var total = this.success.length + this.warnings.length + this.errors.length;
                           return (this.warnings.length / total) * 100;
                        },
                        errors_percent: function(){
                           var total = this.success.length + this.warnings.length + this.errors.length;
                           return (this.errors.length / total) * 100;
                        },
                        errors: function(){
                            var errors = [];
                            
                            // Title
                            if(
                                    !this.item.fields.hasOwnProperty('title') || 
                                    Object.keys(this.item.fields.title).length == 0 || 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]] == ''
                            ){
                                errors.push({
                                    message: 'You have not added a targeted page title.',
                                    weight: 20,
                                    score: 0
                                });
                            }
                            
                            // Description
                            if(
                                    !this.item.fields.hasOwnProperty('desc') || 
                                    Object.keys(this.item.fields.desc).length == 0 || 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] == ''
                            ){
                                errors.push({
                                    message: 'You have not added a targeted page description.',
                                    weight: 20,
                                    score: 0
                                });
                            }
                            
                            // Keywords
                            if(
                                    this.item.fields.hasOwnProperty('keyword') && 
                                    Object.keys(this.item.fields.keyword).length > 0
                            ){
                            
                                var keywords = this.item.fields.keyword[Object.keys(this.item.fields.keyword)[0]].split(',').map(function(item){
                                    return item.toLowerCase().trim();
                                }).filter(function(item){
                                    return item != '';
                                });
                                if(keywords.length > 6){
                                    errors.push({
                                        message: 'You have added ' + keywords.length + ' keywords, this is considered \"keyword stuffing\" which is frowned upon.',
                                        weight: 20,
                                        score: 0
                                    });
                                }
                            }else{
                                errors.push({
                                        message: 'You have added 0 keywords, consider adding some as they are key to categorising your page.',
                                        weight: 20,
                                        score: 0
                                    });
                            }
                            
                            return errors;
                        },
                        warnings: function(){
                            var warnings = [];
                            
                            // Title
                            if(
                                    this.item.fields.hasOwnProperty('title') && 
                                    Object.keys(this.item.fields.title).length > 0 && 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]] != '' && 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]].length < 40
                            ){
                                warnings.push({
                                    message: 'You have added a targeted page title, but its a little short.',
                                    weight: 20,
                                    score: 10
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('title') && 
                                    Object.keys(this.item.fields.title).length > 0 && 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]] != '' && 
                                    readability(this.item.fields.title[Object.keys(this.item.fields.title)[0]]) < 50
                            ){
                                warnings.push({
                                    message: 'Your title appears to be hard to read with a Flesch Kincaid index of ' + readability(this.item.fields.title[Object.keys(this.item.fields.title)[0]]).toFixed(2) + '. Consider reducing its complexity.',
                                    weight: 10,
                                    score: 5
                                });
                            }
                            
                            // Description
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]].length < 120
                            ){
                                warnings.push({
                                    message: 'You have added a targeted page description, but its a little short.',
                                    weight: 20,
                                    score: 10
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    readability(this.item.fields.desc[Object.keys(this.item.fields.desc)[0]]) < 50
                            ){
                                warnings.push({
                                    message: 'Your description appears to be hard to read with a Flesch Kincaid index of ' + readability(this.item.fields.desc[Object.keys(this.item.fields.desc)[0]]).toFixed(2) + '. Consider reducing its complexity.',
                                    weight: 10,
                                    score: 5
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    this.item.fields.hasOwnProperty('keyword') && 
                                    this.item.fields.keyword.hasOwnProperty(Object.keys(this.item.fields.desc)[0])
                            ){
                            
                                var keywords = this.item.fields.keyword[Object.keys(this.item.fields.desc)[0]].split(',').map(function(item){
                                    return item.toLowerCase().trim();
                                }).filter(function(item){
                                    return item != '';
                                });
                                var description = this.item.fields.desc[Object.keys(this.item.fields.desc)[0]].toLowerCase();
                                
                                keywords.forEach(function(keyword){
                                    if(description.indexOf(keyword) == -1){
                                        warnings.push({
                                            message: 'The keyword <strong>' + keyword + '<\/strong> doesn\'t appear in your description.',
                                            weight: 6,
                                            score: 0
                                        });
                                    }
                                });
                            }
                            
                            // Keywords
                            if(
                                    this.item.fields.hasOwnProperty('keyword') && 
                                    Object.keys(this.item.fields.keyword).length > 0 && 
                                    this.item.fields.keyword[Object.keys(this.item.fields.keyword)[0]] != ''
                            ){
                            
                                var keywords = this.item.fields.keyword[Object.keys(this.item.fields.keyword)[0]].split(',').map(function(item){
                                    return item.toLowerCase().trim();
                                }).filter(function(item){
                                    return item != '';
                                });
                                if(keywords.length < 3){
                                    warnings.push({
                                        message: 'You have only added ' + keywords.length + ' keywords, consider adding more.',
                                        weight: 20,
                                        score: 5
                                    });
                                }
                            }
                            
                            // Bots
                            if(
                                    this.item.fields.hasOwnProperty('bots_index') && 
                                    this.item.fields.bots_index == true
                            ){
                                warnings.push({
                                    message: 'You have instructed search engines not to index this page, is that wise?',
                                    weight: 10,
                                    score: 0
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('bots_follow') && 
                                    this.item.fields.bots_follow == true
                            ){
                                warnings.push({
                                    message: 'You have instructed search engines not to follow links in this page, is that wise?',
                                    weight: 6,
                                    score: 0
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('bots_archive') && 
                                    this.item.fields.bots_archive == true
                            ){
                                warnings.push({
                                    message: 'You have instructed search engines not to archive this page, is that wise?',
                                    weight: 6,
                                    score: 0
                                });
                            }
                            
                            return warnings;
                        },
                        success: function(){
                            var success = [];
                            
                            // Title
                            if(
                                    this.item.fields.hasOwnProperty('title') && 
                                    Object.keys(this.item.fields.title).length > 0 &&  
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]].length > 39 && 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]].length < 60
                            ){
                                success.push({
                                    message: 'Great! Your page title is of the required length.',
                                    weight: 20,
                                    score: 20
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('title') && 
                                    Object.keys(this.item.fields.title).length > 0 && 
                                    this.item.fields.title[Object.keys(this.item.fields.title)[0]] != '' && 
                                    readability(this.item.fields.title[Object.keys(this.item.fields.title)[0]]) >= 50
                            ){
                                success.push({
                                    message: 'Your title appears easy to read with a Flesch Kincaid index of ' + readability(this.item.fields.title[Object.keys(this.item.fields.title)[0]]).toFixed(2) + '.',
                                    weight: 10,
                                    score: 10
                                });
                            }
                            
                            // Description
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]].length > 119 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]].length < 161
                            ){
                                success.push({
                                    message: 'Great! Your page description is within a suitable length.',
                                    weight: 20,
                                    score: 20
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    readability(this.item.fields.desc[Object.keys(this.item.fields.desc)[0]]) >= 50
                            ){
                                success.push({
                                    message: 'Great! Your description appears easy to read with a Flesch Kincaid index of ' + readability(this.item.fields.desc[Object.keys(this.item.fields.desc)[0]]).toFixed(2) + '.',
                                    weight: 10,
                                    score: 10
                                });
                            }
                            if(
                                    this.item.fields.hasOwnProperty('desc') && 
                                    Object.keys(this.item.fields.desc).length > 0 && 
                                    this.item.fields.desc[Object.keys(this.item.fields.desc)[0]] != '' && 
                                    this.item.fields.hasOwnProperty('keyword') && 
                                    this.item.fields.keyword.hasOwnProperty(Object.keys(this.item.fields.desc)[0])
                            ){
                            
                                var keywords = this.item.fields.keyword[Object.keys(this.item.fields.desc)[0]].split(',').map(function(item){
                                    return item.toLowerCase().trim();
                                }).filter(function(item){
                                    return item != '';
                                });
                                var description = this.item.fields.desc[Object.keys(this.item.fields.desc)[0]].toLowerCase();
                                
                                keywords.forEach(function(keyword){
                                    if(description.indexOf(keyword) != -1){
                                        success.push({
                                            message: 'Great! The keyword <strong>' + keyword + '<\/strong> appears in your description.',
                                            weight: 6,
                                            score: 6
                                        });
                                    }
                                });
                            }
                            
                            // Keywords
                            if(
                                    this.item.fields.hasOwnProperty('keyword') && 
                                    Object.keys(this.item.fields.keyword).length > 0 && 
                                    this.item.fields.keyword[Object.keys(this.item.fields.keyword)[0]] != ''
                            ){
                            
                                var keywords = this.item.fields.keyword[Object.keys(this.item.fields.keyword)[0]].split(',').map(function(item){
                                    return item.toLowerCase().trim();
                                }).filter(function(item){
                                    return item != '';
                                });
                                if(keywords.length > 2 && keywords.length < 7){
                                    success.push({
                                        message: 'You have  added ' + keywords.length + ' keywords, that\'s perfect.',
                                        weight: 20,
                                        score: 20
                                    });
                                }
                            }
                            
                            return success;
                        }
                    },
                    template: '#seo-item-stats-template'
                });
                
                Vue.component('seo-preview', {
                    props: ['item', 'system-url'],
                    template: '#seo-preview-template',
                    methods: {
                        generateUrl: function(){
                            return this.systemUrl + whmcsUrl(this.item);
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType && field.language == 'english';
                            })['value'];
                        }
                    }
                });
                
                Vue.component('twitter-summary-preview', {
                    props: ['item', 'system-url'],
                    template: '#twitter-summary-preview-template',
                    computed: {
                        imagePreview: function(){
                            var img = this.item.fields.twitterimage;
                            var pattern = /^((https?):)?\/\/.*(jpeg|jpg|png|gif|bmp)$/;
                            if(this.item.fields.twitterimage != '' && pattern.test(img)){
                                return img;
                            }
                            return '//placehold.it/250x250?text=Preview%20Image';
                        }
                    },
                    methods: {
                        generateUrl: function(){
                            return this.systemUrl + whmcsUrl(this.item);
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType;
                            })['value'];
                        }
                    }
                });
                
                Vue.component('twitter-image-preview', {
                    props: ['item', 'system-url'],
                    template: '#twitter-image-preview-template',
                    computed: {
                        imagePreview: function(){
                            var img = this.item.fields.twitterimage;
                            var pattern = /^((https?):)?\/\/.*(jpeg|jpg|png|gif|bmp)$/;
                            if(this.item.fields.twitterimage != '' && pattern.test(img)){
                                return img;
                            }
                            return '//placehold.it/760x250?text=Preview%20Image';
                        }
                    },
                    methods: {
                        generateUrl: function(){
                            return this.systemUrl + whmcsUrl(this.item);
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType;
                            })['value'];
                        }
                    }
                });
                
                Vue.component('twitter-player-preview', {
                    props: ['item', 'system-url'],
                    template: '#twitter-player-preview-template',
                    computed: {
                        imagePreview: function(){
                            var img = this.item.fields.twitterimage;
                            var pattern = /^((https?):)?\/\/.*(jpeg|jpg|png|gif|bmp)$/;
                            if(this.item.fields.twitterimage != '' && pattern.test(img)){
                                return img;
                            }
                            return '//placehold.it/760x250?text=Preview%20Image';
                        }
                    },
                    methods: {
                        generateUrl: function(){
                            return this.systemUrl + whmcsUrl(this.item);
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType;
                            })['value'];
                        }
                    }
                });
                
                Vue.component('twitter-app-preview', {
                    props: ['item', 'system-url'],
                    template: '#twitter-app-preview-template',
                    methods: {
                        generateUrl: function(){
                            return this.systemUrl + whmcsUrl(this.item);
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType;
                            })['value'];
                        }
                    }
                });
                
                new Vue({
                    el: '#settings',
                    data: {
                        settings: ". json_encode((array) $seo->getSettings()).",
                        items: ". json_encode((array) $seo->getItems()).",
                        items_to_delete: [],
                        systemUrl: '".Capsule::table('tblconfiguration')->where('setting', 'SystemUrl')->value('value')."',
                        item_to_edit: null,
                        current_drag_field: null,
                        loading: true,
                        languages: ".json_encode(\WHMCS\Language\AdminLanguage::getLanguages()).",
                        download_cats: ".json_encode($dlCats).",
                        knowledgebase_cats: ".json_encode($knowledgebaseCats).",
                        knowledgebase_tags: ".json_encode($knowledgebaseTags).",
                        knowledgebase_articles: ".json_encode($knowledgebaseArticles).",
                        system_announcements: ".json_encode($announcements).",
                        system_cartgroups: ".json_encode($cartGroups).",
                        field_settings: [
                            {
                                title: 'General Settings',
                                closes: true,
                                open: true,
                                fields: [
                                    {
                                        id: 'title',
                                        label: 'Page Title',
                                        description: 'Enter the desired title of this Url.',
                                        type: 'text',
                                        language: true,
                                        count: true
                                    },
                                    {
                                        id: 'desc',
                                        label: 'Description',
                                        description: 'Enter the desired description of this Url.',
                                        type: 'textarea',
                                        language: true
                                    },
                                    {
                                        id: 'keyword',
                                        label: 'Keywords',
                                        description: 'Enter a comma separated list of words that best describe the page.',
                                        type: 'text',
                                        language: true
                                    },
                                    {
                                        id: 'robots',
                                        label: 'Robots Tag',
                                        description: 'Optionally choose to add some specific indexing tags to the page.',
                                        type: 'bots',
                                        language: false
                                    }
                                ]
                            },
                            {
                                title: 'Twitter Card Details',
                                closes: true,
                                open: false,
                                fields: [
                                    {
                                        id: 'preview',
                                        label: 'Card Preview',
                                        description: 'This is an estimation of what your card will look like.',
                                        type: 'twitter-preview',
                                        language: false
                                    },
                                    {
                                        id: 'twittercard',
                                        label: 'Card Type',
                                        description: 'Choose the desired card type.',
                                        type: 'select',
                                        language: false,
                                        options: [
                                            'summary',
                                            'summary_large_image',
                                            'app',
                                            'player'
                                        ]
                                    },
                                    {
                                        id: 'twittercreator',
                                        label: 'Twitter Username',
                                        description: 'Enter the desired twitter user attributed for this Url.',
                                        type: 'text',
                                        language: false
                                    },
                                    {
                                        id: 'twittertitle',
                                        label: 'Card Title',
                                        description: 'Enter the desired card title.',
                                        type: 'text',
                                        language: false,
                                        count: true
                                    },
                                    {
                                        id: 'twitterdesc',
                                        label: 'Card Description',
                                        description: 'Enter the desired card description.',
                                        type: 'textarea',
                                        language: false,
                                        count: true
                                    },
                                    {
                                        id: 'twitterimage',
                                        label: 'Card Image Url',
                                        description: 'Choose an image for the card.',
                                        type: 'text',
                                        language: false
                                    },
                                    {
                                        id: 'twittervideo',
                                        label: 'Card Video Url',
                                        description: 'Choose an video for the card.',
                                        type: 'text',
                                        language: false
                                    }
                                ]
                            },
                            {
                                title: 'Open Graph Details',
                                closes: true,
                                open: false,
                                fields: [
                                    {
                                        id: 'ogtitle',
                                        label: 'Title',
                                        description: 'Enter the page title.',
                                        type: 'text',
                                        language: true,
                                        count: true
                                    },
                                    {
                                        id: 'ogdesc',
                                        label: 'Description',
                                        description: 'Enter the desired description.',
                                        type: 'textarea',
                                        language: true,
                                        count: true
                                    },
                                    {
                                        id: 'ogimage',
                                        label: 'Image Url',
                                        description: 'Choose an image for the Open Graph Readers.',
                                        type: 'text',
                                        language: false
                                    },
                                    {
                                        id: 'ogsection',
                                        label: 'Section',
                                        description: 'Choose a section to categories the page.',
                                        type: 'text',
                                        language: false
                                    },
                                    {
                                        id: 'ogtag',
                                        label: 'Tag',
                                        description: 'Choose tags to associate with the page, comma seperated list.',
                                        type: 'text',
                                        language: false
                                    }
                                ]
                            },
                            {
                                title: 'Statistics',
                                closes: true,
                                open: false,
                                fields: [
                                    {
                                        id: 'stats',
                                        label: 'SEO Stats',
                                        description: 'These are the stats generated from your settings.',
                                        type: 'stats',
                                        language: false
                                    }
                                ]
                            }
                        ]
                    },
                    computed: {
                        pages: function(){
                            return this.items.filter(function(item){
                                return item.type == 'page';
                            });
                        },
                        announcements: function(){
                            return this.items.filter(function(item){
                                return item.type == 'announcement';
                            });
                        },
                        kbcats: function(){
                            return this.items.filter(function(item){
                                return item.type == 'kbcat';
                            });
                        },
                        kbtags: function(){
                            return this.items.filter(function(item){
                                return item.type == 'kbtag';
                            });
                        },
                        kbarticles: function(){
                            return this.items.filter(function(item){
                                return item.type == 'kbarticle';
                            });
                        },
                        dlcats: function(){
                            return this.items.filter(function(item){
                                return item.type == 'dlcat';
                            });
                        },
                        cartgroups: function(){
                            return this.items.filter(function(item){
                                return item.type == 'cartgroup';
                            });
                        },
                        dlcatsdropdown: function(){
                            return this.download_cats.map(function(cat){
                                return Object.assign(cat, {
                                    disabled: this.dlcats.filter(function(item){return item.rel_id == cat.id}).length > 0
                                });
                            }.bind(this));
                        },
                        kbcatsdropdown: function(){
                            return this.knowledgebase_cats.map(function(cat){
                                return Object.assign(cat, {
                                    disabled: this.kbcats.filter(function(item){return item.rel_id == cat.id}).length > 0
                                });
                            }.bind(this));
                        },
                        kbtagsdropdown: function(){
                            return this.knowledgebase_tags.map(function(tag){
                                return Object.assign(tag, {
                                    disabled: this.kbtags.filter(function(item){return item.rel_id == tag.tag}).length > 0
                                });
                            }.bind(this));
                        },
                        kbarticlesdropdown: function(){
                            return this.knowledgebase_articles.map(function(article){
                                return Object.assign(article, {
                                    disabled: this.kbarticles.filter(function(item){return item.rel_id == article.id}).length > 0
                                });
                            }.bind(this));
                        },
                        announcementsdropdown: function(){
                            return this.system_announcements.map(function(article){
                                return Object.assign(article, {
                                    disabled: this.announcements.filter(function(item){return item.rel_id == article.id}).length > 0
                                });
                            }.bind(this));
                        },
                        cartgroupsdropdown: function(){
                            return this.system_cartgroups.map(function(group){
                                return Object.assign(group, {
                                    disabled: this.cartgroups.filter(function(item){return item.rel_id == group.id}).length > 0
                                });
                            }.bind(this));
                        }
                    },
                    created: function(){
                        this.loading = false;
                    },
                    methods : {
                        generateUrl: function(item_to_edit){
                            return this.systemUrl + whmcsUrl(item_to_edit);
                        },
                        generateModalTitle: function(item){
                            if(item.type == 'kbcat'){
                                return this.getKbCat(item.rel_id).name;
                            }else if(item.type == 'kbtag'){
                                return this.getKbTag(item.rel_id).tag;
                            }else if(item.type == 'kbarticle'){
                                return this.getKbArticle(item.rel_id).title;
                            }else if(item.type == 'announcement'){
                                return this.getAnnouncement(item.rel_id).title;
                            }else if(item.type == 'dlcat'){
                                return this.getDlCat(item.rel_id).name;
                            }else if(item.type == 'cartgroup'){
                                return this.getCartGroup(item.rel_id).name;
                            }
                            
                            return this.systemUrl + item.rel_id;
                        },
                        getKbCat: function(id){
                            return this.knowledgebase_cats.find(function(i){return i.id == id});
                        },
                        getKbTag: function(id){
                            return this.knowledgebase_tags.find(function(i){return i.tag == id});
                        },
                        getKbArticle: function(id){
                            return this.knowledgebase_articles.find(function(i){return i.id == id});
                        },
                        getAnnouncement: function(id){
                            return this.system_announcements.find(function(i){return i.id == id});
                        },
                        getDlCat: function(id){
                            return this.download_cats.find(function(i){return i.id == id});
                        },
                        getCartGroup: function(id){
                            return this.system_cartgroups.find(function(i){return i.id == id});
                        },
                        removeMetaTag: function(tag, event){
                            event.preventDefault();
                            this.settings.meta_tags.\$remove(tag);
                        },
                        addMetaTag: function(event){
                            event.preventDefault();
                            if(!this.settings.hasOwnProperty('meta_tags')){
                                this.settings = Object.assign({}, this.settings, {meta_tags: []});
                            }
                            this.settings.meta_tags.push({tag: '', value: ''});
                        },
                        onUpdate: function(event){
                            var keys = Object.keys(this.item_to_edit.fields[this.current_drag_field]);
                            keys.splice(event.newIndex, 0, keys.splice(event.oldIndex, 1)[0]);
                            var newOrder = {};
                            keys.forEach(function(key){
                                newOrder[key] = this.item_to_edit.fields[this.current_drag_field][key];
                            }.bind(this));
                            this.item_to_edit.fields[this.current_drag_field] = newOrder;
                        },
                        addLanguageToField: function(field, language, e){
                            e.preventDefault();
                            this.items.forEach(function(item, index){
                                if(this.item_to_edit.type == item.type && this.item_to_edit.rel_id == item.rel_id){
                                
                                    if(!item.fields.hasOwnProperty(field)){
                                        var newObj = {};
                                        newObj[field] = {};
                                        item.fields = Object.assign({}, item.fields, newObj);
                                    }
                                    
                                    var newObj2 = {};
                                    newObj2[language] = '';
                                    item.fields[field] = Object.assign({}, item.fields[field], newObj2);
                                }
                            }.bind(this));
                        },
                        removeLanguageField: function(field, language, e){
                            e.preventDefault();
                            this.items.forEach(function(item, index){
                                if(this.item_to_edit.type == item.type && this.item_to_edit.rel_id == item.rel_id){

                                    var newObj = {};
                                    for(var i in item.fields[field]){
                                        if(i !== language){
                                            newObj[i] = item.fields[field][i];
                                        }
                                    }
                                    item.fields[field] = Object.assign({}, newObj);
                                }
                            }.bind(this));
                        },
                        getItemFieldValue: function(item, fieldType){
                            return item.fields.find(function(field){
                                return field.type == fieldType && field.language == 'english';
                            });
                        },
                        editItem: function(item, e){
                            e.preventDefault();
                            this.item_to_edit = item;
                            $('#editItem').modal('show');
                        },
                        addItem: function(obj, e){
                            e.preventDefault();
                            this.items.push(Object.assign({
                                type: obj.type,
                                rel_id: '',
                                fields: {}
                            }, obj));
                            this.editItem(this.items[this.items.length-1], e);
                        },
                        deleteItem: function(item, e){
                            e.preventDefault();
                            if(item.hasOwnProperty('id')){
                                this.items_to_delete.push(item.id);
                            }
                            this.items.\$remove(item);
                        },
                        onClick: function(e){
                            e.preventDefault();
                            this.loading = true;
                            this.\$http.post('addonmodules.php?module=whmcs_seo', {save: true, data: {items: this.items, items_to_delete: this.items_to_delete, settings: this.settings}, token: thetoken}, function (data, status) {
                                    if(data.success == true){
                                        if(data.hasOwnProperty('settings')){
                                            this.settings = data.settings;
                                        }
                                        if(data.hasOwnProperty('items')){
                                            this.items = data.items;
                                        }
                                        this.items_to_delete = [];

                                        $('.successbox').fadeIn().delay(2000).fadeOut();
                                        $('body').scrollTop(100);

                                    }
                                    this.loading = false;
                              }).error(function (data, status) {
                                  console.log(data);
                                  console.log(status);
                                  this.loading = false;
                              });
                        }
                    }
                });
            })(jQuery);
        </script>";
}

function whmcs_seo_sidebar($vars) {

    global $CONFIG;

    $sidebar = '<span class="header"><img src="images/icons/addonmodules.png" class="absmiddle" width="16" height="16" /> WHMCS SEO</span>

    <ul class="menu">
        <li><a href="configaddonmods.php#whmcs_seo">Configure Module</a></li>
        <li><a href="'.$vars['modulelink'].'">Manage SEO Settings</a></li>
        <li><a href="'.$CONFIG['SystemURL'].'/?m=whmcs_seo&feed=products" target="_blank">Products RSS Feed</a></li>
		<li><a href="'.$CONFIG['SystemURL'].'/?m=whmcs_seo&feed=knowledgebase" target="_blank">Knowdlegebase RSS Feed</a></li>
		<li><a href="'.$CONFIG['SystemURL'].'/?m=whmcs_seo&feed=announcements" target="_blank">Announcements RSS Feed</a></li>
		<li><a href="'.$CONFIG['SystemURL'].'/?m=whmcs_seo&feed=networkissues" target="_blank">Network Issues RSS Feed</a></li>
		<li><a href="'.$vars['modulelink'].'">Version: '.$vars['version'].'</a></li>
		<li><a href="http://clients.no-half-pixels.com/submitticket.php" target="_blank">Get Support</a></li>
		<li><a href="http://clients.no-half-pixels.com/whmcs-modules" target="_blank">More Great Addons!</a></li>

    </ul>';

    return $sidebar;
}



function whmcs_seo_clientarea($vars){
	global $_LANG;
	$_LANG['addonm'] = $vars['_lang'];
    if(!class_exists('Seo')){
        require_once(dirname(__FILE__) . '/Seo.php');
    }

	if(isset($_GET['action']) && $_GET['action'] == 'robots'){
		header("Content-Type: text/plain");
        $settings = Seo::getInstance()->getSettings();
		echo $settings['robots_content'];
		exit();
	}elseif(isset($_GET['feed'])){
		include(dirname(__FILE__).'/rss.php');
		exit();
	}
}
