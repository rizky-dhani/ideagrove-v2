<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('platform')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->required()
                    ->url()
                    ->maxLength(2048),
                TextInput::make('icon')
                    ->nullable()
                    ->maxLength(255)
                    ->helperText('Heroicon name, e.g. heroicon-o-camera'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),
            ]);
    }
}
