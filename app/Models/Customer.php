<?php

namespace App\Models;

use App\Enums\CustomerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['uuid', 'institution_name', 'contact_name', 'email', 'phone', 'domain', 'address', 'city', 'province', 'status', 'notes'];

    protected function casts(): array
    {
        return ['status' => CustomerStatus::class];
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class);
    }
}
