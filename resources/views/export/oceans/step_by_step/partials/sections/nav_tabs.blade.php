
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <h3>Shipment Entry</h3>
                            @include("export.oceans.step_by_step.partials.sections.shipment_entries.fields")
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <h3>Cargo Loader</h3>
                            @include("export.oceans.step_by_step.partials.sections.cargo_loader.fields")
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <h3>Booking Entry</h3>
                            @include("export.oceans.step_by_step.partials.sections.booking_entries.fields")

                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3>Bill of Lading</h3>
                            @include("export.oceans.step_by_step.partials.sections.bill_of_lading.fields")
                            <div class="row">
                                <button type="submit" class="btn btn-primary" id="btn-save">
                                    <i class="icon ion-android-done-all"></i> Save data
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
