<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table style="">
                        @if (Auth::user()->isAdmin())
                            <tr>
                                <td colspan="7" style="text-align: right; padding: 0px 50px;"><a href="{{ route('client.add') }}" class="text-success">Přidat klienta</a></td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                <hr>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>
                                Název
                            </th>
                            <th>
                                IČO
                            </th>
                            <th>
                                DIČ
                            </th>
                            <th>
                                Adresa
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Telefon
                            </th>
                            <th>
                            </th>
                        </tr>
                        @foreach ($clients as $client)
                            <tr>
                                <td>
                                    {{ $client->name }}
                                </td>
                                <td>
                                    {{ $client->ICO }}
                                </td>
                                <td>
                                    {{ $client->DIC }}
                                </td>
                                <td>
                                    {{ $client->address }}
                                </td>
                                <td>
                                    {{ $client->email }}
                                </td>
                                <td>
                                    {{ $client->phone }}
                                </td>
                                @if (Auth::user()->isAdmin())
                                    <td>
                                        <form method="POST" action="{{ route("client.remove", $client->id) }}">
                                            @csrf
                                            @method("delete")
                                        <a href="{{ route("client.edit", $client->id) }}" class="text-info">Upravit</a> | <button type="submit" class="text-danger">Smazat</a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
