<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Website: {{ $website->title }}
        </h2>
        <div class="toggle-links flex">
          <a href="{{route("websites.show", ["website" => $website ])}}" class="{{ request()->routeIs('websites.show') ? 'active' : '' }}">QA Site</a>
          <a href="{{route("issues.index", ["website" => $website ])}}" class="{{ request()->routeIs('issues.index') ? 'active' : '' }}">Resolve Issues</a>
        </div>
      </div>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <table class="w-full table-fixed text-center table mt-10">
      <thead>
        <tr class=" ">
          <td class=""></td>
          @foreach ($screen_sizes as $size)
              <td class=" bg-slate-300 font-bold border  px-8 py-4">{{$size}}</td>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($checks as $browser => $sizes)
            <tr>
              <td class="border px-8 py-4">{{$browser}}</td>
              @foreach ($sizes as $size => $reviewers)
                @if ($reviewers)

                  @if (!$reviewers->contains(function($item){
                    return $item->user_id === auth()->user()->id;
                  }))
                    {{-- Table cell not yet complete by user --}}
                    <td class="relative border cursor-pointer hover:bg-neutral-100 bg-white">
                      <div class="flex w-full justify-center">
                        <div class="">
                        @foreach ($reviewers as $info)
                          <div class="chip">
                            {{ substr($info->user->name, 0, 1) }}
                          </div>
                        @endforeach
                        </div>
                      </div>
                      <form class="qa-grid-form" action="{{ route("checks.store", ["website" => $website]) }}" method="POST">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="browser" value="{{ $browser }}" />
                        <input type="hidden" name="size" value="{{ $size }}" />
                        <button type="submit" class="qa-grid-button"></button>
                      </form>
                    </td>

                  @else
                    {{-- Table cell complete by user --}}
                    <td class="relative border cursor-pointer hover:bg-neutral-100 bg-green-50">
                      <div class="flex w-full justify-center">
  
                        @foreach ($reviewers as $review)
                          <div class="chip">
                            {{ substr($review->user->name, 0, 1) }}
                          </div>
                          @if ($review->user_id === auth()->user()->id)
                          <form class="qa-grid-form" action="{{ route("checks.destroy", ["website" => $website, "check" => $review]) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="browser" value="{{ $browser }}" />
                            <input type="hidden" name="size" value="{{ $size }}" />
                            <button type="submit" class="qa-grid-button"></button>
                          </form>
                          @endif
                        @endforeach

                      </div>
                    </td>



                  @endif
                @else
                  {{-- Table cell not enabled for review --}}
                  <td class=" px-8 py-4 bg-slate-200"></td>
                @endif
    
              @endforeach
            </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-8">
      <livewire:create-issue :website="$website" :isQA="true" />
    </div>



  </div>

</x-app-layout>