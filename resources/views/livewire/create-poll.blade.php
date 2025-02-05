<div>
    <form action="">
        <label for="">Poll Title</label>
        <input type="text" wire:model="title">
        Current title: {{ $title }}

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
                </div>
                {{ $optoin }}
            @endforeach
        </div>
    </form>
</div>
</div>
