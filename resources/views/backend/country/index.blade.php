@extends('backend.layouts.app')

@section('title', __('Create Country'))

@section('content')
<x-backend.card>
        <x-slot name="header">
            @lang('Country Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.country.create')"
                    :text="__('Create Countries')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.countries-table />
        </x-slot>
    </x-backend.card>
@endsection
