<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

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
                Select::make('icon')
                    ->options(fn (): array => collect(glob(base_path('vendor/codeat3/blade-phosphor-icons/resources/svg/*.svg')))
                        ->map(fn (string $path): string => pathinfo($path, PATHINFO_FILENAME))
                        ->filter(fn (string $name): bool => preg_match('/\-(bold|duotone|fill|light|thin)$/', $name) === 0)
                        ->mapWithKeys(fn (string $name): array => [
                            'phosphor-'.$name => Str::of($name)
                                ->replaceMatches('/\-(logo)?$/', fn (array $m) => $m[1] === '-logo' ? '' : $m[0])
                                ->headline()
                                ->append(str_ends_with($name, '-logo') ? ' Logo' : '')
                                ->toString(),
                        ])
                        ->sort()
                        ->all())
                    ->searchable()
                    ->nullable(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),
            ]);
    }
}
