<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization as LocalizationFacade;

class NavbarComposer
{
    protected $users;

    public function __construct(LaravelLocalization $laravel_localization)
    {
        // Dependencies automatically resolved by service container...
        $this->laravel_localization = $laravel_localization;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $locales = $this->laravel_localization->getSupportedLocales();

        foreach($locales as &$loc) {
            $loc['native'] = mb_substr($loc['native'], 0, 3);
            if(LocalizationFacade::getCurrentLocaleName() == $loc['name']) {
                $loc['current'] = 1;
            }
        }

        $view->with('supported_locales', $locales);
    }
}