<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'brand_id',
        'category_id',
        'short_description',
        'description',
        'price',
        'old_price',
        'stock_quantity',
        'sku',
        'main_image',
        'is_featured',
        'is_active',
        'view_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function specifications(): HasMany
    {
        return $this->hasMany(ProductSpecification::class)->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if ($this->old_price && $this->old_price > $this->price) {
            return round((($this->old_price - $this->price) / $this->old_price) * 100);
        }
        return null;
    }

    public function isInStock(): bool
    {
        return $this->stock_quantity > 0;
    }

    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    public function getGroupedSpecifications(): array
    {
        $grouped = [];
        foreach ($this->specifications as $spec) {
            $grouped[$spec->spec_group][] = $spec;
        }
        return $grouped;
    }
}
