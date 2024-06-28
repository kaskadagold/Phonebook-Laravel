@props(['filterValues'])

<form method="GET" action="{{ route('contact.index') }}" class="w-500 mt-5 mb-15">
    @csrf

    <x-forms.inline class="w-500 h-40 mt-5 mb-15">
        <input 
            class="w-full h-38 text-18 rounded-tl-20 rounded-bl-20 border-1 border-gray px-15 py-0 box-shadow h-38 focus-bg-change" 
            type="text" 
            placeholder="Поиск"
            name="model"
            value="{{ $filterValues->getModel() ?: '' }}"
        />

        <button type="submit" class="text-16 h-40 p-0 flex content-center px-15 box-shadow rounded-tr-20 rounded-br-20 border-1 bl-0 border-gray bg-gray hover-bg-dark-gray pointer bg-transition">
            <img class="h-20" src="/assets/images/search.png" />
        </button>

        <x-forms.cancel-button href="{{ route('contact.index') }}">
            Очистить
        </x-forms.cancel-button>
    </x-forms.inline>

    <hr class="mb-15">
    <x-forms.inline>
        <div class="font-bold text-18">Сортировать по:</div>
        <x-filter.sort-button name="order_name" current-value="{{ request()->get('order_name') }}">
            Имени
        </x-filter.sort-button>
        <x-filter.sort-button name="order_priority" current-value="{{ request()->get('order_priority') }}">
            Приоритету
        </x-filter.sort-button>
    </x-forms.inline>
</form>