<x-layouts.app page-title="Подтверждение пароля">
    <x-panels.messages.form-validation-errors />

    <x-forms.form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <x-forms.concrete-forms-fields.auth.password />

        <x-forms.row>
            <x-forms.submit-button>
                Подтвердить
            </x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
