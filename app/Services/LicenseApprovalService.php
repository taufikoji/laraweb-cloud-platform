<?php

namespace App\Services;

use App\Enums\ActivationRequestStatus;
use App\Enums\CustomerStatus;
use App\Enums\LicenseStatus;
use App\Models\ActivationRequest;
use App\Models\Customer;
use App\Models\License;
use Illuminate\Support\Facades\DB;

class LicenseApprovalService
{
    public function __construct(private LicenseKeyGenerator $keys, private ActivityLogger $activity) {}

    public function approve(ActivationRequest $request): License
    {
        return DB::transaction(function () use ($request): License {
            $product = $request->product()->firstOrFail();
            $customer = $request->customer ?: Customer::query()->firstOrCreate(
                ['domain' => $request->domain],
                ['institution_name' => $request->institution_name, 'contact_name' => $request->contact_name, 'email' => $request->email, 'status' => CustomerStatus::Active]
            );

            $license = License::query()->create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'license_key' => $this->keys->generate($product),
                'domain' => $request->domain,
                'installation_id' => $request->installation_id,
                'starts_at' => now(),
                'status' => LicenseStatus::Active,
            ]);

            $request->forceFill(['customer_id' => $customer->id, 'status' => ActivationRequestStatus::Approved, 'reviewed_at' => now()])->save();
            $this->activity->log('activation.approved', 'Activation request approved and license created.', $request, ['license_id' => $license->id]);

            return $license;
        });
    }

    public function reject(ActivationRequest $request): ActivationRequest
    {
        $request->forceFill(['status' => ActivationRequestStatus::Rejected, 'reviewed_at' => now()])->save();
        $this->activity->log('activation.rejected', 'Activation request rejected.', $request);

        return $request;
    }
}
