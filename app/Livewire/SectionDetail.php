<?php

namespace App\Livewire;

use App\Models\PackageSection;
use Livewire\Component;

class SectionDetail extends Component
{
    public $slug;
    public $section;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->section = PackageSection::where('slug', $slug)
            ->active()
            ->with(['packages' => function ($query) {
                $query->where('status', 'published')
                    ->with(['destination', 'tourType', 'gallery'])
                    ->orderByPivot('position');
            }])
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.section-detail', [
            'section' => $this->section
        ]);
    }
}

