@extends('backend.layouts.app')

@section('title', __('View Website'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Website')
        </x-slot>
        
        <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </ul> 

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('Website')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Website Name')</th>
                    <td>{{ $website->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Created At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($website->created_at))}}</td>
                </tr>
                <tr>
                    <th>@lang('Updated At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($website->updated_at))}}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
