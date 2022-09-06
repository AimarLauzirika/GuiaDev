@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full px-2 py-1 border-b border-gray-500 focus:border-indigo-300 focus:border-b-2 focus:ring ring-blue-500/5 rounded-sm outline-none']) !!}>
