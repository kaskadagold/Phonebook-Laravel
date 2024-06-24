<x-layouts.app>

    @auth

    <div class="flex content-center">
        <a href="{{ route('contact.create') }}">
            <button class="text-18 font-bold text-white bg-purple px-30 py-15 rounded-25 pointer">
                + Добавить новый контакт
            </button>
        </a>
    </div>

    <div>
        <h3>Список контактов</h3>

        @if ($contacts->isEmpty())
            <p class="text-18">Нет сохраненных контактов...</p>
        @else
            <x-contacts.table :contacts="$contacts" />
        @endif
    </div>

    @else

    <p class="text-18">Пожалуйста, авторизуйтесь для работы с телефонным справочником.</p>

    @endauth

</x-layouts.app>