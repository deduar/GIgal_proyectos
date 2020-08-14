<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name','code','url','category_id','description','user_id'];

    /**
     * Get the category record associated with the project.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user record associated with the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
