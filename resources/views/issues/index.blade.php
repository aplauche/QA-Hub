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

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

        {{-- <div x-data="{show: false}">

          <button class="button-primary" @click="show = !show" x-text="!show ? 'Add Issues' : 'Collapse' ">Show Issue Form</button>
          <div x-show="show">
            <livewire:create-issue :website="$website"/>
          </div>
        </div> --}}

        

        @foreach ($issues as $issue)

          <livewire:issue-card :website="$website" :issue="$issue" :key="$issue->id" />
            
        @endforeach

      </div>
  </div>
</x-app-layout>