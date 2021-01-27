@extends('backend.layouts.app')

@section('title', __('View Country'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Country')
        </x-slot>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.country.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Country Name')</th>
                    <td>{{ $country->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Country Code')</th>
                    <td>{{ $country->country_code }}</td>
                </tr>
                <tr>
                    <th>@lang('Created At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($country->created_at))}}</td>
                </tr>
                <tr>
                    <th>@lang('Updated At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($country->updated_at))}}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
