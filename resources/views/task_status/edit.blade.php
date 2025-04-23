<x-app-layout>
    <x-slot name="header">
        {{ __('views.task_status.edit.form_header') }}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
            <div class="max-w-xl">
                {{ html()->modelForm($taskStatus, 'PATCH', route('task_statuses.update', $taskStatus))->class('max-w-xl')->open() }}
                {{ html()->label(__('views.task_status.edit.labels.name'), 'name')->class('block mb-2 text-lg font-medium text-gray-900 ') }}
                {{--            first:mt-0 mt-6--}}
                {{  html()->input('text', 'name')->required()->class('mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ') }}
                @error('name')
                <div class="text-rose-600">{{ $message }}</div>
                @enderror
                {{  html()->submit(__('views.task_status.edit.buttons.update'))
                        ->class('mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                        focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        focus:ring-offset-2 transition ease-in-out duration-150')
                }}
                {{ html()->closeModelForm() }}
            </div>
        </div>


</x-app-layout>
