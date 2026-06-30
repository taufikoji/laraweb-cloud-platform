<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['uuid', 'name', 'slug', 'code', 'description', 'current_version', 'status'];

    protected function casts(): array
    {
        return ['status' => ProductStatus::class];
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class);
    }
}
