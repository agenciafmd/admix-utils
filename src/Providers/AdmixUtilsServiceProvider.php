<?php

namespace Agenciafmd\Admix\Providers;

use Agenciafmd\Admix\Support\Helpers\FormatCPF;
use Agenciafmd\Admix\Support\Helpers\FormatRG;
use Agenciafmd\Admix\Support\Helpers\IsFullname;
use Agenciafmd\Admix\Support\Helpers\OnlyNumbers;
use Agenciafmd\Admix\Support\Helpers\RemoveAccents;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AdmixUtilsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslations();

        $this->loadMacros();
    }

    public function register()
    {
        // 
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'agenciafmd/utils');
    }

    private function loadMacros()
    {
        Str::macro('formatCPF', FormatCPF::make());
        Str::macro('formatRG', FormatRG::make());
        Str::macro('isFullname', IsFullname::make());
        Str::macro('onlyNumbers', OnlyNumbers::make());
        Str::macro('removeAccents', RemoveAccents::make());
    }
}
