<?php

namespace App\Models;

use App\Enums\ActivationRequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivationRequest extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['uuid', 'product_id', 'customer_id', 'institution_name', 'contact_name', 'email', 'domain', 'installation_id', 'server_ip', 'app_version', 'status', 'message', 'reviewed_at'];

    protected function casts(): array
    {
        return ['reviewed_at' => 'datetime', 'status' => ActivationRequestStatus::class];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
