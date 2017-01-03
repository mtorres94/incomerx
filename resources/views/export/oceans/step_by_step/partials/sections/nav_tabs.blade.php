<div class="wizard-inner mt-element-step">
    <div class="row step-thin nav-tabs">
        <ul class="nav step" role="tablist">
            <li role="presentation" class="col-md-4 bg-gray active">
                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Shipment Entry">
                    <div class="mt-step-col">
                        <div class="mt-step-number bg-white font-grey-cascade">1</div>
                        <div class="mt-step-title uppercase font-grey-cascade">Shipment Entry</div>
                       <div class="mt-step-content font-grey-cascade">  </div>
                    </div>
                </a>
            </li>

            <li role="presentation" class="col-md-4 bg-gray disabled">
                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Loading Guide">
                    <div class="mt-step-col">
                        <div class="mt-step-number bg-white font-grey-cascade">2</div>
                        <div class="mt-step-title uppercase font-grey-cascade">Loading Guide</div>
                        <div class="mt-step-content font-grey-cascade">  </div>
                    </div>
                </a>
            </li>


            <li role="presentation" class="col-md-4 bg-gray disabled">
                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Bill of Lading">
                    <div class="mt-step-col">
                        <div class="mt-step-number bg-white font-grey-cascade">3</div>
                        <div class="mt-step-title uppercase font-grey-cascade">Bill of Lading</div>
                        <div class="mt-step-content font-grey-cascade">  </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>

<div class="tab-content step">
    <div  id="step1" class="tab-pane active" role="tabpanel">
        <section data-step="0">
            @include("export.oceans.step_by_step.partials.sections.shipment_entries.fields")
            <ul class="list-inline pull-right">
                <li><button type="button" id= "btn_shipment" class="btn btn-primary next-step">Continue</button></li>
            </ul>
        </section>
    </div>


    <div  id="step2" class="tab-pane" role="tabpanel">
        <section data-step="1">
            @include("export.oceans.step_by_step.partials.sections.cargo_loader.fields")
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button type="button" class="btn btn-primary next-step">Continue</button></li>
            </ul>
        </section>
    </div>

    <div  id="complete" class="tab-pane" role="tabpanel">
        <section data-step="2">
            @include("export.oceans.step_by_step.partials.sections.HBL_details.fields")
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                    {!! Form::bsSubmit() !!}
            </ul>
        </section>
    </div>
</div>
