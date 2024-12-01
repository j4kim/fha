<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model implements Breadcrumbable
{
    use HasFactory, SoftDeletes;

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d.m.y H:i');
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function getTitle()
    {
        return "Lot $this->ref";
    }

    public function getHref()
    {
        return route('lots.show', [$this->fund_id, $this->id]);
    }
}
