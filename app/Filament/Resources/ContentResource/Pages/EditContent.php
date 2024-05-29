<?php

namespace App\Filament\Resources\ContentResource\Pages;

use App\Models\content;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ContentResource;

class EditContent extends EditRecord
{
    protected static string $resource = ContentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(content $record){
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
