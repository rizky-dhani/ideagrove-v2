<?php

namespace App\Filament\Resources\PostTags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->helperText('Leave empty to generate from the name.')
                    ->unique(ignoreRecord: true),
            ]);
    }
}
