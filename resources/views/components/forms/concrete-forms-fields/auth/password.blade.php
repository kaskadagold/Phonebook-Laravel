@props(['withConfirmation' => false])

<x-forms.groups.group for="password" error="{{ $errors->first('password') }}">
    <x-slot:label>Пароль</x-slot:label>
    <x-forms.inputs.text
        id="password"
        name="password"
        type="password"
        placeholder="*******"
        required
        value="{{ old('password') }}"
        error="{{ $errors->first('password') }}"
    />
</x-forms.groups.group>

@if ($withConfirmation)
<x-forms.groups.group for="password_confirmation" error="{{ $errors->first('password_confirmation') }}">
    <x-slot:label>Подтверждение пароля</x-slot:label>
    <x-forms.inputs.text
        id="password_confirmation"
        name="password_confirmation"
        type="password"
        placeholder="*******"
        required
        value="{{ old('password_confirmation') }}"
        error="{{ $errors->first('password_confirmation') }}"
    />
</x-forms.groups.group>
@endif