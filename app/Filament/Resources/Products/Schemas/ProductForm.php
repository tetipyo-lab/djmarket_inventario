<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('cost_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('profit_percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('final_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('category_id')
                    ->numeric(),
                // 📸 Campo para subir múltiples imágenes
                FileUpload::make('images')
                    ->multiple() // permite varias
                    ->image()
                    ->directory('products') // carpeta en storage/app/public/products
                    ->maxFiles(5) // opcional: límite de cantidad
                    ->columnSpanFull(),
            ]);
    }
}
