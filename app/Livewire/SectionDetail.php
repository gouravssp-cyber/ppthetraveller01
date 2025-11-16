<?php

namespace App\Livewire;

use App\Models\PackageSection;
use App\Models\Destination;
use Livewire\Component;

class SectionDetail extends Component
{
    public $slug;
    public $section;

    public function mount($slug)
    {
        $this->slug = $slug;
        
        // Try to find PackageSection first
        $this->section = PackageSection::where('slug', $slug)
            ->active()
            ->with(['packages' => function ($query) {
                $query->where('status', 'published')
                    ->with(['destination', 'tourType', 'gallery'])
                    ->orderByPivot('position');
            }])
            ->first();
        
        // If not found, try to find Destination
        if (!$this->section) {
            $this->section = Destination::where('slug', $slug)
                ->active()
                ->with(['packages' => function ($query) {
                    $query->where('status', 'published')
                        ->with(['destination', 'tourType', 'gallery'])
                        ->orderBy('created_at', 'desc');
                }])
                ->firstOrFail();
        }
    }

    public function render()
    {
        return view('livewire.section-detail', [
            'section' => $this->section
        ]);
    }
}

