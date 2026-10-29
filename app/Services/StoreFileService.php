<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StoreFileService
{
    public function storeCv(string $oldCV, array $request): string
    {
        Storage::disk('public')->delete('documents/cv/'. $oldCV);
        $path = $request['cv']->store('documents/cv/','public');
        return basename($path);
    }
}