<?php

namespace App\Livewire;

use Livewire\Component;

class GalleryModal extends Component
{
    public $images = [];
    public $currentIndex = 0;
    public $showModal = false;

    public function mount($images)
    {
        $this->images = $images->map(fn($img) => [
            'url' => asset('storage/' . $img->image_url),
            'alt' => $img->alt_text,
            'caption' => $img->caption,
        ])->toArray();
    }

    public function openModal($index = 0)
    {
        $this->currentIndex = $index;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function next()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->images);
    }

    public function previous()
    {
        $this->currentIndex = ($this->currentIndex - 1 + count($this->images)) % count($this->images);
    }

    public function goToImage($index)
    {
        $this->currentIndex = $index;
    }

    public function render()
    {
        return view('livewire.gallery-modal');
    }
}
