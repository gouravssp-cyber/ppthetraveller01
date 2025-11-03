<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Packages';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Tour Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Package Management')
                    ->tabs([
                        // TAB 1: BASIC INFO
                        Forms\Components\Tabs\Tab::make('Basic Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Section::make('Package Details')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Package Title')
                                            ->required()
                                            ->maxLength(200)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $state, Forms\Set $set, ?Package $record) {
                                                // Only auto-generate slug for new packages
                                                if (!$record) {
                                                    $set('slug', \Illuminate\Support\Str::slug($state));
                                                }
                                            }),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('URL Slug')
                                            ->required()
                                            ->unique('packages', 'slug', ignoreRecord: true)
                                            ->maxLength(200)
                                            ->helperText('Use old site slug to preserve SEO'),

                                        Forms\Components\Select::make('tour_type_id')
                                            ->label('Tour Type')
                                            ->relationship('tourType', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Tour Type Name')
                                                    ->required()
                                                    ->unique('tour_types', 'name'),
                                                Forms\Components\TextInput::make('slug')
                                                    ->label('Slug')
                                                    ->required()
                                                    ->unique('tour_types', 'slug'),
                                                Forms\Components\Select::make('status')
                                                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                                                    ->default('active'),
                                            ])
                                            ->createOptionUsing(function (array $data) {
                                                return \App\Models\TourType::create($data)->id;
                                            }),

                                        Forms\Components\Select::make('destination_id')
                                            ->label('Destination')
                                            ->relationship('destination', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Destination Name')
                                                    ->required()
                                                    ->unique('destinations', 'name'),
                                                Forms\Components\TextInput::make('slug')
                                                    ->label('Slug')
                                                    ->required()
                                                    ->unique('destinations', 'slug'),
                                                Forms\Components\Textarea::make('description')
                                                    ->rows(3),
                                            ])
                                            ->createOptionUsing(function (array $data) {
                                                return \App\Models\Destination::create($data)->id;
                                            }),

                                        Forms\Components\Checkbox::make('migrated_from_legacy')
                                            ->label('Migrated from Legacy Site')
                                            ->helperText('Check if this package existed on old site'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Description')
                                    ->schema([
                                        Forms\Components\Textarea::make('summary')
                                            ->label('Short Summary')
                                            ->rows(2)
                                            ->maxLength(160)
                                            ->helperText('Appears on listing pages (max 160 chars)')
                                            ->columnSpanFull(),

                                        Forms\Components\RichEditor::make('full_description')
                                            ->label('Full Description')
                                            ->helperText('Detailed content for detail pages')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: PRICING & DURATION
                        Forms\Components\Tabs\Tab::make('Pricing & Duration')
                            ->icon('heroicon-o-currency-rupee')
                            ->schema([
                                Forms\Components\Section::make('Duration')
                                    ->schema([
                                        Forms\Components\TextInput::make('duration_days')
                                            ->label('Days')
                                            ->numeric()
                                            ->required()
                                            ->minValue(1),

                                        Forms\Components\TextInput::make('duration_nights')
                                            ->label('Nights')
                                            ->numeric()
                                            ->required()
                                            ->minValue(0),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Pricing')
                                    ->schema([
                                        Forms\Components\TextInput::make('price_start')
                                            ->label('Starting Price')
                                            ->numeric()
                                            ->required()
                                            ->prefix('₹')
                                            ->inputMode('decimal'),

                                        Forms\Components\TextInput::make('price_compare_at')
                                            ->label('Compare-at Price (Strike-through)')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->inputMode('decimal')
                                            ->helperText('Original price (shows discount)'),

                                        Forms\Components\Select::make('currency')
                                            ->label('Currency')
                                            ->options(['INR' => 'Indian Rupee (₹)', 'USD' => 'US Dollar ($)'])
                                            ->default('INR'),
                                    ])
                                    ->columns(3),

                                Forms\Components\Section::make('Highlights')
                                    ->schema([
                                        Forms\Components\TagsInput::make('highlights')
                                            ->label('Tour Highlights')
                                            ->helperText('Add key highlights as tags')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: SEO
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Section::make('Meta Tags')
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

                                        Forms\Components\TextInput::make('canonical_url')
                                            ->label('Canonical URL')
                                            ->url()
                                            ->helperText('Optional: force a specific canonical URL'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Open Graph (Social Share)')
                                    ->schema([
                                        Forms\Components\TextInput::make('og_title')
                                            ->label('OG Title')
                                            ->maxLength(150),

                                        Forms\Components\TextInput::make('og_description')
                                            ->label('OG Description')
                                            ->maxLength(160),

                                        Forms\Components\FileUpload::make('og_image')
                                            ->label('OG Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('og-images')
                                            ->helperText('Used for social media sharing'),
                                    ])
                                    ->columns(2),
                            ]),

                        // TAB 4: VARIANTS
                        Forms\Components\Tabs\Tab::make('Variants')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Forms\Components\Repeater::make('variants')
                                    ->relationship('variants')
                                    ->label('Package Variants (2-4 recommended)')
                                    ->helperText('Add different variants like Budget, Standard, Luxury')
                                    ->schema([
                                        Forms\Components\TextInput::make('variant_name')
                                            ->label('Variant Name')
                                            ->required()
                                            ->placeholder('e.g., Budget, Standard, Luxury, Adventure'),

                                        Forms\Components\Textarea::make('variant_description')
                                            ->label('Variant Description')
                                            ->rows(2),

                                        Forms\Components\TextInput::make('duration_days')
                                            ->label('Days (optional)')
                                            ->numeric()
                                            ->helperText('Leave empty to use package duration'),

                                        Forms\Components\TextInput::make('duration_nights')
                                            ->label('Nights (optional)')
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
                                            ->label('Variant Highlights'),

                                        Forms\Components\Select::make('status')
                                            ->label('Status')
                                            ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                                            ->default('active'),
                                    ])
                                    ->columns(3)
                                    ->collapsible()
                                    ->collapsed()
                                    ->addActionLabel('Add Variant')
                                    ->columnSpanFull(),
                            ]),

                        // TAB 5: STATUS
                        Forms\Components\Tabs\Tab::make('Status & Visibility')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Forms\Components\Section::make('Publishing')
                                    ->schema([
                                        Forms\Components\Select::make('status')
                                            ->label('Status')
                                            ->options([
                                                'draft' => 'Draft (not visible)',
                                                'published' => 'Published (visible to users)',
                                                'archived' => 'Archived (hidden)',
                                            ])
                                            ->default('draft')
                                            ->required(),

                                        Forms\Components\Checkbox::make('featured')
                                            ->label('Featured Package')
                                            ->helperText('Show prominently on homepage and featured sections'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Package')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),

                Tables\Columns\TextColumn::make('tourType.name')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('destination.name')
                    ->label('Destination')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('duration_days')
                    ->label('Days')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('price_start')
                    ->label('Price')
                    ->money('INR', locale: 'en_IN')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'published',
                        'secondary' => 'archived',
                    ]),

                Tables\Columns\IconColumn::make('featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\TextColumn::make('variants_count')
                    ->label('Variants')
                    ->counts('variants')
                    ->badge()
                    ->color('gray'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tour_type_id')
                    ->label('Tour Type')
                    ->relationship('tourType', 'name'),

                Tables\Filters\SelectFilter::make('destination_id')
                    ->label('Destination')
                    ->relationship('destination', 'name'),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),

                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Featured Only'),

                Tables\Filters\TernaryFilter::make('migrated_from_legacy')
                    ->label('Legacy Packages'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VariantsRelationManager::class,
            RelationManagers\ItineraryDaysRelationManager::class,
            RelationManagers\GalleryRelationManager::class,
            RelationManagers\FaqsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
