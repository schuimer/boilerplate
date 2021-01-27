@extends('backend.layouts.app')

@section('title', __('View Currency'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Currency')
        </x-slot>
        
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.currency.index')" :text="__('Back')" />
        </x-slot>
    
        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Currency Name')</th>
                    <td>{{ $currency->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Currency Code')</th>
                    <td>{{ $currency->code }}</td>
                </tr>
                <tr>
                    <th>@lang('Created At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($currency->created_at))}}</td>
                </tr>
                <tr>
                    <th>@lang('Updated At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($currency->updated_at))}}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
