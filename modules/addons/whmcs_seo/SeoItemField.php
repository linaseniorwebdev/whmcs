<?php

/**
 * Created by PhpStorm.
 * User: leemason
 * Date: 10/02/2017
 * Time: 12:40
 */
class SeoItemField extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'mod_whmcs_seo_item_fields';

    protected $fillable = [
        'rel_id',
        'type',
        'language',
        'value'
    ];

    public function item()
    {
        return $this->belongsTo(SeoItem::class, 'rel_id');
    }

}