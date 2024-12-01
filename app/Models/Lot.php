<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model
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
}
