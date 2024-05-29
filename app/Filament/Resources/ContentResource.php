<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Content;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\ContentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContentResource\RelationManagers;

class ContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()->image()->disk('public'),
                Forms\Components\TextInput::make('video_link')
                    ->required()
                    ->label('Video Link')
                    ->placeholder('Masukkan tautan video')
                    ->type('url'),
                Forms\Components\RichEditor::make('content')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
            Tables\Columns\ImageColumn::make('thumbnail'),
            Tables\Columns\TextColumn::make('link')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')
            ->dateTime(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make()->after(function (Collection $records) {
                foreach($records as $key => $value) {
                    if($value->thumbnail) {
                        Storage::disk('public')->delete($value->thumbnail);
                    }
                    if($value->video) {
                        Storage::disk('public')->delete($value->video);
                    }
                }
            }),
        ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),
        ];
    }    
}
