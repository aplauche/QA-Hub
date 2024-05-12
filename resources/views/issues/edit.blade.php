<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Website: {{ $website->title }} - Update Issue
      </h2>
      <div class="toggle-links flex">
        <a href="{{route("websites.show", ["website" => $website ])}}" class="{{ request()->routeIs('websites.show') ? 'active' : '' }}">QA Site</a>
        <a href="{{route("issues.index", ["website" => $website ])}}" class="{{ request()->routeIs('issues.index') ? 'active' : '' }}">Issue Tracker</a>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

        <form action="{{ route("issues.update", ["website" => $website, "issue" => $issue]) }}" method="POST">
          @method("PUT")
          @csrf
            <div class="flex gap-2 items-start">
                <x-input-custom name="page" type="text" label="Page" current="{{$issue->page}}" /> 
                <x-input-custom name="browser" type="text" label="Browser" current="{{$issue->browser}}" /> 
                <x-input-custom name="screen_size" type="text" label="Screen Size" current="{{$issue->screen_size}}" /> 
            </div>
        
            <x-input-custom name="description" type="text" label="Description" current="{{$issue->description}}" /> 
            <button type="submit" class="btn btn-primary">Update issue</button>

        </form>

      </div>
  </div>
</x-app-layout>