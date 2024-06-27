<x-layouts.app>

    <div class="flex content-center">
        <a href="/create">
            <button class="text-18 font-bold text-white bg-purple px-30 py-15 rounded-25 pointer">
                + Добавить новый контакт
            </button>
        </a>
    </div>

    <div>
        <h3>Список контактов</h3>

        <p class="text-18">Нет сохраненных контактов...</p>

        <table class="w-full my-0 mx-5 border-b-1 collapse">
            <tr class="border-b-1 collapse text-24">
                <th class="w-50 px-10 py-5"></th>
                <th class="w-50 px-10 py-5"></th>
                <th class="w-1_2 px-10 py-5 text-start">Имя</th>
                <th class="w-1_2 px-10 py-5 text-start">Телефон</th>
            <tr>

            <tr class="border-b-1 collapse text-20">
                <td class="px-10 py-5">
                    <form>
                        <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                            <img class="w-2_3" src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить">
                        </button>
                    </form>
                </td>
                <td class="px-10 py-5">
                    <a href="/update">
                        <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                            <img class="w-2_3" src="/assets/images/update-icon.png" alt="Редактировать" title="Редактировать">
                        </button>
                    </a>
                </td>
                <td class="w-1_2 px-10 py-5">Имя контакта</td>
                <td class="w-1_2 px-10 py-5">Телефон контакта</td>
            </tr>

        </table>
    </div>

</x-layouts.app>