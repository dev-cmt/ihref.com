<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $settings = Setting::all();
        $company = $settings->firstWhere('section_name', 'Company');
        $images  = $settings->firstWhere('section_name', 'Images');

        View::share([
            'settings'      => $settings,
            'logo'          => $company?->image_path ?? '',
            'images'        => $images?->image_path ?? '',
            'favicon'       => $images?->string_0 ?? '',
            'logo_black'    => $images?->string_1 ?? '',
            'logo_white'    => $images?->string_2 ?? '',
            'description'   => $company?->image_path ?? '',
            'short_name'    => $company?->string_0 ?? '',
            'name'          => $company?->string_1 ?? '',
            'address'       => $company?->string_2 ?? '',
            'email'         => $company?->string_3 ?? '',
            'phone'         => $company?->string_4 ?? '',
            'phone_option'  => $company?->string_5 ?? '',
            'web_url'       => $company?->text_1 ?? '',
            'location'      => $company?->text_2 ?? '',
            'map_url'       => $company?->text_3 ?? '',
            'notice'        => $company?->text_4 ?? '',
        ]);
    }
}
