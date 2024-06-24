@props(['contact'])

@csrf

<x-forms.groups.group for="contactName" error="{{ $errors->first('name') }}">
    <x-slot:label>Имя</x-slot:label>
    <x-forms.inputs.text
        id="contactName"
        name="name"
        placeholder="Иванов Иван"
        value="{{ old('name', $contact->name) }}"
        error="{{ $errors->first('name') }}"
        required
    />
</x-forms.groups.group>

<x-forms.groups.group for="contactPhone" error="{{ $errors->first('phone') }}">
    <x-slot:label>Телефон</x-slot:label>
    <x-forms.inputs.text
        id="contactPhone"
        name="phone"
        placeholder="xxx-xxx-xx-xx"
        value="{{ old('phone', $contact->phone) }}"
        error="{{ $errors->first('phone') }}"
        pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
        required
    />
</x-forms.groups.group>