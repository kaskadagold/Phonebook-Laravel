<x-layouts.app page-title="Восстановление пароля">

    <x-forms.form method="POST" action="{{ route('password.email') }}">
        @csrf

        <x-forms.concrete-forms-fields.auth.email />

        <x-forms.row>
            <x-forms.submit-button>
                Отправить ссылку на сброс пароля
            </x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
