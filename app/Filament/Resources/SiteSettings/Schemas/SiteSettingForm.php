<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('app_name')
                    ->label('Site name')
                    ->maxLength(255)
                    ->nullable()
                    ->helperText('Overrides APP_NAME. Leave blank to use .env value.'),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->nullable(),
                TextInput::make('phone')
                    ->label('Phone (raw)')
                    ->maxLength(100)
                    ->nullable()
                    ->helperText('Raw number for tel: links, e.g. +6281234567890'),
                TextInput::make('phone_display')
                    ->label('Phone (display)')
                    ->maxLength(100)
                    ->nullable()
                    ->helperText('Formatted for display, e.g. +62 812-3456-7890'),
                TextInput::make('office_hours')
                    ->maxLength(255)
                    ->nullable(),
                Textarea::make('address')
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('ga_property_id')
                    ->label('Google Analytics Measurement ID')
                    ->placeholder('G-XXXXXXXXXX')
                    ->maxLength(50)
                    ->nullable()
                    ->helperText(fn () => new HtmlString('Measurement ID (<code>G-XXXXXXXXXX</code>) for the front-end GA4 tracking snippet. Find it in Google Analytics &rarr; Admin &rarr; Data Streams. <a href="'.route('ga-setup-guide').'" target="_blank" class="underline text-primary-500 hover:text-primary-600">Setup Guide</a>. For the server-side admin dashboard widgets, set <code>ANALYTICS_PROPERTY_ID</code> in <code>.env</code> instead (see guide).')),
            ]);
    }
}
