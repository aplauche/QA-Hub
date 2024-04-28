<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Create a new web project
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

        <div class="bg-white shadow-sm sm:rounded-lg block p-5">
            
          <form action="{{ route("websites.store") }}" method="POST">
            @csrf
            <x-input-custom name="title" type="text" label="Title" /> 
            <x-input-custom name="url" type="text" label="Website URL" /> 
            <button type="submit" class="btn btn-primary">Publish project</button>
          </form>

        </div>

      </div>
  </div>
</x-app-layout>
