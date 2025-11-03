<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourTypeResource\Pages;
use App\Models\TourType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TourTypeResource extends Resource
{
    protected static ?string $model = TourType::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Tour Types';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Tour Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tour Type Details')
                    ->description('Manage tour types like Domestic, International, Honeymoon')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tour Type Name')
                            ->required()
                            ->unique('tour_types', 'name', ignoreRecord: true)
                            ->maxLength(100)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (Auto-generated)')
                            ->required()
                            ->unique('tour_types', 'slug', ignoreRecord: true)
                            ->maxLength(100)
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Optional description for this tour type'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->default('active')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->tooltip(fn (TourType $record): ?string => $record->description),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'secondary' => 'inactive',
                    ]),

                Tables\Columns\TextColumn::make('packages_count')
                    ->label('Packages')
                    ->counts('packages')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTourTypes::route('/'),
            'create' => Pages\CreateTourType::route('/create'),
            'edit' => Pages\EditTourType::route('/{record}/edit'),
        ];
    }
}
