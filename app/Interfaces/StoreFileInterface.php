<?php

namespace App\Interfaces;

interface StoreFileInterface
{
    public function storeCv(?string $oldCV, array $request): string;
    public function storeAvatar(?string $oldAvatar, array $request): string;
    public function updateLogo(string $logo,array $request ): string;
}