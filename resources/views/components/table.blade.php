@props(['links'])
<!-- component -->
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
                                First
                            </th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                Last
                            </th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                Handle
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}</td>
                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                    {{ $link->name }}
                                </td>
                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                    {{ $link->link }}
                                </td>
                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap flex gap-2">
                                    <a href="{{ route('links.edit', $link->id) }}" <x-primary-button type="button"
                                        class="h-10 mt-6">
                                        {{ __('Edit') }}
                                        </x-primary-button>
                                    </a>
                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" class="h-10 mt-6">
                                            {{ __('Delete') }}
                                        </x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
