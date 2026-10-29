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

    public function storeAvatar(string $oldAvatar, array $request): string
    {
        Storage::disk('public')->delete('images/user_avatar/'. $oldAvatar);
        $path = $request['profilePicture']->store('images/user_avatar/','public');
        return basename($path);
    }

    public function updateLogo(string $logo,array $request ): string
    {
        Storage::disk('public')->delete('images/company_logo/'.$logo);
        $path = $request['companyLogo']->store('images/company_logo','public');
        return basename($path);
    }
}