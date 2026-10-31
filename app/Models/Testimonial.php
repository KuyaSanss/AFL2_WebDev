<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'content',
        'rating',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'rating'     => 'integer',
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /** Hanya testimoni yang aktif, urut sesuai sort_order lalu terbaru. */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)
                     ->orderBy('sort_order')
                     ->orderByDesc('id');
    }

    /** Inisial untuk avatar, contoh: "Budi Santoso" -> "BS". */
    public function getInitialsAttribute(): string
    {
        return collect(explode(' ', trim($this->name)))
            ->filter()
            ->take(2)
            ->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))
            ->implode('');
    }
}