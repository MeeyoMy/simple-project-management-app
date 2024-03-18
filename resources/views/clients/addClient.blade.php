<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('client.add') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Název')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                
                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Adresa')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        
                        <!-- ICO -->
                        <div class="mt-4">
                            <x-input-label for="ICO" :value="__('IČO')" />
                            <x-text-input id="ICO" class="block mt-1 w-full" type="text" name="ICO" :value="old('ICO')" required autocomplete="ICO" />
                            <x-input-error :messages="$errors->get('ICO')" class="mt-2" />
                        </div>
                        
                        <!-- DIC -->
                        <div class="mt-4">
                            <x-input-label for="DIC" :value="__('DIČ')" />
                            <x-text-input id="DIC" class="block mt-1 w-full" type="text" name="DIC" :value="old('DIC')" required autocomplete="DIC" />
                            <x-input-error :messages="$errors->get('DIC')" class="mt-2" />
                        </div>
                        
                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Telefon')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">                
                            <x-primary-button class="ms-4">
                                {{ __('Přidat') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
