<x-app-layout>
    <x-slot name="header">
        {{ __('views.task_status.index.header') }}
    </x-slot>

    @auth
        <div class="mb-4 sm:px-6 max-w-7xl mx-auto ">
            <x-link-button href="{{ route('task_statuses.create') }}">
                @lang('views.task_status.index.create_button')
            </x-link-button>
        </div>
    @endauth

    <section class="bg-white  ">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="ps-6 py-3">@lang('views.task_status.index.id')</th>
                        <th scope="col" class="px-6 py-3">@lang('views.task_status.index.name')</th>
                        <th scope="col" class="px-6 py-3">@lang('views.task_status.index.created_at')</th>
                        @auth
                            <th scope="col" class="px-6 py-3">
                                @lang('views.task_status.index.actions')
                            </th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskStatuses as $taskStatus)
                        <tr class="bg-white border-b
                                 hover:bg-gray-50 "
                        >
                            <th scope="row" class="ps-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $taskStatus['id'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $taskStatus['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $taskStatus['created_at'] }}
                            </td>
                            @auth
                                <td>
                                    <a
                                        data-confirm="@lang('views.task_status.index.delete_confirmation')"
                                        data-method="delete"
                                        class="font-medium text-red-600  hover:underline"
                                        rel="nofollow"
                                        href="{{ route('task_statuses.destroy', $taskStatus) }}"
                                    >
                                        @lang('views.task_status.index.delete')
                                    </a>

                                    <a class="font-medium  text-blue-600 ps-3  hover:underline" href="{{ route('task_statuses.edit', $taskStatus) }}">
                                        @lang('views.task_status.index.edit')
                                    </a>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
