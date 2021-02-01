@inject('model', '\Modules\Website\Entities\Website')

@extends('backend.layouts.app')

@section('title', __('Update Website'))

@section('content')
    <x-forms.patch :action="route('Website.update', $website->id)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Website')
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
                            <input type="text"  name="name" class="form-control" placeholder="{{ __('Website Name') }}" value="{{ old('name') ?? $website->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                    <small class="float-right text-muted">
                    <strong style="margin-left: 15px;">@lang('Website Created On'):</strong> {{date("jS F , Y H:i A", strtotime($website->created_at))}}
                    <br>
                    <strong style="margin-left: 15px;">@lang('Last updated On'):</strong> {{date("jS F , Y H:i A", strtotime($website->updated_at))}}
                    <small>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Website')</button>
            </x-slot>
            
        </x-backend.card>
    </x-forms.patch>
@endsection
