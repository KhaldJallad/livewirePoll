<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    protected $rules = [
        'title' => 'required||min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:2|max:255',
    ];

    protected $messages = [
        'options.*' => "This option can't be empty",
    ];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)
            ->map(fn($option) => ['name' => $option])
            ->all());

            $this->emit('pollCreated');

        // this code has been commited to where i use the sort cote in the code that is not the creat function
        // foreach ($this->options as $option) {
        //     $poll->options()->create([
        //         'name' => $option,
        //     ]);
        // }

        $this->reset(['title', 'options']);
    }

    // public function mount(){

    // }
}
