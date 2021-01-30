@inject('model', '\App\Models\Currency')

@extends('backend.layouts.app')

@section('title', __('Create Currency'))

@section('content')
<x-forms.post :action="route('admin.currency.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Currency')
            </x-slot>
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.currency.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Currency Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="code" class="col-md-2 col-form-label">@lang('Currency Code')</label>

                        <div class="col-md-10">
                            <input type="text" name="code" class="form-control" placeholder="{{ __('Currency Code') }}" value="{{ old('code') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>
            
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Currency')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection