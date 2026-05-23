<?php

namespace App\Policies;

use App\Models\SiteSettings;
use App\Models\User;

class SiteSettingsPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, SiteSettings $siteSettings): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, SiteSettings $siteSettings): bool
    {
        return true;
    }

    public function delete(User $user, SiteSettings $siteSettings): bool
    {
        return true;
    }

    public function restore(User $user, SiteSettings $siteSettings): bool
    {
        return true;
    }

    public function forceDelete(User $user, SiteSettings $siteSettings): bool
    {
        return true;
    }
}