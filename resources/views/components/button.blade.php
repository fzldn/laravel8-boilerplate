@props([
    'variant' => 'default',
    'size' => 'md',
    'tag' => 'button',
    'leftIcon' => '',
    'rightIcon' => '',
])
@php
    $classes = 'appearance-none ' . ($leftIcon || $rightIcon ? 'inline-flex items-center gap-2' : 'inline-block') . ' border font-semibold whitespace-nowrap transition-colors duration-200 ease-in-out focus:outline-none focus:ring focus:ring-opacity-50';

    switch ($size) {
        default:
            $classes .= ' py-2 px-4 rounded-md text-base';
            break;
    }

    switch ($variant) {
        case 'primary':
            $classes .= ' bg-indigo-600 border-indigo-600 text-white hover:bg-indigo-700 active:bg-indigo-800 focus:border-indigo-300 focus:ring-indigo-200';
            break;
        case 'success':
            $classes .= ' bg-green-600 border-green-600 text-white hover:bg-green-700 active:bg-green-800 focus:border-green-300 focus:ring-green-200';
            break;
        case 'danger':
            $classes .= ' bg-red-600 border-red-600 text-white hover:bg-red-700 active:bg-red-800 focus:border-red-300 focus:ring-red-200';
            break;
        case 'warning':
            $classes .= ' bg-yellow-500 border-yellow-500 text-white hover:bg-yellow-600 active:bg-yellow-700 focus:border-yellow-300 focus:ring-yellow-200';
            break;
        case 'info':
            $classes .= ' bg-cyan-500 border-cyan-500 text-white hover:bg-cyan-600 active:bg-cyan-700 focus:border-cyan-300 focus:ring-cyan-200';
            break;
        default:
            $classes .= ' bg-white border-gray-300 hover:bg-gray-100 active:bg-gray-200 focus:border-indigo-300 focus:ring-indigo-200';
            break;
    }

    $addedAttributes = ['class' => $classes];

    if ($tag === 'button') {
        $addedAttributes['type'] = 'submit';
    }
@endphp
<{{ $tag }} {{ $attributes->merge($addedAttributes) }}>
    @if ($leftIcon || $rightIcon)
        @if ($leftIcon)
            <x-dynamic-component :component="$leftIcon" class="w-4 h-4" />
        @endif
        <span>{{ $slot}}</span>
        @if ($rightIcon)
            <x-dynamic-component :component="$rightIcon" class="w-4 h-4" />
        @endif
    @else
        {{ $slot }}
    @endif
</{{ $tag }}>
