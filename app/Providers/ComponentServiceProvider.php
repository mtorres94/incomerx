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
        Form::component('bsLabel', 'components.form.chk', ['value', 'label']); // Only for PDF generation
        Form::component('bsDate', 'components.form.date', ['lbl', 'col', 'label','name','value','placeholder']);
        Form::component('bsSubmit', 'components.form.submit', []);
        Form::component('bsSubmit', 'components.form.close', ['id']);
        Form::component('bsIndex', 'components.form.index', ['route','index']);
        Form::component('bsBack', 'components.form.back', ['route']);
        Form::component('bsGroup', 'components.form.btn-group', ['array', 'obj']);
        Form::component('bsRowTd', 'components.form.td', ['line', 'name', 'content', 'hidden']);
        Form::component('bsRowBtns', 'components.form.btns', []);
        Form::component('bsStep', 'components.form.step', ['tabs']);
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
