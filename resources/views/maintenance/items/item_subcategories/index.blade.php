@extends('layouts._tab')

@section('title', 'Items Subcategories')
@section('table-title', 'List of items subcategories')

@section('content')
{!! Form::bsIndex('maintenance.items.item_subcategories.create', 'maintenance.items.item_subcategories.index') !!}
@if (isset($item_subcategories))
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($item_subcategories as $item_subcategory)
        <tr data-id="{{ $item_subcategory->id }}">
            <td>{{ strtoupper($item_subcategory->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.items.item_subcategories.show',
                        'maintenance.items.item_subcategories.edit',
                        'maintenance.items.item_subcategories.destroy',
                        $item_subcategory
                    )
                !!}
            </td>
        </tr>
        @empty
        <tr>
            <td>No items categories</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </tfoot>
</table>
{{ $item_subcategories->render() }}
{!! Form::open(['route' => ['maintenance.items.item_subcategories.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
