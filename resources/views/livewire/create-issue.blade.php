<div class="flex gap-6 bg-white rounded-md shadow p-4 w-full">
    <form wire:submit="save">

        <div class="livewire-form-input">
            <label for="page">Page</label>
            <input type="text" wire:model="form.page" id="page">
            <div>
                @error('page')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <input type="text" wire:model="form.browser">
        <div>
            @error('browser')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <input type="text" wire:model="form.screen_size">
        <div>
            @error('screen_size')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <input type="text" wire:model="form.description">
        <div>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-slate-300 px-4 py-2 rounded">Create Issue</button>

    </form>
</div>
