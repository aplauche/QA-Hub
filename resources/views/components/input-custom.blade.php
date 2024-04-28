@props(['name', 'label', 'current' => ''])

<div class="mb-4">
  <label for="{{ $name }}" class="block font-medium text-sm text-gray-700">
    {{ $label }}
  </label>
  <input id="{{ $name }}" name="{{$name}}" value="{{ old($name, $current) }}" {{ $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
  @error( $name )
      <div class="text-red-500">{{ $message }}</div>
  @enderror
</div>
