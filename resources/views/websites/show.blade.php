<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Issues') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

        <div x-data="{show: false}">

          <button class="button-primary" @click="show = !show" x-text="!show ? 'Add Issues' : 'Collapse' ">Show Issue Form</button>
          <div x-show="show">
            <livewire:create-issue :website="$website"/>
          </div>
        </div>


        @foreach ($issues as $issue)

          <livewire:issue-card :website="$website" :issue="$issue" :key="$issue->id" />
            
        @endforeach

      </div>
  </div>
</x-app-layout>