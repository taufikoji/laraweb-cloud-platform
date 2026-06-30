<?php

namespace Database\Seeders;

use App\Enums\ActivationRequestStatus;
use App\Enums\CustomerStatus;
use App\Enums\LicenseStatus;
use App\Enums\ProductStatus;
use App\Models\ActivationRequest;
use App\Models\Customer;
use App\Models\License;
use App\Models\Product;
use App\Models\User;
use App\Services\LicenseKeyGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(['email' => 'admin@laraweb.cloud'], ['name' => 'Laraweb Admin', 'password' => Hash::make('password')]);

        $product = Product::query()->firstOrCreate(['code' => 'EAR'], ['uuid' => (string) Str::uuid(), 'name' => 'Laraweb ERP Academic', 'slug' => 'laraweb-erp-academic', 'current_version' => '1.0.0', 'status' => ProductStatus::Active]);
        $customer = Customer::query()->firstOrCreate(['domain' => 'demo.edu'], ['uuid' => (string) Str::uuid(), 'institution_name' => 'Demo Institution', 'contact_name' => 'Demo Admin', 'email' => 'admin@demo.edu', 'status' => CustomerStatus::Active]);

        License::query()->firstOrCreate(['customer_id' => $customer->id, 'product_id' => $product->id], ['uuid' => (string) Str::uuid(), 'license_key' => app(LicenseKeyGenerator::class)->generate($product), 'domain' => 'demo.edu', 'installation_id' => 'demo-installation', 'starts_at' => now(), 'expires_at' => now()->addYear(), 'status' => LicenseStatus::Active]);
        ActivationRequest::query()->firstOrCreate(['domain' => 'pending.edu', 'installation_id' => 'pending-installation'], ['uuid' => (string) Str::uuid(), 'product_id' => $product->id, 'institution_name' => 'Pending Institution', 'contact_name' => 'Registrar', 'email' => 'registrar@pending.edu', 'status' => ActivationRequestStatus::Pending]);
    }
}
