<table wire:poll class="w-full table-fixed text-center table mt-10">
    <thead>
      <tr class=" ">
        <td class=""></td>
        @foreach ($screen_sizes as $size)
            <td class=" bg-neutral-800 text-white font-bold border  px-8 py-4">{{$size}}px</td>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach ($checks as $browser => $sizes)
          <tr>
            <td class="border px-8 py-4 bg-neutral-800 text-white font-bold">{{$browser}}</td>
            @foreach ($sizes as $size => $reviewers)
              @if ($reviewers)
           
                  <td class="relative border cursor-pointer hover:bg-neutral-100 bg-white">
                    <div class="flex w-full justify-center items-center gap-1">

                      @foreach ($reviewers as $review)

                        {{-- Delete form for check done by current user --}}
                        @if ($review->user_id === auth()->user()->id)
                            <div class="chip chip-self">
                                {{ substr($review->user->name, 0, 1) }}
                            </div>
                            <button class="qa-grid-form" wire:click="markIncomplete({{ $review->id }})"></button>
                        {{-- <form class="qa-grid-form" action="{{ route("checks.destroy", ["website" => $website, "check" => $review]) }}" method="POST">
                          @csrf
                          @method("DELETE")
                          <input type="hidden" name="browser" value="{{ $browser }}" />
                          <input type="hidden" name="size" value="{{ $size }}" />
                          <button type="submit" class="qa-grid-button"></button>
                        </form> --}}
                        @else
                            <div class="chip">
                                {{ substr($review->user->name, 0, 1) }}
                            </div>
                        @endif
                      @endforeach

                      {{-- If no checks by current user display add form --}}
                      @if (!$reviewers->contains(function($item){
                        return $item->user_id === auth()->user()->id;
                      }))
                        <button class="qa-grid-form" wire:click="markComplete({{ $size }}, '{{ $browser }}')"></button>

                        {{-- <form class="qa-grid-form" action="{{ route("checks.store", ["website" => $website]) }}" method="POST">
                          @csrf
                          @method("POST")
                          <input type="hidden" name="browser" value="{{ $browser }}" />
                          <input type="hidden" name="size" value="{{ $size }}" />
                          <button type="submit" class="qa-grid-button"></button>
                        </form> --}}
                      @endif

                    </div>
                  </td>
          
              @else
                {{-- Table cell not enabled for review --}}
                <td class=" px-8 py-4 bg-neutral-300"></td>
              @endif
  
            @endforeach
          </tr>
      @endforeach
    </tbody>
  </table>