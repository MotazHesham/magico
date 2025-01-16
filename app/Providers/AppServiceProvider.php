<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        // Base tenant storage directory
        $tenantStorageBasePath = storage_path('tenant');
    
        // Ensure the base path exists
        if (File::exists($tenantStorageBasePath)) {
            // Iterate over tenant directories
            foreach (File::directories($tenantStorageBasePath) as $tenantDirectory) {
                $tenantId = basename($tenantDirectory);
    
                // Define the public path for the tenant
                $tenantPublicPath =  public_path("tenant/{$tenantId}");
    
                // Define the tenant storage public directory
                $tenantStoragePublicPath = "{$tenantDirectory}/app/public"; 
                // Create the symbolic link if it doesn't exist
                try {
                    if (!File::exists($tenantPublicPath)) {
                        File::link($tenantStoragePublicPath, $tenantPublicPath);
                        if (File::exists($tenantPublicPath)) {
                            Log::info("Symbolic link created and verified: {$tenantPublicPath} -> {$tenantStoragePublicPath}");
                        } else {
                            Log::error("Symbolic link was logged but does not exist: {$tenantPublicPath}");
                        }
                    }
                } catch (\Exception $e) {
                    Log::error("Failed to create symbolic link: " . $e->getMessage());
                } 
            }
        }
    }
}
