<div id="container_details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content ">
            <form id="ContainerModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Container Details</h4>
                    <h5 class="modal-title">Container Details</h5>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('container_line', null, ['id' => 'container_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('equipment_type_code', null, ['id' => 'equipment_type_code', 'class' => 'form-control input-sm']) !!}

                    <div class="row">
                        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Equip. Type', 'equipment_type_id', Sass\CargoType::all()->lists('code', 'id') , 'Type', 'body') !!}</div>
                        <div class="col-md-4">{!! Form::bsText(null, null, 'Equip./Container #', 'container_number', null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsText(null, null, 'Seal #1', 'container_seal_number', null, '') !!}</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="container_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>