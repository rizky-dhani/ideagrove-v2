<?php

namespace App\Livewire;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $message = '';

    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    public function submit(): void
    {
        $this->validate();

        Mail::raw("Name: {$this->name}\nEmail: {$this->email}\n\n{$this->message}", function ($mail) {
            $mail->to(SiteSetting::first()?->email ?? config('mail.from.address'))
                ->from($this->email, $this->name)
                ->subject('New enquiry from ideagrove.studio');
        });

        $this->sent = true;
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
