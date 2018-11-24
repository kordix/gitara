<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Master;
use App\Category;
use App\Age;

class Gitara extends Model
{
    protected $guarded=[];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function masters()
    {
        return $this->hasMany(Master::class);
    }

    public function ages()
    {
        return $this->hasMany(Age::class);
    }
}
