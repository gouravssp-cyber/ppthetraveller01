<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationResource\Pages;
use App\Models\Destination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DestinationResource extends Resource
{
    protected static ?string $model = Destination::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = 'Destinations';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Tour Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Destination Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Destination Name')
                                    ->required()
                                    ->unique('destinations', 'name', ignoreRecord: true)
                                    ->maxLength(150)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                        $set('slug', \Illuminate\Support\Str::slug($state));
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug (Auto-generated)')
                                    ->required()
                                    ->unique('destinations', 'slug', ignoreRecord: true)
                                    ->maxLength(150)
                                    ->disabled()
                                    ->dehydrated(),

                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->default('active')
                                    ->required(),

                                Forms\Components\Checkbox::make('featured')
                                    ->label('Featured Destination')
                                    ->helperText('Show on homepage'),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('60 characters max'),

                                Forms\Components\TextInput::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160)
                                    ->helperText('160 characters max'),

                                Forms\Components\TextInput::make('h1_title')
                                    ->label('H1 Heading')
                                    ->maxLength(150),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Destination')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\IconColumn::make('featured')
                    ->label('Featured')
                    ->boolean(),

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

                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Featured Only'),
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
            'index' => Pages\ListDestinations::route('/'),
            'create' => Pages\CreateDestination::route('/create'),
            'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}
