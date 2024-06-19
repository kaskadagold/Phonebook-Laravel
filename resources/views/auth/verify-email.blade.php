<x-layouts.app page-title="Подтверждение регистрации">
    @if (session('status') == 'verification-link-sent')
        <x-panels.messages.success :messages="['Ссылка на завершение регистрации была отправлена на Ваш email']" />
    @endif

    <x-panels.messages.form-validation-errors />

    <x-forms.form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <x-forms.row>
            <x-forms.submit-button>
                Отправить ссылку повторно
            </x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

    <x-forms.form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-forms.row>
            <x-forms.submit-button>
                Выйти
            </x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
