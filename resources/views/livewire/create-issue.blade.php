<div class="flex gap-6 bg-white rounded-md shadow p-4 w-full">
    <form class="w-full" wire:submit="save">

        <div class="flex gap-8 w-full">

            <div class="grow-0 w-[300px] mb-4">
               
                <label for="screenshot-file-input" class="custom-file-upload mb-2">
                    <input id="screenshot-file-input" type="file" wire:model="form.screenshot">
                    @if ($form->screenshot) 
                        <img src="{{ $form->screenshot->temporaryUrl() }}">
                    @else
                        <span>Click to choose an image</span>
                    @endif
                </label>
                <input class="w-full rounded border" id="screenshot-paste-input" type="text" placeholder="Or paste image here...">
                @error('form.screenshot') <span class="error">{{ $message }}</span> @enderror
        
            </div>
            <div class="grow">
                <div class="flex gap-4">
                    <x-input-livewire name="page" label="Page/Location" model="form.page" />
                    <x-input-livewire name="browser" label="Browser(s)" model="form.browser" />
                    <x-input-livewire name="screen_size" label="Screen Size(s)" model="form.screen_size" />
                </div>
        
                <x-input-livewire name="description" label="Issue description" model="form.description" />
                <button type="submit" class="btn btn-primary">Create issue</button>

            </div>

        </div>


{{-- 
        <input type="text" wire:model="form.browser">
        <div>
            @error('form.browser')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> --}}


    </form>
</div>

@script
<script>
    console.log("script is there")
    var pasteInput = document.getElementById('screenshot-paste-input');

    pasteInput.addEventListener('paste', function(event) {
    var items = (event.clipboardData || event.originalEvent.clipboardData).items;
    console.log("pasted!")
    console.log(items)
    for (index in items) {
        var item = items[index];
        if (item.kind === 'file' && item.type.startsWith('image/')) {
            var blob = item.getAsFile();
            var fileInput = document.getElementById('screenshot-file-input');
            var fileList = new DataTransfer();
            fileList.items.add(blob);
            fileInput.files = fileList.files;
            fileInput.dispatchEvent(new Event('change'));
            event.preventDefault();
            break; // Exit the loop after handling the first image
        }
    }
});
</script>
@endscript

