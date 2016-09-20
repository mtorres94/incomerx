@extends('layouts._tab')

@section('title', 'Customers')
@section('table-title', 'List of customers')

@section('content')
{!! Form::bsIndex('maintenance.customers.customers.create', 'maintenance.customers.customers.index') !!}
@if (isset($customers))
<table class="table table-hover">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $customer)
        <tr data-id="{{ $customer->id }}">
            <td>{{ strtoupper($customer->code) }}</td>
            <td>{{ strtoupper($customer->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.customers.customers.show',
                        'maintenance.customers.customers.edit',
                        'maintenance.customers.customers.destroy',
                        $customer
                    )
                !!}
            </td>
        </tr>
        @empty
        <tr>
            <td>No customers</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </tfoot>
</table>
{{ $customers->render() }}
{!! Form::open(['route' => ['maintenance.customers.customers.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
