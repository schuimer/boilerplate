@inject('model', '\App\Models\Currency')

@extends('backend.layouts.app')

@section('title', __('Update Currency'))

@section('content')
    <x-forms.patch :action="route('admin.currency.update', $currency->id)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Currency')
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
                            <input type="text"  name="name" class="form-control" placeholder="{{ __('Currency Name') }}" value="{{ old('name') ?? $currency->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Currency Code')</label>

                        <div class="col-md-10">
                            <input type="text"  name="code" class="form-control" placeholder="{{ __('Currency Code') }}" value="{{ old('country_code') ?? $currency->code}}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                    <small class="float-right text-muted">
                    <strong style="margin-left: 15px;">@lang('Currency Created On'):</strong> {{date("jS F , Y H:i A", strtotime($currency->created_at))}}
                    <br>
                    <strong style="margin-left: 15px;">@lang('Last updated On'):</strong> {{date("jS F , Y H:i A", strtotime($currency->updated_at))}}
                    <small>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Currency')</button>
            </x-slot>
            
        </x-backend.card>
    </x-forms.patch>
@endsection
