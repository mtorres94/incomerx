<select name="printer" id="printer" class="selectpicker select-header" title="Choose..." data-width="fit">
    @foreach($array as $item)
        <option data-icon="{{ $item['class'] }}">{{ $item['value'] }}</option>
    @endforeach
</select>
<a target="_blank" href="{{ route($route) }}" class="btn btn-default btn-lg btn-print" data-route="{{ route($route) }}" data-id="{{ $obj->id }}"><span class="fa fa-print fa-lg" aria-hidden="true"></span></a>