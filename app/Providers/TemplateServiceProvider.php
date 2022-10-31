<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $template = config("app.template");

        $views = base_path("templates/$template/views");

        $this->loadViewsFrom($views, "template");

        $translations = base_path("templates/$template/lang");

        $this->loadTranslationsFrom($translations, "template");
    }
}
