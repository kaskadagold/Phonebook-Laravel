<x-layouts.app page-title="Регистрация">
    <x-panels.messages.form-validation-errors />

    <x-forms.form method="POST" action="{{ route('register') }}">
        @csrf

        <x-forms.groups.group for="name" error="{{ $errors->first('name') }}">
            <x-slot:label>Имя</x-slot:label>
            <x-forms.inputs.text
                id="name"
                name="name"
                placeholder="Иванов Иван Иванович"
                required autofocus
                value="{{ old('name') }}"
                error="{{ $errors->first('name') }}"
            />
        </x-forms.groups.group>

        <x-forms.concrete-forms-fields.auth.email />

        <x-forms.concrete-forms-fields.auth.password :with-confirmation="true" />

        <x-forms.row>
            <x-forms.submit-button>
                Регистрация
            </x-forms.submit-button>

            <a class="text-20 ml-10" href="{{ route('login') }}">
                Уже зарегистрированы?
            </a>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
