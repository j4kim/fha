<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model implements Breadcrumbable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d.m.y H:i');
    }

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
