<x-app-layout>
    <x-slot name="header">
        {{ __('views.task_status.index.header') }}
    </x-slot>
    <section class="bg-white dark:bg-gray-900 ">

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="ps-6 py-3">@lang('views.task_status.index.id')</th>
                        <th scope="col" class="px-6 py-3">@lang('views.task_status.index.name')</th>
                        <th scope="col" class="px-6 py-3">@lang('views.task_status.index.created_at')</th>
                        @can('seeActions', App\Models\TaskStatus::class)
                            <th scope="col" class="px-6 py-3">
                                @lang('views.task_status.index.actions')
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskStatuses as $taskStatus)
                        <tr class="bg-white border-b dark:bg-gray-800
                                dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th scope="row" class="ps-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $taskStatus['id'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $taskStatus['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $taskStatus['created_at'] }}
                            </td>
    {{--                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline"--}}
                            <td>
                                {{--                            @can('delete', $taskStatus)--}}
{{--                                 add ujs--}}
                                <a
                                    data-confirm="@lang('views.task_status.index.delete_confirmation')"
                                    data-method="delete"
                                    class="font-medium text-red-600 dark:text-blue-500 hover:underline"
                                    rel="nofollow"
                                    href="{{ route('task_statuses.destroy', $taskStatus) }}"
                                >
                                    @lang('views.task_status.index.delete')
                                </a>
                                {{--                            @endcan--}}
                                {{--                            @can('update', $taskStatus)--}}
                                <a class="font-medium  text-blue-600 ps-3 dark:text-blue-500 hover:underline" href="{{ route('task_statuses.edit', $taskStatus) }}">
                                    @lang('views.task_status.index.edit')
                                </a>
                                {{--                        @endcan--}}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
