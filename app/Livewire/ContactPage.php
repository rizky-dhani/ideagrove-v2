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
                '<title>Contact — The Idea Grove Studio</title>',
                '<meta name="description" content="Get in touch with The Idea Grove Studio. We\'d love to hear about your project — brand identities, websites, and applications for organisations that take their craft seriously.">',
            ]),
        ]);
    }
}
