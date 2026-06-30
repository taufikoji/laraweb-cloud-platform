<?php

namespace App\Models;

use App\Enums\LicenseStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class License extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['uuid', 'customer_id', 'product_id', 'license_key', 'domain', 'installation_id', 'max_users', 'starts_at', 'expires_at', 'last_checked_at', 'status', 'notes'];

    protected function casts(): array
    {
        return ['starts_at' => 'datetime', 'expires_at' => 'datetime', 'last_checked_at' => 'datetime', 'status' => LicenseStatus::class];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
