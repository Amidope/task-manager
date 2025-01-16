<x-app-layout>
    <x-slot name="header">
        {{ __('views.task.index.header') }}
    </x-slot>

    <div class="mb-4 sm:px-6 max-w-7xl mx-auto ">
        <!-- filters -->
        <div class="flex justify-between">
            <div>
                {{ html()->form('GET', route('tasks.index'))->open() }}
                {{ html()->select('filter[status_id]', $taskStatusesForFilterForm, Arr::get($filterParams, 'status_id'))->placeholder(__('views.task.index.placeholders.status_id'))->class('rounded border-gray-300') }}
                {{ html()->select('filter[created_by_id]', $usersForFilterForm, Arr::get($filterParams, 'created_by_id'))->placeholder(__('views.task.index.placeholders.created_by_id'))->class('rounded border-gray-300') }}
                {{ html()->select('filter[assigned_to_id]', $usersForFilterForm, Arr::get($filterParams, 'assigned_to_id'))->placeholder(__('views.task.index.placeholders.assigned_to_id'))->class('rounded border-gray-300') }}
                {{ html()->submit(__('views.task.index.filter_button'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2') }}
                {{ html()->form()->close() }}
            </div>
            <!-- create button -->

            @auth
                <x-link-button href="{{ route('tasks.create') }}">
                    @lang('views.task.index.create_button')
                </x-link-button>
            @endauth

        </div>
    </div>

    <section class="bg-white dark:bg-gray-900 ">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.id')</th>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.status')</th>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.name')</th>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.creator')</th>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.assigned_to')</th>
                        <th scope="col" class="ps-6 py-3">@lang('views.task.index.created_at')</th>
                        @auth
                            <th scope="col" class="px-6 py-3">
                                @lang('views.task.index.actions')
                            </th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="bg-white border-b dark:bg-gray-800
                                dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th scope="row" class="ps-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $task['id'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $task->status->name }}
                            </td>
                            <td class="px-6 py-4">
                                <a class="text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('tasks.show', $task) }}">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->createdBy->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->assignedTo->name ?? ''}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task['created_at']->toDateString() }}
                            </td>
                            @auth
                                <td>
                                    <a class="font-medium  text-blue-600 ps-3 dark:text-blue-500 hover:underline" href="{{ route('tasks.edit', $task) }}">
                                        @lang('views.task.index.edit')
                                    </a>
                                    @can('delete', $task)
                                        <a
                                            data-confirm="@lang('views.task.index.delete_confirmation')"
                                            data-method="delete"
                                            class="ml-2 font-medium text-red-600 dark:text-blue-500 hover:underline"
                                            rel="nofollow"
                                            href="{{ route('tasks.destroy', $task) }}"
                                        >
                                            @lang('views.task.index.delete')
                                        </a>
                                    @endcan
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4" >
                {{ $tasks->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
