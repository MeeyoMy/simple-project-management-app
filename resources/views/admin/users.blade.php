<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($error))
                    <div style="text-align: center" class="text-danger">
                        {{$error}}
                    </div><br>
                    @endif
                    <table style="">
                        <tr>
                            <th>
                                Jméno
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Je admin?
                            </th>
                            <th>
                            </th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @if ($user->isAdmin)
                                        Ano
                                    @else
                                        Ne
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route("users.setAdmin", $user->id) }}">
                                        @csrf
                                        @method("patch")
                                        @if ($user->isAdmin)
                                            <button type="submit" class="text-danger">Odebrat admina</a>
                                        @else
                                            <button type="submit" class="text-success">Nastavit admina</a>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
