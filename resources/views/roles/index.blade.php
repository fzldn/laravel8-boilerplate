<x-app-layout :title="__('Manage Roles')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-datatable :data="$roles" class="mb-4">
                <x-slot name="toolbar-start">
                    @can('create', \App\Models\Role::class)
                        <x-button tag="a" href="{{ route('roles.create') }}" variant="primary" left-icon="icon.plus" class="mr-3">
                            {{ __('Add Role') }}
                        </x-button>
                    @endcan
                </x-slot>
                <x-slot name="thead">
                    <tr>
                        <x-table.th>
                            <x-icon.hashtag class="w-3 h-3"/>
                        </x-table.th>
                        <x-table.th>
                            {{ __('Role') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Permissions') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Used by') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Created at') }}
                        </x-table.th>
                        <x-table.th>
                            <span class="sr-only">{{ __('Actions') }}</span>
                        </x-table.th>
                    </tr>
                </x-slot>

                @foreach ($roles as $role)
                    <x-table.tr>
                        <x-table.td scope="row">
                            {{ $roles->firstItem() + $loop->index }}
                        </x-table.td>
                        <x-table.td class="font-semibold text-gray-900 whitespace-nowrap">
                            {{ $role->name }}
                        </x-table.td>
                        <x-table.td class="whitespace-nowrap {{ !$role->permissions_count ? 'text-gray-300' : '' }}">
                            {{ $role->permissions_count }} {{ Str::plural(__('Permission'), $role->permissions_count) }}
                        </x-table.td>
                        <x-table.td class="whitespace-nowrap {{ !$role->users_count ? 'text-gray-300' : '' }}">
                            {{ $role->users_count }} {{ Str::plural(__('User'), $role->users_count) }}
                        </x-table.td>
                        <x-table.td class="whitespace-nowrap">
                            <abbr title="{{ $role->created_at->format('c') }}">{{ $role->created_at->diffForHumans() }}</abbr>
                        </x-table.td>
                        <x-table.td>
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
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-datatable>
        </div>
    </div>
</x-app-layout>
