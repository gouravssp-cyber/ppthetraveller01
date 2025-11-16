<?php

namespace App\Livewire;

use App\Models\PackageSection;
use Livewire\Component;

class HomepageSections extends Component
{
    public function render()
    {
        // Get all active sections ordered by position
        $sections = PackageSection::active()
            ->ordered()
            ->with(['packages' => function ($query) {
                $query->where('status', 'published')
                    ->with(['destination', 'tourType', 'gallery'])
                    ->orderByPivot('position');
            }])
            ->get();

        return view('livewire.homepage-sections', [
            'sections' => $sections
        ]);
    }
}

