<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table style="">
                        @if (Auth::user()->isAdmin())
                            <tr>
                                <td colspan="5" style="text-align: right; padding: 0px 50px;"><a href="{{ route('project.add') }}" class="text-success">Přidat projekt</a></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                <hr>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>
                                Název
                            </th>
                            <th>
                                Popis
                            </th>
                            <th>
                                Zákazník
                            </th>
                            <th>
                                Hodinová marže
                            </th>
                            <th>
                            </th>
                        </tr>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    {{ $project->name }}
                                </td>
                                <td>
                                    {{ $project->description }}
                                </td>
                                <td>
                                    {{ $project->client->name }}
                                </td>
                                <td>
                                    {{ $project->hourlyMargin }}
                                </td>
                                @if (Auth::user()->isAdmin())
                                    <td>
                                        <form method="POST" action="{{ route("project.remove", $project->id) }}">
                                            @csrf
                                            @method("delete")
                                        <a href="{{ route("project.edit", $project->id) }}" class="text-info">Upravit</a> | <button type="submit" class="text-danger">Smazat</a>
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
