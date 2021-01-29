@extends('backend.layouts.app')

@section('title', __('View Channel'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Channel')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('Channel')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Channel Name')</th>
                    <td>{{ $channel->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Created At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($channel->created_at))}}</td>
                </tr>
                <tr>
                    <th>@lang('Updated At')</th>
                    <td>{{date("jS F , Y H:i A", strtotime($channel->updated_at))}}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
