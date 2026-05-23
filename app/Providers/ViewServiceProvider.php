<?php

namespace App\Providers;

use App\Models\SiteCustomization;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $settings = SiteCustomization::allSettings();
        
        $colors = SiteCustomization::getGroup('colors');
        $header = SiteCustomization::getGroup('header');
        $footer = SiteCustomization::getGroup('footer');
        $social = SiteCustomization::getGroup('social');
        $contact = SiteCustomization::getGroup('contact');
        
        $customizations = array_merge($settings, [
            'colors' => $colors,
            'header' => $header,
            'footer' => $footer,
            'social' => $social,
            'contact' => $contact,
        ]);
        
        view()->share('siteSettings', $customizations);
    }
}