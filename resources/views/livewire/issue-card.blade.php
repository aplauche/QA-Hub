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
  
    <div class="w-[200px] grow-0 shrink-0 bg-slate-200">

    </div>

    <div class="grow flex flex-col justify-between">
      {{ $issue->description }}

      <span class="test-sm text-neutral-400">Reported by {{$issue->user->email}}</span>
    </div>

    <div class="grow-0 flex flex-col gap-2 items-end">
        @if (!$issue->completed)
            <button class="btn btn-primary" wire:click='markComplete'>
                Incomplete
            </button>
        @else
            <button class="btn btn-success" wire:click='markIncomplete'>
                Complete!
            </button>
        @endif

        <button class="btn btn-danger" wire:click='deleteIssue' wire:confirm='Are you sure you want to delete this item?'>
            Delete
        </button>
    </div>
  
  </div>