@inject('model', '\App\Models\Country')

@extends('backend.layouts.app')

@section('title', __('Create Country'))

@section('content')
<x-forms.post :action="route('admin.country.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Country')
            </x-slot>
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.country.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Country Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('Country Code')</label>

                        <div class="col-md-10">
                            <input type="text" name="country_code" class="form-control" placeholder="{{ __('Country Code') }}" value="{{ old('country_code') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Country')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection