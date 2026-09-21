<?php

namespace App\Filament\Resources\PostTags;

use App\Filament\Resources\PostTags\Pages\CreatePostTag;
use App\Filament\Resources\PostTags\Pages\EditPostTag;
use App\Filament\Resources\PostTags\Pages\ListPostTags;
use App\Filament\Resources\PostTags\Schemas\PostTagForm;
use App\Filament\Resources\PostTags\Tables\PostTagsTable;
use App\Models\PostTag;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PostTagResource extends Resource
{
    protected static ?string $model = PostTag::class;

    protected static ?string $slug = 'posts/tags';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-hashtag';

    protected static ?string $navigationLabel = 'Tags';

    protected static ?string $navigationParentItem = 'Posts';

    public static function form(Schema $schema): Schema
    {
        return PostTagForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostTagsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPostTags::route('/'),
            'create' => CreatePostTag::route('/create'),
            'edit' => EditPostTag::route('/{record}/edit'),
        ];
    }
}
