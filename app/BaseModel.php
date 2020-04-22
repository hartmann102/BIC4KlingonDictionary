<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App
 */
abstract class BaseModel extends Model
{
    /**
     * Set some columns on boot
     */
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model){
            $model->generateSlug();
        });

        static::creating(function ($model)
        {
            $model->generateSlug();
        });
    }

    /*
     * Set url-slug by using the name
     */
    protected function generateSlug()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->name);
    }

    /**
     * This columns cant be changed or set in a bulk.
     *
     * @var string[] $guarded
     */
    protected $guarded = ['id'];

    /**
     * Columns that should use Carbon/Carbon
     *
     * @var string[] $dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Defines a new slug for models
     *
     * @return string slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
