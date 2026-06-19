<?php

namespace App\Filament\Resources\SocialLinks\Pages;

use App\Filament\Resources\SocialLinks\SocialLinkResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSocialLink extends EditRecord
{
    protected static string $resource = SocialLinkResource::class;

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Social link updated')
            ->body('The social link has been updated successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return SocialLinkResource::getUrl('index');
    }
}
