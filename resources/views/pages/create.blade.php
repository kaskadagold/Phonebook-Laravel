<x-layouts.app >

    <div class="titleBack">
        <h2>Добавление нового контакта</h2>

        <a href="/">
            <button>Вернуться к списку контактов</button>
        </a>
    </div>

    <div class="creationForm">
        <form>
            <x-forms.contact_form_fields />

            <input type="submit" name="addButton" value="Добавить">
        </form>
    </div>
</x-layouts.app>