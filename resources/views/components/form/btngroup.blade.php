<!-- Single button -->
<div class="btn-group">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Options <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="javascript:void(0)" onclick="addSubtab('{{ trans('panel.show').' '.strtoupper($obj->name) }}', '{{ route($show, $obj) }}')">
                <i class="icon ion-more"></i><span>Show</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" onclick="addSubtab('{{ trans('panel.edit').' '.strtoupper($obj->name) }}', '{{ route($edit, $obj) }}')">
                <i class="icon ion-paintbrush"></i><span>Edit</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="deleteData">
                <i class="icon ion-trash-b"></i><span>Delete</span>
            </a>
        </li>
    </ul>
</div>


{{--
<a href="javascript:void(0)" onclick="addSubtab('{{ trans('panel.show').' '.strtoupper($obj->name) }}', '{{ route($show, $obj) }}')" role="button" class="btn btn-primary">
    <i class="icon ion-more"></i>
</a>
<a href="javascript:void(0)" onclick="addSubtab('{{ trans('panel.edit').' '.strtoupper($obj->name) }}', '{{ route($edit, $obj) }}')" role="button" class="btn btn-primary">
    <i class="icon ion-paintbrush"></i>
</a>
<a href="javascript:void(0)" role="button" class="btn btn-danger deleteData">
    <i class="icon ion-trash-b"></i>
</a>
--}}