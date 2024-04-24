<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Web Projects For QA
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

            @forelse ($websites as $website)
                <a href="{{ route('website.show', $website) }}" class="bg-white shadow-sm sm:rounded-lg block p-5">
                    <h3>{{ $website->title }}</h3>
                </a>
            @empty
                <div class="bg-white shadow-sm sm:rounded-lg block p-5">
                    <h3 class="text-center">No active projects...</h3>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
