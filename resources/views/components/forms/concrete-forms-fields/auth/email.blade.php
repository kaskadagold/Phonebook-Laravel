<x-forms.groups.group for="email">
    <x-slot:label>Email</x-slot:label>
    <x-forms.inputs.text
        id="email"
        name="email"
        type="email"
        placeholder="example@example.com"
        required autofocus
        value="{{ old('email') }}"
    />
</x-forms.groups.group>