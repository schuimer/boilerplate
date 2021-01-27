@inject('model', '\App\Models\Country')

@extends('backend.layouts.app')

@section('title', __('Update Country'))

@section('content')
    <x-forms.patch :action="route('admin.country.update', $country->id)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Country')
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
                            <input type="text"  name="name" class="form-control" placeholder="{{ __('Country Name') }}" value="{{ old('name') ?? $country->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Country Code')</label>

                        <div class="col-md-10">
                            <input type="text"  name="country_code" class="form-control" placeholder="{{ __('Country Code') }}" value="{{ old('country_code') ?? $country->country_code}}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                    <small class="float-right text-muted">
                    <strong style="margin-left: 15px;">@lang('Country Created On'):</strong> {{date("jS F , Y H:i A", strtotime($country->created_at))}}
                    <br>
                    <strong style="margin-left: 15px;">@lang('Last updated On'):</strong> {{date("jS F , Y H:i A", strtotime($country->updated_at))}}
                    <small>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Country')</button>
            </x-slot>
            
        </x-backend.card>
    </x-forms.patch>
@endsection
