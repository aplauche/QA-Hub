<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Web Projects For QA
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-start gap-4">

            <a href="{{ route("websites.create") }}" class="btn btn-primary">Create a new project</a>

            @forelse ($websites as $website)
                <div class="w-full bg-white shadow-sm hover:shadow sm:rounded-lg p-5 flex justify-between items-center">
                    <a href="{{ route('websites.show', $website) }}">
                        <h3>{{ $website->title }}</h3>
                        {{-- <div>
                            {{ $completed_count }} / {{ $issue_count }} issues resolved
                          </div> --}}
                    </a>
     
                    <div class="flex gap-2 items-center">
                        @if ($website->total_issues_count > 0)
                            <div class="flex items-center gap-2 mr-4">
                                <div class="progress-container">
                                    <div class="progress" style="width: {{($website->completed_issues_count / $website->total_issues_count) * 100}}%;"></div>
                                </div>
                                <div>
                                    {{$website->completed_issues_count}} / {{$website->total_issues_count}}
                                </div>
                            </div>
                        @endif
                 
             
                        <a class="opacity-50 hover:opacity-100" href="{{ $website->url }}" target="_blank">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M21 3L15 3M21 3L12 12M21 3V9" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H11" stroke="#000000" stroke-width="1" stroke-linecap="round"></path></svg>                        
                        </a>
                        <a class="opacity-50 hover:opacity-100" href="{{ route('websites.edit', $website) }}">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M20 12V5.74853C20 5.5894 19.9368 5.43679 19.8243 5.32426L16.6757 2.17574C16.5632 2.06321 16.4106 2 16.2515 2H4.6C4.26863 2 4 2.26863 4 2.6V21.4C4 21.7314 4.26863 22 4.6 22H11" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 10H16M8 6H12M8 14H11" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.9541 16.9394L18.9541 15.9394C19.392 15.5015 20.102 15.5015 20.5399 15.9394V15.9394C20.9778 16.3773 20.9778 17.0873 20.5399 17.5252L19.5399 18.5252M17.9541 16.9394L14.963 19.9305C14.8131 20.0804 14.7147 20.2741 14.6821 20.4835L14.4394 22.0399L15.9957 21.7973C16.2052 21.7646 16.3988 21.6662 16.5487 21.5163L19.5399 18.5252M17.9541 16.9394L19.5399 18.5252" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 2V5.4C16 5.73137 16.2686 6 16.6 6H20" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </a>
                        <form id="deleteWebsiteForm" action="{{ route('websites.destroy', $website) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="opacity-50 hover:opacity-100" type="submit" onclick="return confirmSubmit()">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M20 9L18.005 20.3463C17.8369 21.3026 17.0062 22 16.0353 22H7.96474C6.99379 22 6.1631 21.3026 5.99496 20.3463L4 9" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 6L15.375 6M3 6L8.625 6M8.625 6V4C8.625 2.89543 9.52043 2 10.625 2H13.375C14.4796 2 15.375 2.89543 15.375 4V6M8.625 6L15.375 6" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>

            @empty
                <div class="bg-white w-full shadow-sm sm:rounded-lg block p-5">
                    <h3 class="text-center">No active projects...</h3>
                </div>
            @endforelse

        </div>
    </div>



    <script>
        function confirmSubmit() {
            if (confirm('Are you sure you want to delete this site?')) {
                document.getElementById('deleteWebsiteForm').submit();
                return true;
            }
            return false;
        }
    </script>
</x-app-layout>

