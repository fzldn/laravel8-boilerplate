<x-app-layout :title="__('Manage Roles')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="flex items-center mb-4">
                @can('create', \App\Models\Role::class)
                    <a href="{{ route('roles.create') }}" class="inline-flex items-center uppercase text-sm shadow-sm py-2.5 px-5 mr-3 font-semibold text-gray-900 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-indigo-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <x-icon.plus class="w-4 h-4 mr-2" />
                        <span>{{ __('Add Role') }}</span>
                    </a>
                @endcan
                <div class="flex">
                    <label for="perPage" class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                        {{ __('Show') }}
                    </label>
                    <select id="perPage" name="perPage" class="rounded-r-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="this.closest('form').submit()">
                        @foreach (collect([10, 25, 50, 100]) as $item)
                            <option {{ request('perPage', 10) == $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input type="search" name="search" :placeholder="__('Search...')" class="ml-auto" autocomplete="off" :value="request('search')" onsearch="this.closest('form').submit()"/>
            </form>
            <div class="relative overflow-x-auto border sm:rounded-lg mb-4">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <x-icon.hashtag class="w-3 h-3"/>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Role') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Created at') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="border-b last:border-0 odd:bg-white even:bg-gray-50 hover:bg-indigo-50/75">
                                <td scope="row" class="px-6 py-4">
                                    {{ $roles->firstItem() + $loop->index }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                    {{ $role->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <abbr title="{{ $role->created_at->format('c') }}">{{ $role->created_at->diffForHumans() }}</abbr>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        @can('view', $role)
                                            <a href="{{ route('roles.show', compact('role')) }}" class="font-semibold text-indigo-500 hover:underline">{{ __('View') }}</a>
                                        @endcan
                                        @can('edit', $role)
                                            <a href="{{ route('roles.edit', compact('role')) }}" class="font-semibold text-indigo-500 hover:underline">{{ __('Edit') }}</a>
                                        @endcan
                                        @can('delete', $role)
                                            <a href="{{ route('roles.destroy', compact('role')) }}" class="font-semibold text-red-500 hover:underline">{{ __('Delete') }}</a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 sm:px-0 mb-4">
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
