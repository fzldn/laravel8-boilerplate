<x-app-layout :title="__('Manage Users')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-datatable :data="$users" class="mb-4">
                <x-slot name="toolbar-start">
                    @can('create', \App\Models\User::class)
                        <x-button tag="a" href="{{ route('users.create') }}" variant="primary" left-icon="icon.plus" class="inline-flex items-center gap-2 mr-3">
                            {{ __('Add User') }}
                        </x-button>
                    @endcan
                </x-slot>
                <x-slot name="thead">
                    <tr>
                        <x-table.th>
                            <x-icon.hashtag class="w-3 h-3"/>
                        </x-table.th>
                        <x-table.th>
                            {{ __('Name') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Email') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Created at') }}
                        </x-table.th>
                        <x-table.th>
                            <span class="sr-only">{{ __('Actions') }}</span>
                        </x-table.th>
                    </tr>
                </x-slot>

                @foreach ($users as $user)
                    <x-table.tr>
                        <x-table.td scope="row">
                            {{ $users->firstItem() + $loop->index }}
                        </x-table.td>
                        <x-table.td class="font-semibold text-gray-900 whitespace-nowrap">
                            {{ $user->name }}
                        </x-table.td>
                        <x-table.td class="whitespace-nowrap">
                            <a href="mailto:{{ $user->email }}" class="hover:underline">{{ $user->email }}</a>
                        </x-table.td>
                        <x-table.td class="whitespace-nowrap">
                            <abbr title="{{ $user->created_at->format('c') }}">{{ $user->created_at->diffForHumans() }}</abbr>
                        </x-table.td>
                        <x-table.td>
                            <div class="flex justify-end gap-3">
                                @can('view', $user)
                                    <a href="{{ route('users.show', compact('user')) }}" class="font-semibold text-indigo-500 hover:underline">{{ __('View') }}</a>
                                @endcan
                                @can('edit', $user)
                                    <a href="{{ route('users.edit', compact('user')) }}" class="font-semibold text-indigo-500 hover:underline">{{ __('Edit') }}</a>
                                @endcan
                                @can('delete', $user)
                                    <a href="{{ route('users.destroy', compact('user')) }}" class="font-semibold text-red-500 hover:underline">{{ __('Delete') }}</a>
                                @endcan
                            </div>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-datatable>
        </div>
    </div>
</x-app-layout>
