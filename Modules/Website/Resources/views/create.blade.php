@inject('model', '\Modules\Website\Entities\Website')

@extends('backend.layouts.app')

@section('title', __('Create Website'))

@section('content')
<x-forms.post :action="route('Website.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Website')
            </x-slot>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('Website')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Website Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Website')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection