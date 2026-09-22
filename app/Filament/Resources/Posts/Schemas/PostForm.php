<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true, modifyRuleUsing: fn ($rule, Get $get) => $rule->where('locale', $get('locale') ?? 'en'))
                    ->helperText('Leave empty to generate from the title. Must be unique within the locale.')
                    ->columnSpanFull(),
                Select::make('locale')
                    ->options(['en' => 'English', 'id' => 'Bahasa Indonesia'])
                    ->default('en')
                    ->required()
                    ->live()
                    ->helperText('The language this post is written in. Its URL lives under this locale.'),
                TextInput::make('translation_key')
                    ->label('Translation key')
                    ->maxLength(255)
                    ->helperText('Optional. Give the EN and ID versions the same key so they link to each other as translations.'),
                Textarea::make('excerpt')
                    ->nullable()
                    ->rows(2)
                    ->helperText('Short summary. Falls back to the first 40 words of the body.')
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->image()
                    ->maxSize(5120)
                    ->helperText('Max file size: 5 MB')
                    ->disk('public')
                    ->directory('posts')
                    ->visibility('public')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, Get $get): string {
                        $name = $get('title') ? Str::slug($get('title')) : (string) Str::ulid();

                        return "{$name}.".$file->getClientOriginalExtension();
                    })
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ]),
                Select::make('author_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->default(fn () => auth()->id())
                    ->nullable(),
                Select::make('status')
                    ->options([
                        Post::STATUS_DRAFT => 'Draft',
                        Post::STATUS_PUBLISHED => 'Published',
                    ])
                    ->default(Post::STATUS_DRAFT)
                    ->required(),
                DateTimePicker::make('published_at')
                    ->nullable()
                    ->helperText('A future date on a published post means it stays hidden until then.'),
                Toggle::make('is_featured')
                    ->default(false),
                Textarea::make('meta_description')
                    ->nullable()
                    ->maxLength(500)
                    ->helperText('Override the meta description (falls back to the excerpt).')
                    ->columnSpanFull(),
            ]);
    }
}
