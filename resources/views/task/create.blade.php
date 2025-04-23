<x-app-layout>
    <x-slot name="header">
        {{ __('views.task.create.form_header') }}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
            <div class="max-w-xl">
                {{ html()->modelForm($task, 'POST', route('tasks.store'))->class('max-w-xl')->open() }}
                <div class="flex flex-col">

                    <x-styled-label text="{{ __('views.task_status.create.labels.name') }}" for="name"/>
                    {{ html()->input('text', 'name')->required()->class('mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ') }}
                    @error('name')
                        <div class="text-rose-600">{{ $message }}</div>
                    @enderror

                    <x-styled-label text="{{ __('views.task.create.labels.description') }}" for="description"/>
                    {{ html()->textarea('description', '')->required()->class('mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ') }}

                    {{ html()->label(__('views.task.create.labels.status_id'), 'status_id') }}
                    {{ html()->select('status_id', $taskStatuses->pluck('name', 'id'))->placeholder(null)->class('rounded border-gray-300 w-1/4') }}
                    @error('status_id')
                        <div class="text-rose-600">{{ $message }}</div>
                    @enderror

                        <x-styled-label text="{{ __('views.task.create.labels.assigned_to_id') }}" for="assigned_to_id"/>
                        {{ html()->select('assigned_to_id', $users->pluck('name', 'id'))->placeholder(null)->class('rounded border-gray-300 w-1/4') }}

                        <x-styled-label text="{{ __('views.task.create.labels.labels') }}" for="labels[]"/>
                        {{  html()->multiselect('labels[]', $labels->pluck('name', 'id'))->class('rounded border-gray-300 w-1/4 h-32') }}
                </div>
                {{  html()->submit(__('views.task_status.create.buttons.create'))
                        ->class('mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                        focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        focus:ring-offset-2 transition ease-in-out duration-150')
                }}
            </div>
        </div>
    </div>

</x-app-layout>
