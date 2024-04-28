<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Website: {{ $website->title }}
        </h2>
        <div class="toggle-links flex">
          <a href="{{route("websites.show", ["website" => $website ])}}" class="{{ request()->routeIs('websites.show') ? 'active' : '' }}">QA Site</a>
          <a href="{{route("issues.index", ["website" => $website ])}}" class="{{ request()->routeIs('issues.index') ? 'active' : '' }}">Issue Tracker</a>
        </div>
      </div>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-10">

    <livewire:qa-matrix :website="$website"/>

    <div class="mt-10">
      <h3 class="mb-4 font-bold text-xl">Log issues:</h3>
      <livewire:create-issue :website="$website" :isQA="true" />
    </div>



  </div>

</x-app-layout>