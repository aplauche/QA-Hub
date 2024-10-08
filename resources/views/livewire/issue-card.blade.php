<div class="flex gap-6 bg-white rounded-md shadow p-4 w-full">

    <div class="grow-0 flex flex-col gap-2 w-[150px]">
      <div class="flex flex-col">
        <strong class="text-xs">Page / Location:</strong>
        {{ $issue->page }}
      </div>
      <div class="flex flex-col">
        <strong class="text-xs">Browsers:</strong>
        {{ $issue->browser }}
      </div>
      <div class="flex flex-col">
        <strong class="text-xs">Screen Sizes:</strong>
        {{ $issue->screen_size }}
      </div>
    </div>
  
    @if ($issue->screenshot)
      <div class="screenshot-container w-[200px] grow-0 shrink-0 bg-slate-200">
        <img wire:click="showModal" src="{{ asset($issue->screenshot) }}" alt="">
      </div>

      @if ($modalOpen)
        <div class="screenshot-modal" wire:click="hideModal">
          <img src="{{ asset($issue->screenshot) }}" alt="">
        </div>
      @endif
    @else
      <div class="w-[200px] text-neutral-500 grow-0 shrink-0 border border-dashed border-black grid place-content-center">
        No screenshot
      </div>
    @endif




    <div class="grow flex flex-col justify-between">
      {{ $issue->description }}

      <span class="test-sm text-neutral-400">Reported by {{$issue->user->email}}</span>
    </div>

    <div class="grow-0 flex flex-col gap-2 items-end justify-between">
   
      <div class="flex gap-3 items-center">
        <div class="priority-chip priority-{{ $issue->priority }}">
          {{ $issue->priority_label }} Priority
        </div>
        @if (!$issue->completed)
            <button class="opacity-50 hover:opacity-100" wire:click='markComplete'>
              <svg width="32px" height="32px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#444"><path d="M7 12.5L10 15.5L17 8.5" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </button>
        @else
            <button class="" wire:click='markIncomplete'>
              <svg width="32px" height="32px" viewBox="0 0 24 24" fill="green" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM7.53044 11.9697C7.23755 11.6768 6.76268 11.6768 6.46978 11.9697C6.17689 12.2626 6.17689 12.7374 6.46978 13.0303L9.46978 16.0303C9.76268 16.3232 10.2376 16.3232 10.5304 16.0303L17.5304 9.03033C17.8233 8.73744 17.8233 8.26256 17.5304 7.96967C17.2375 7.67678 16.7627 7.67678 16.4698 7.96967L10.0001 14.4393L7.53044 11.9697Z" fill="green"></path></svg>
            </button>
        @endif

      </div>


      <div class="flex gap-2">
        <a class="opacity-50 hover:opacity-100" href="{{ route("issues.edit", ["website" => $issue->website->id, "issue" => $issue]) }}">
          <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M20 12V5.74853C20 5.5894 19.9368 5.43679 19.8243 5.32426L16.6757 2.17574C16.5632 2.06321 16.4106 2 16.2515 2H4.6C4.26863 2 4 2.26863 4 2.6V21.4C4 21.7314 4.26863 22 4.6 22H11" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 10H16M8 6H12M8 14H11" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.9541 16.9394L18.9541 15.9394C19.392 15.5015 20.102 15.5015 20.5399 15.9394V15.9394C20.9778 16.3773 20.9778 17.0873 20.5399 17.5252L19.5399 18.5252M17.9541 16.9394L14.963 19.9305C14.8131 20.0804 14.7147 20.2741 14.6821 20.4835L14.4394 22.0399L15.9957 21.7973C16.2052 21.7646 16.3988 21.6662 16.5487 21.5163L19.5399 18.5252M17.9541 16.9394L19.5399 18.5252" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 2V5.4C16 5.73137 16.2686 6 16.6 6H20" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </a>
        <button class="opacity-50 hover:opacity-100" wire:click='deleteIssue' wire:confirm='Are you sure you want to delete this item?'>
          <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M20 9L18.005 20.3463C17.8369 21.3026 17.0062 22 16.0353 22H7.96474C6.99379 22 6.1631 21.3026 5.99496 20.3463L4 9" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 6L15.375 6M3 6L8.625 6M8.625 6V4C8.625 2.89543 9.52043 2 10.625 2H13.375C14.4796 2 15.375 2.89543 15.375 4V6M8.625 6L15.375 6" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
      </div>



    </div>
  
  </div>