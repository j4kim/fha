<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model implements Breadcrumbable
{
    use HasFactory, SoftDeletes;

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function getTitle()
    {
        return $this->ref;
    }

    public function getHref()
    {
        return route('lots.show', [$this->fund_id, $this->id]);
    }
}
