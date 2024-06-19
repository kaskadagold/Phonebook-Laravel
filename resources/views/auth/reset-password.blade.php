<x-layouts.app page-title="Сброс пароля">
    <x-panels.messages.form-validation-errors />

    <x-forms.form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-forms.concrete-forms-fields.auth.email />

        <x-forms.concrete-forms-fields.auth.password :with-confirmation="true" />

        <x-forms.row>
            <x-forms.submit-button>
                Сбросить пароль
            </x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
