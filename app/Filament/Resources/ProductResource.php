<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('ProductTabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\Section::make('Product Details')
            ->schema([
                Forms\Components\TextInput::make('product_name')
                    ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                                if (empty($form->getRawState()['product_id'])) {
                                                    $set('product_id', Str::slug($state));
                                                }
                                            })
                                            ->helperText('The name of the product'),
                                        Forms\Components\TextInput::make('product_id')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true)
                                            ->label('Product ID')
                                            ->helperText('Unique identifier used in the URL (auto-generated from name)'),
                                        Forms\Components\TextInput::make('product_title')
                                            ->required()
                                            ->maxLength(255)
                                            ->helperText('Display title for the product'),
                                        Forms\Components\FileUpload::make('face_image')
                                            ->label('Face Image')
                                            ->image()
                                            ->directory('products/face-images')
                                            ->imageEditor()
                                            ->helperText('Main product image displayed in listings'),
                                    ])
                                    ->columns(2),
                                Forms\Components\Section::make('Category & Status')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->nullable()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->required(),
                                                Forms\Components\TextInput::make('slug')
                                                    ->required(),
                                            ]),
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true)
                                            ->helperText('Inactive products will not be displayed'),
                                    ])
                                    ->columns(2),
                            ]),
                        Forms\Components\Tabs\Tab::make('Variants')
                            ->schema([
                                Forms\Components\Section::make('Product Variants')
                                    ->description('Configure product variants with images, sizes, prices, and details')
                                    ->schema([
                                        Forms\Components\Repeater::make('variants')
                                            ->schema([
                                                Forms\Components\TextInput::make('variant_name')
                                                    ->label('Variant Name')
                                                    ->placeholder('e.g., Blue, Red, Small, Large')
                                                    ->required()
                                                    ->columnSpanFull(),
                                                Forms\Components\FileUpload::make('images')
                                                    ->label('Variant Images')
                                                    ->image()
                                                    ->multiple()
                                                    ->directory('products/variants')
                                                    ->imageEditor()
                                                    ->maxFiles(10)
                                                    ->helperText('Upload multiple images for this variant')
                                                    ->columnSpanFull(),
                                                Forms\Components\TagsInput::make('sizes')
                                                    ->label('Available Sizes')
                                                    ->placeholder('Add size and press Enter')
                                                    ->helperText('e.g., S, M, L, XL')
                                                    ->columnSpanFull(),
                                                Forms\Components\Group::make([
                                                    Forms\Components\TextInput::make('discount_price')
                                                        ->label('Discount Price')
                                                        ->numeric()
                                                        ->prefix('₹')
                                                        ->required(),
                                                    Forms\Components\TextInput::make('original_price')
                                                        ->label('Original Price')
                                                        ->numeric()
                                                        ->prefix('₹')
                                                        ->required()
                                                        ->helperText('Original price before discount'),
                                                ])
                                                    ->columns(2)
                                                    ->columnSpanFull(),
                                                Forms\Components\Section::make('Material & Care')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('product_details.material_care.type')
                                                            ->label('Type')
                                                            ->placeholder('e.g., 100% Cotton')
                                                            ->required(),
                                                        Forms\Components\TextInput::make('product_details.material_care.wash')
                                                            ->label('Wash Instructions')
                                                            ->placeholder('e.g., Machine wash')
                                                            ->required(),
                                                    ])
                                                    ->columns(2)
                                                    ->columnSpanFull(),
                                                Forms\Components\Section::make('Specifications')
                                                    ->schema([
                                                        Forms\Components\Repeater::make('product_details.specifications')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('key')
                                                                    ->label('Specification Name')
                                                                    ->placeholder('e.g., Sleeve Length')
                                                                    ->required(),
                                                                Forms\Components\TextInput::make('value')
                                                                    ->label('Value')
                                                                    ->placeholder('e.g., Long Sleeves')
                                                                    ->required(),
                                                            ])
                                                            ->columns(2)
                                                            ->defaultItems(1)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string => ($state['key'] ?? 'New') . ': ' . ($state['value'] ?? ''))
                                                            ->addActionLabel('Add Specification'),
                                                    ])
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(1)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['variant_name'] ?? 'New Variant')
                                            ->defaultItems(1)
                                            ->addActionLabel('Add Variant')
                                            ->reorderableWithButtons(),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\Section::make('Meta Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('seo.meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(60)
                                            ->helperText('Recommended: 50-60 characters')
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('seo.meta_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('Recommended: 150-160 characters')
                                            ->columnSpanFull(),
                                        Forms\Components\TagsInput::make('seo.meta_keywords')
                                            ->label('Meta Keywords')
                                            ->helperText('Press Enter to add keywords')
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('seo.canonical_url')
                                            ->label('Canonical URL')
                                            ->url()
                                            ->helperText('Canonical URL for this product page')
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Section::make('Open Graph (Facebook)')
                                    ->schema([
                                        Forms\Components\TextInput::make('seo.og_title')
                                            ->label('OG Title')
                                            ->maxLength(60)
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('seo.og_description')
                                            ->label('OG Description')
                                            ->rows(2)
                                            ->maxLength(200)
                                            ->columnSpanFull(),
                                        Forms\Components\FileUpload::make('seo.og_image')
                                            ->label('OG Image')
                                            ->image()
                                            ->directory('products/seo')
                                            ->imageEditor()
                                            ->helperText('Recommended: 1200x630px')
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Section::make('Twitter Card')
                                    ->schema([
                                        Forms\Components\TextInput::make('seo.twitter_title')
                                            ->label('Twitter Title')
                                            ->maxLength(70)
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('seo.twitter_description')
                                            ->label('Twitter Description')
                                            ->rows(2)
                                            ->maxLength(200)
                                            ->columnSpanFull(),
                                        Forms\Components\FileUpload::make('seo.twitter_image')
                                            ->label('Twitter Image')
                                            ->image()
                                            ->directory('products/seo')
                                            ->imageEditor()
                                            ->helperText('Recommended: 1200x675px')
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Section::make('Schema Markup')
                                    ->schema([
                                        Forms\Components\Textarea::make('seo.schema_markup')
                                            ->label('JSON-LD Schema')
                                            ->rows(5)
                                            ->helperText('Add structured data for better search engine understanding')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Where to Show')
                            ->schema([
                                Forms\Components\Section::make('Section Display')
                                    ->description('Select which sections should display this product')
                                    ->schema([
                                        Forms\Components\CheckboxList::make('sections')
                                            ->label('Display in Sections')
                                            ->relationship('sections', 'section_name')
                                            ->searchable()
                                            ->bulkToggleable()
                                            ->gridDirection('row')
                                            ->columns(2)
                                            ->helperText('Check all sections where this product should appear'),
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
                Tables\Columns\ImageColumn::make('face_image')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('product_name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('product_id')
                    ->searchable()
                    ->badge()
                    ->color('gray')
                    ->copyable()
                    ->copyMessage('Product ID copied!'),
                Tables\Columns\TextColumn::make('product_title')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('sections_count')
                    ->label('Sections')
                    ->counts('sections')
                    ->badge()
                    ->color('success'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('sections')
                    ->label('Section')
                    ->relationship('sections', 'section_name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All products')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
