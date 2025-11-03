<?php

namespace App\Filament\Resources\PackageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $recordTitleAttribute = 'variant_name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('variant_name')
                    ->label('Variant Name')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('e.g., Budget, Standard, Luxury'),

                Forms\Components\TextInput::make('variant_slug')
                    ->label('Slug')
                    ->maxLength(100),

                Forms\Components\Textarea::make('variant_description')
                    ->label('Description')
                    ->rows(3),

                Forms\Components\TextInput::make('duration_days')
                    ->label('Duration Days (optional)')
                    ->numeric()
                    ->helperText('Leave empty to use package duration'),

                Forms\Components\TextInput::make('duration_nights')
                    ->label('Duration Nights (optional)')
                    ->numeric(),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->prefix('₹')
                    ->inputMode('decimal')
                    ->helperText('Leave empty to use package price'),

                Forms\Components\TextInput::make('price_compare_at')
                    ->label('Compare-at Price')
                    ->numeric()
                    ->prefix('₹')
                    ->inputMode('decimal'),

                Forms\Components\TagsInput::make('highlights')
                    ->label('Highlights')
                    ->helperText('Special features of this variant'),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->default('active'),

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
                Tables\Columns\TextColumn::make('variant_name')
                    ->label('Variant')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('INR', locale: 'en_IN'),

                Tables\Columns\TextColumn::make('duration_days')
                    ->label('Days'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors(['success' => 'active', 'secondary' => 'inactive']),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive']),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
