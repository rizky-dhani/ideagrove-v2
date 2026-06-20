<div>
    @if ($sent)
        <div class="rounded-2xl border border-brand/20 bg-brand/5 px-8 py-12 text-center">
            <p class="font-serif text-xl text-charcoal">{{ __('contact.form.thanks', ['name' => $name ?: __('contact.form.fallback_name')]) }}</p>
            <p class="mt-2 text-sm text-warm-gray">{{ __('contact.form.success_body') }}</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-5">
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                <label for="name" class="mb-1.5 block text-sm font-medium text-charcoal/80">{{ __('contact.form.name_label') }}</label>
                    <input wire:model="name" id="name" name="name" type="text" autocomplete="name" placeholder="{{ __('contact.form.name_placeholder') }}"
                           class="w-full rounded-xl border border-peach-medium/50 bg-cream px-4 py-3 text-sm text-charcoal placeholder-charcoal-soft/30 transition-colors focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
                    @error('name') <p class="mt-1 text-xs text-brand">{{ $message }}</p> @enderror
                </div>
                <div>
                <label for="email" class="mb-1.5 block text-sm font-medium text-charcoal/80">{{ __('contact.form.email_label') }}</label>
                    <input wire:model="email" id="email" name="email" type="email" autocomplete="email" placeholder="{{ __('contact.form.email_placeholder') }}"
                           class="w-full rounded-xl border border-peach-medium/50 bg-cream px-4 py-3 text-sm text-charcoal placeholder-charcoal-soft/30 transition-colors focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
                    @error('email') <p class="mt-1 text-xs text-brand">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label for="message" class="mb-1.5 block text-sm font-medium text-charcoal/80">{{ __('contact.form.message_label') }}</label>
                <textarea wire:model="message" id="message" name="message" rows="4" placeholder="{{ __('contact.form.message_placeholder') }}"
                          class="w-full rounded-xl border border-peach-medium/50 bg-cream px-4 py-3 text-sm text-charcoal placeholder-charcoal-soft/30 transition-colors focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20"></textarea>
                @error('message') <p class="mt-1 text-xs text-brand">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
                <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-full bg-brand px-7 py-3 text-sm font-medium text-white transition-all hover:bg-brand-dark hover:shadow-lg disabled:opacity-50"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('contact.form.send') }}</span>
                    <span wire:loading>{{ __('contact.form.sending') }}</span>
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </div>
        </form>
    @endif
</div>
