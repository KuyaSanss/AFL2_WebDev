<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /** Hanya untuk FAQ aktif, urut sesuai sort_order. */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)
                     ->orderBy('sort_order')
                     ->orderBy('id');
    }
}