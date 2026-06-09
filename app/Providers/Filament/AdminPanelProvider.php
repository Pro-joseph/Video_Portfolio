<?php

namespace App\Providers\Filament;

use App\Filament\Resources\PackageResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\TestimonialResource;
use App\Filament\Resources\PageSectionResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\ContactMessageResource;
use App\Filament\Resources\SiteSettingsResource;
use App\Filament\Resources\ClientResource;
use App\Filament\Resources\GalleryImageResource;
use App\Filament\Resources\SiteSettingsCustomResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $defaultBrandName = 'Oumalk Admin';
        $primaryColor = \App\Models\SiteCustomization::get('primary_color', null);
        
        $brandName = \App\Models\SiteCustomization::get('admin_brand_name', $defaultBrandName);
        
        $user = auth()->user();
        if ($user) {
            $brandName = $user->name ?: $user->email ?: $defaultBrandName;
        }
        
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName($brandName)
            ->colors([
                'primary' => $primaryColor ? Color::hex($primaryColor) : Color::Cyan,
            ])
            ->resources([
                PackageResource::class,
                ProjectResource::class,
                TestimonialResource::class,
                PageSectionResource::class,
                CategoryResource::class,
                ContactMessageResource::class,
                SiteSettingsResource::class,
                ClientResource::class,
                GalleryImageResource::class,
                SiteSettingsCustomResource::class,
            ])
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarCollapsibleOnDesktop();
    }
}