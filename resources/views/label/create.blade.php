<x-app-layout>
    <x-slot name="header">
        {{ __('views.label.create.form_header') }}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
            <div class="max-w-xl">
                {{ html()->modelForm($label, 'POST', route('labels.store'))->class('max-w-xl')->open() }}
                <!-- name -->
                {{ html()->label(__('views.label.create.labels.name'), 'name')->class('block mb-2 text-lg font-medium text-gray-900 dark:text-white') }}
                {{  html()->input('text', 'name')->required()->class('mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500/3') }}
                @error('name')
                    <div class="text-rose-600">{{ $message }}</div>
                @enderror
                <!-- description -->
                {{ html()->label(__('views.label.create.labels.description'), 'description')->class('block mb-2 text-lg font-medium text-gray-900 dark:text-white') }}
                {{  html()->input('text', 'description')->class('mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500/3') }}
                @error('description')
                    <div class="text-rose-600">{{ $message }}</div>
                @enderror

                {{  html()->submit(__('views.label.create.buttons.create'))
                        ->class('mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                        focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        focus:ring-offset-2 transition ease-in-out duration-150')
                }}
                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>

</x-app-layout>
