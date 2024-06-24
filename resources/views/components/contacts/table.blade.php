@props(['contacts'])

<table class="w-full my-0 mx-5 border-b-1 collapse">
    <tr class="border-b-1 collapse text-24">
        <th class="w-50 px-10 py-5"></th>
        <th class="w-50 px-10 py-5"></th>
        <th class="w-1_2 px-10 py-5 text-start">Имя</th>
        <th class="w-1_2 px-10 py-5 text-start">Телефон</th>
    <tr>

    @foreach ($contacts as $contact)
        <x-contacts.table-item :contact="$contact" />
    @endforeach

</table>