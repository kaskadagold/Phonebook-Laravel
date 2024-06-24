@csrf

<x-forms.groups.group for="contactName" error="{{ $errors->first('contactName') }}">
    <x-slot:label>Имя</x-slot:label>
    <x-forms.inputs.text
        id="contactName"
        name="contactName"
        placeholder="Иванов Иван"
        value=""
        error="{{ $errors->first('contactName') }}"
        required
    />
</x-forms.groups.group>

<x-forms.groups.group for="contactPhone" error="{{ $errors->first('contactPhone') }}">
    <x-slot:label>Телефон</x-slot:label>
    <x-forms.inputs.text
        id="contactPhone"
        name="contactPhone"
        placeholder="xxx-xxx-xx-xx"
        value=""
        error="{{ $errors->first('contactPhone') }}"
        pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
        required
    />
</x-forms.groups.group>