<div>
    <form wire:submit.prevent = "createPoll">
        <label for="">Poll Title</label>
        <input type="text" wire:model="title">
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <div class="mt-4 mb-4">
            <button class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        <div>
            @foreach ($options as $index => $optoin)
                <div class="mb-4">
                    <label for="">Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" name="" wire:model="options.{{ $index }}">
                        <button class="btn" wire:click.prevent='removeOption({{ $index }})'>Remove</button>
                    </div>
                    @error("options.{$index}")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn">Create poll</button>
    </form>
</div>
</div>
