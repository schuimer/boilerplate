@extends('backend.layouts.app')

@section('title', __('Create Currency'))

@section('content')
<x-backend.card>
        <x-slot name="header">
            @lang('Currency Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.currency.create')"
                    :text="__('Create Currency')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.currencies-table />
        </x-slot>
    </x-backend.card>
@endsection
