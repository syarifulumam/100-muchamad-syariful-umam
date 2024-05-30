<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Link') }}
        </h2>
    </x-slot>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('links.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="flex gap-2 items-center">
                            <div class="w-full">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input x-model="links.name" id="name" class="mt-1 w-full" type="text"
                                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="link" :value="__('Link')" />
                                <x-text-input x-model="links.link" id="link" class="mt-1 w-full" type="text"
                                    name="link" :value="old('link')" required autofocus autocomplete="link" />
                                <x-input-error :messages="$errors->get('link')" class="mt-2" />
                            </div>
                            <x-primary-button class="h-10 mt-6">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-table :links='$links' />
</x-app-layout>
