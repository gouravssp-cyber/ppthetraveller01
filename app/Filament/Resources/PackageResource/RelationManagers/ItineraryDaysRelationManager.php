<?php

namespace App\Filament\Resources\PackageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItineraryDaysRelationManager extends RelationManager
{
    protected static string $relationship = 'itineraryDays';

    protected static ?string $recordTitleAttribute = 'day_title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('day_number')
                    ->label('Day Number')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                Forms\Components\TextInput::make('day_title')
                    ->label('Day Title')
                    ->required()
                    ->maxLength(150)
                    ->placeholder('e.g., Arrival in Srinagar'),

                Forms\Components\RichEditor::make('day_description')
                    ->label('Day Description')
                    ->helperText('Rich text description of the day\'s activities')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('feature_image')
                    ->label('Featured Image')
                    ->image()
                    ->disk('public')
                    ->directory('itinerary')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('feature_image_alt')
                    ->label('Image Alt Text')
                    ->maxLength(200)
                    ->helperText('SEO: Describe the image'),

                Forms\Components\TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_number')
                    ->label('Day')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('day_title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),

                Tables\Columns\ImageColumn::make('feature_image')
                    ->label('Image')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('day_number');
    }
}
