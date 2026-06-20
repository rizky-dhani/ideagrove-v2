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
            'meta' => implode("\n", [
                '<title>'.__('layout.meta.contact.title').'</title>',
                '<meta name="description" content="'.__('layout.meta.contact.description').'">',
            ]),
        ]);
    }
}
