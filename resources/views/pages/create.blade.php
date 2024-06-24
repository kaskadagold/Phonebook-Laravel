<x-layouts.app >

    <div class="flex content-between py-15">
        <h2 class="m-0 font-bold">Добавление нового контакта</h2>

        <a href="{{ route('contact.index') }}">
            <button class="text-18 font-bold text-white bg-purple px-30 py-15 rounded-25 pointer">Вернуться к списку контактов</button>
        </a>
    </div>

    <div class="py-15">
        <x-panels.messages.form-validation-errors />

        <x-forms.form method="POST" action="{{ route('contact.store') }}">
            <x-forms.concrete-forms-fields.contact-form-fields :contact="$contact" />

            <x-forms.submit-button>
                Добавить
            </x-forms.submit-button>
        </x-forms.form>
    </div>
</x-layouts.app>