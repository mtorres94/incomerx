<?php

namespace Sass\Providers;

use Illuminate\Support\ServiceProvider;

use Collective\Html\FormFacade as Form;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['lbl','col','label','name','value','placeholder']);
        Form::component('bsComplete', 'components.form.complete', ['lbl','col','label','name','tmp','value','tmp_value','placeholder','tab_id','tab_title','route']);
        Form::component('bsFile', 'components.form.file', ['label','name']);
        Form::component('bsMemo', 'components.form.memo', ['lbl','col','label','name','value','rows','placeholder']);
        Form::component('bsSelect', 'components.form.select', ['lbl','col','label','name','array','placeholder','flag']);
        Form::component('bsCheck', 'components.form.check', ['label','name']);
        Form::component('bsLabel', 'components.form.chk', ['value', 'label']);
        Form::component('bsDate', 'components.form.date', ['lbl', 'col', 'label','name','value','placeholder']);
        Form::component('bsSubmit', 'components.form.submit', []);
        Form::component('bsIndex', 'components.form.index', ['route','index']);
        Form::component('bsBack', 'components.form.back', ['route']);
        Form::component('bsBtnG', 'components.form.btngroup', ['show','edit','delete','obj']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
