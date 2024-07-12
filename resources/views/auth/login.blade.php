<x-layouts.app page-title="Авторизация">

    @if (session('status'))
        <x-panels.messages.success :messages="(array) session('status')" />
    @endif

    <x-panels.messages.form-validation-errors />


    <x-forms.form method="POST" action="{{ route('login') }}">
        @csrf

        <x-forms.concrete-forms-fields.auth.email />

        <x-forms.concrete-forms-fields.auth.password />

        <x-forms.groups.checkbox-group error="{{ $errors->first('remember_me') }}">
            <x-slot:label>Запомнить меня</x-slot:label>
            <x-forms.inputs.checkbox
                name="remember_me"
                :checked="old('remember_me')"
            />
        </x-forms.groups.checkbox-group>

        <x-forms.row>
            <x-forms.submit-button>
                Войти
            </x-forms.submit-button>
            @if (Route::has('password.request'))
                <a class="text-20 ml-10" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
