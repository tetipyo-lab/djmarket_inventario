<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Support\RawJs;


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
                    ->prefix('Gs.'),
                TextInput::make('profit_percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('final_price')
                    ->required()
                    ->integer()
                    ->prefix('Gs.')
                    ->mask(RawJs::make('$money($input)')),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name') // usa la relación definida en el modelo Product
                    ->searchable()
                    ->required(),
                // 📸 Campo para subir múltiples imágenes
                Repeater::make('images')
                    ->relationship() // 🔥 esto conecta con product_images
                    ->schema([
                        FileUpload::make('url')
                            ->image()
                            ->directory('products')
                            ->required(),

                        \Filament\Forms\Components\Toggle::make('is_main')
                        ->label('Imagen Principal'),

                        \Filament\Forms\Components\TextInput::make('position')
                            ->label('Posición')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }
}
