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

        <x-filter.filter :filter-values="$filterValues" />

        @if ($contacts->isNotEmpty())
            <x-contacts.table>
                @foreach ($contacts as $contact)
                    <x-contacts.table-item :contact="$contact" />
                @endforeach
            </x-contacts.table>
        @else
            <p class="text-18">Нет сохраненных контактов...</p>
        @endif
    </div>

    @else

    <p class="text-18">Пожалуйста, авторизуйтесь для работы с телефонным справочником.</p>

    @endauth

</x-layouts.app>