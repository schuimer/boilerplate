@extends('backend.layouts.app')

@section('title', __('Create Website'))

@section('content')
<x-backend.card>
        <x-slot name="header">
            @lang('Website Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('Website.create')"
                    :text="__('Create Website')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.websites-table />
        </x-slot>
    </x-backend.card>
@endsection
