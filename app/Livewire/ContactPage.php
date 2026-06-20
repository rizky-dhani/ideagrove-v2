<?php

namespace App\Livewire;

use App\Models\SiteSetting;
use App\Models\SocialLink;
use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        return view('livewire.contact-page', [
            'siteSetting' => SiteSetting::first(),
            'socialLinks' => SocialLink::orderBy('sort_order')->get(),
        ])->layout('layouts.public', [
            'seo' => [
                'title' => __('layout.meta.contact.title'),
                'description' => __('layout.meta.contact.description'),
                'og_image' => asset('assets/images/Logo_Landscape.webp'),
            ],
        ]);
    }
}
