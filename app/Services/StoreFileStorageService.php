<?php

namespace App\Services;

use App\Interfaces\StoreFileInterface;
use Illuminate\Support\Facades\Storage;

class StoreFileStorageService implements StoreFileInterface
{
    public function storeCv(?string $oldCV, array $request): string
    {
        if(isset($oldCV)){
            Storage::disk('public')->delete('documents/cv/'. $oldCV);
        }
        $path = $request['cv']->store('documents/cv/','public');
        return basename($path);
    }

    public function storeAvatar(?string $oldAvatar, array $request): string
    {
        if(isset($oldAvatar)){
            Storage::disk('public')->delete('images/user_avatar/'. $oldAvatar);
        }
        
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