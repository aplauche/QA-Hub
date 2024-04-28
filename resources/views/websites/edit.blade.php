<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Update {{ $website->title }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

        <div class="bg-white shadow-sm sm:rounded-lg block p-5">
            
          <form action="{{ route("websites.update", [$website]) }}" method="POST">
            @csrf
            @method('PUT')
            <x-input-custom name="title" type="text" label="Title" current="{{$website->title}}" /> 
            <x-input-custom name="url" type="text" label="Website URL" current="{{$website->url}}" /> 
            <button type="submit" class="btn btn-primary">Update project</button>
          </form>

        </div>

      </div>
  </div>
</x-app-layout>
