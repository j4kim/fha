<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model implements Breadcrumbable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'updated_at' => 'datetime:d.m.Y H:i',
    ];

    public function lots()
    {
        return $this->hasMany(Lot::class);
    }

    public function getTitle()
    {
        return $this->ref;
    }

    public function getHref()
    {
        return route('funds.show', $this->id);
    }
}
