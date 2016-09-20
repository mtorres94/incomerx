<div id="Container_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Container Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('container_line', null, ['id' => 'container_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsComplete('col-md-3', 'col-md-8', 'Equipment Type', 'container_equipment_type_id', 'container_equipment_type_code', Request::get('term'),
    ((isset($container_detail) and $container_detail->container_equipment_type_id > 0) ? $container_detail->container_equipment_type->code : null), ' ') !!}

                    {!! Form::bsText('col-md-4', 'col-md-6', 'Container/ Trailer #', 'container_container', null, '') !!}
                    {!! Form::bsText('col-md-4', 'col-md-6', 'Seal #', 'container_seal_number', null, '') !!}
                    {!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'container_comments', null, 1, '') !!}
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="container-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>