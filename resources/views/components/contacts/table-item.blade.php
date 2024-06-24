@props(['contact'])

<tr class="border-b-1 collapse text-20">
    <td class="px-10 py-5">
        <x-forms.form method="POST" action="{{ route('contact.destroy', ['contact' => $contact]) }}">
            @method('DELETE')

            @csrf

            <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить">
            </button>
        </x-forms.form>
    </td>
    <td class="px-10 py-5">
        <a href="{{ route('contact.edit', ['contact' => $contact]) }}">
            <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/update-icon.png" alt="Редактировать" title="Редактировать">
            </button>
        </a>
    </td>
    <td class="w-1_2 px-10 py-5">{{ $contact->name }}</td>
    <td class="w-1_2 px-10 py-5">{{ $contact->phone }}</td>
</tr>