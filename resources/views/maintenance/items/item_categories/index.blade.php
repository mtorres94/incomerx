@extends('layouts._tab')

@section('title', 'Items Categories')
@section('table-title', 'List of items categories')

@section('content')
{!! Form::bsIndex('maintenance.items.item_subcategories.create', 'maintenance.items.item_subcategories.index') !!}
@if (isset($item_categories))
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($item_categories as $item_category)
        <tr data-id="{{ $item_category->id }}">
            <td>{{ strtoupper($item_category->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.items.item_categories.show',
                        'maintenance.items.item_categories.edit',
                        'maintenance.items.item_categories.destroy',
                        $item_category
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
{{ $item_categories->render() }}
{!! Form::open(['route' => ['maintenance.items.item_categories.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
