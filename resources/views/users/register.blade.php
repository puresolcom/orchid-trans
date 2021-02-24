@extends('platform::auth')
@section('title', __('Register as :role_name', ['role_name' => $roleName]))
@section('content')
    <h1 class="h4 text-black mb-4">{{ __('Register a new (:role_name) Account', ['role_name' => $roleName]) }}</h1>
    <form class="m-t-md" role="form" method="POST" action="{{ route('users.store') }}">
        @csrf
        <input type="hidden" name="role" value="{{ $roleId }}" />
        <div class="form-group">
            <h5 class="mb-3">{{ __('Account Details') }}</h5>
            <hr />
            <label for="name" class="form-label"></label>
            {!! \Orchid\Screen\Fields\Input::make('name')
            ->required()
            ->tabindex(1)
            ->autofocus()
            ->placeholder(__('Enter your full name')) !!}
            {!! \Orchid\Screen\Fields\Input::make('email')
            ->type('email')
            ->required()
            ->tabindex(2)
            ->placeholder('Enter your E-mail address') !!}
        </div>
        <div class="form-group">
            <h5 class="mb-3">{{ __('Setting password') }}</h5>
            <label for="password" class="form-label">
                {!! \Orchid\Screen\Fields\Password::make('password')
                ->required()
                ->tabindex(3)
                ->placeholder(__('Enter your password')) !!}
                {!! \Orchid\Screen\Fields\Password::make('password_confirmation')
                ->required()
                ->tabindex(4)
                ->placeholder(__('Repeat password')) !!}
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block" tabindex="5">
                <x-orchid-icon path="pencil" class="text-xs mr-2" />
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
