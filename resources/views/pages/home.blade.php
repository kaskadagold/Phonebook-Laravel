<x-layouts.app>

    <div class="addingButton">
        <a href="/create">
            <button>+ Добавить новый контакт </button>
        </a>
    </div>

    <div class="table">
        <h3>Список контактов</h3>

        <p>Нет сохраненных контактов...</p>

        <table>
            <tr>
                <th class="deleteButton"></th>
                <th class="updateButton"></th>
                <th class="nameField">Имя</th>
                <th class="phoneField">Телефон</th>
            <tr>


            <tr>
                <td class="deleteButton">
                    <form>
                        <button class="imageButton">
                            <img src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить">
                        </button>
                    </form>
                </td>
                <td>
                    <a href="/update">
                        <button class="imageButton">
                            <img src="/assets/images/update-icon.png" alt="Редактировать" title="Редактировать">
                        </button>
                    </a>
                </td>
                <td class="nameField">Имя контакта</td>
                <td class="phoneField">Телефон контакта</td>
            </tr>

        </table>
    </div>

</x-layouts.app>