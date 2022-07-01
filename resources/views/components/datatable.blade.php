@props([
    'data',
    'toolbar-start' => '',
])
<div {{ $attributes->merge(['class' => 'datatable']) }}>
    <form class="flex items-center mb-4">
        {{ optional($__laravel_slots)['toolbar-start'] }}
        <div class="flex">
            <label for="perPage" class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                {{ __('Show') }}
            </label>
            <select id="perPage" name="perPage" class="rounded-r-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="this.closest('form').submit()">
                @foreach (collect([10, 25, 50, 100]) as $perPage)
                    <option {{ request('perPage', 10) == $perPage ? 'selected' : '' }}>{{ $perPage }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative ml-auto">
            <x-icon.search class="absolute top-3 left-3 pointer-events-none w-4 h-4 fill-gray-400"/>
            <x-input type="search" class="pl-9" name="search" :placeholder="__('Search...')" autocomplete="off" :value="request('search')" onsearch="this.closest('form').submit()"/>
        </div>
    </form>
    <div class="relative overflow-x-auto border sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead {{ $thead->attributes->merge(['class' => 'text-xs text-gray-700 uppercase bg-gray-100']) }}>
                {{ $thead }}
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
    @if ($data->hasPages())
        <div class="px-4 sm:px-0 mt-4">
            {{ $data->links() }}
        </div>
    @endif
</div>
