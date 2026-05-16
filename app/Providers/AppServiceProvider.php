<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $year = Year::where('active', 1)->first();
        $setting = Setting::first();
        // $semester = Semester::where('active', 1)->first();
        // View::share(['current_year' => $year, 'setting' => $setting, 'current_semester' => $semester]);
        View::share(['setting' => $setting]);
    }
}
