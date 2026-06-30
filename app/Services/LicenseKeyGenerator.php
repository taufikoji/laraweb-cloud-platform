<?php

namespace App\Services;

use App\Models\License;
use App\Models\Product;
use Illuminate\Support\Str;

class LicenseKeyGenerator
{
    public function generate(Product $product): string
    {
        do {
            $key = sprintf('LWC-%s-%s-%s-%s', strtoupper($product->code), now()->year, $this->segment(), $this->segment());
        } while (License::query()->where('license_key', $key)->exists());

        return $key;
    }

    private function segment(): string
    {
        return Str::upper(Str::random(4));
    }
}
