<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre categoría')
                    ->required(),
               FileUpload::make('image_url')
                ->label('Imagen')
                ->image()
                ->directory('categories')
                ->panelLayout('integrated')
                ->visibility('public') // 👈 importante
                ->columnSpanFull(),
            ]);
    }
}
