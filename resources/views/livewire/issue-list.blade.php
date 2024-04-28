<div wire:poll.visible>

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


