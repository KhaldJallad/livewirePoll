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
                    <label for=""></label>
                </div>
            @endforeach

        </div>
    </form>
</div>
