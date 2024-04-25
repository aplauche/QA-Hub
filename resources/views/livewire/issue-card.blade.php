<div class="flex gap-6 bg-white rounded-md shadow p-4 w-full">

    <div class="grow-0">
      <div>{{ $issue->page }}</div>
      <div>{{ $issue->browser }}</div>
      <div>{{ $issue->screen_size }}</div>
    </div>
  
    <div class="grow">
      {{ $issue->description }}
    </div>

    <div class="grow-0 flex flex-col items-end">
        @if ($issue->completed)
            <button class="block p-4 rounded bg-red-100" wire:click='markIncomplete'>
                Mark Incomplete
            </button>
        @else
            <button wire:click='markComplete'>
                Mark Complete
            </button>
        @endif

        <button wire:confirm='deleteIssue'>
            Delete
        </button>
    </div>
  
  </div>