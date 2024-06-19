<x-layouts.app page-title="Подтверждение регистрации">
    {{-- @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Ссылка на завершение регистрации была отправлена на Ваш email') }}
        </div>
    @endif --}}

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
