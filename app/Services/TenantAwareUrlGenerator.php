<?php

namespace App\Services;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class TenantAwareUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        if (tenancy()->initialized) {
            // We're in a tenant context
            $url = tenant_asset($this->getPathRelativeToRoot());
        } else {
            // We're in the central context
            $url = $this->getDisk()->url($this->getPathRelativeToRoot());
        }

        $url = $this->versionUrl($url);

        return $url;
    }
}