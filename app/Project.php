<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name','code','category_id','description'];

    /**
     * Get the category record associated with the project.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
