<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-white dark:bg-gray-800 dark:text-gray-100 sm:rounded-lg">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                    title
                                </th>
                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                    link
                                </th>
                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                    visit
                                </th>
                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                    terakhir di kunjungi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}
                                    </td>
                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->name }}
                                    </td>
                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->link }}
                                    </td>
                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->visits_count }}
                                    </td>
                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->latestVisit->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
