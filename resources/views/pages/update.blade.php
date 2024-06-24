<x-layouts.app>
    <div class="flex content-between py-15">
        <h2 class="m-0 font-bold">Редактирование контакта</h2>

        <a href="/">
            <button class="text-18 font-bold text-white bg-purple px-30 py-15 rounded-25 pointer">Вернуться к списку контактов</button>
        </a>
    </div>

    <div class="py-15">
        <x-panels.messages.form-validation-errors />

        <x-forms.form>
            <x-forms.concrete-forms-fields.contact-form-fields />

            <x-forms.submit-button>
                Обновить
            </x-forms.submit-button>
        </x-forms.form>
    </div>
</x-layouts.app>