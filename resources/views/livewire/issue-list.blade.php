


<div wire:poll.visible>

    <div class="flex justify-between items-center p-4 bg-white rounded-lg shadow-md mb-6">
        Filter by:
        <div class="flex gap-2">
            @foreach ($priorityFilterDictionary as $key => $label)
                @php
                  if(in_array($key, $priorityFilters)){
                    $filterClassName = 'active';
                  } else {
                    $filterClassName = 'inactive';
                  }
                @endphp
                <button class="priority-chip priority-{{ $key }} {{ $filterClassName }}" wire:click='handleFilterToggle({{ $key }})'>{{ $label }}</button>
            @endforeach
        </div>
    </div>


    <h3 class="text-xl font-bold mb-4">Active Issues</h3>

    <div class="flex flex-col gap-4 mb-10">
  

        @forelse ($activeIssues as $issue)

            <livewire:issue-card :website="$website" :issue="$issue" :key="$issue->id" /> 

        @empty

            <div class="py-8 border-dashed rounded border border-black text-center">
                No active issues...
            </div>
          
        @endforelse
    </div>
    


    <h3 class="text-xl font-bold mb-4">Completed Issues</h3>

    <div class="flex flex-col gap-4">
        @forelse ($completedIssues as $issue)
    
            <livewire:issue-card :website="$website" :issue="$issue" :key="'complete-' . $issue->id" />
        @empty

                <div class="py-8 border-dashed rounded border border-black text-center">
                    No completed issues...
                </div>
          
        @endforelse
    </div>
    

</div>


