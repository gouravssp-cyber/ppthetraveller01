<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageSectionResource\Pages;
use App\Models\PackageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageSectionResource extends Resource
{
    protected static ?string $model = PackageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Package Sections';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Tour Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Package Section')
                    ->tabs([
                        // TAB 1: BASIC INFO
                        Forms\Components\Tabs\Tab::make('Basic Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Section::make('Section Details')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Section Title')
                                            ->required()
                                            ->maxLength(150)
                                            ->unique('package_sections', 'title', ignoreRecord: true)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                                $set('slug', \Illuminate\Support\Str::slug($state));
                                            }),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('Slug (Auto-generated)')
                                            ->required()
                                            ->unique('package_sections', 'slug', ignoreRecord: true)
                                            ->maxLength(150)
                                            ->disabled()
                                            ->dehydrated(),

                                        Forms\Components\RichEditor::make('description')
                                            ->label('Section Description')
                                            ->helperText('Paragraph describing this section (appears on section page)')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('section_icon')
                                            ->label('Section Icon')
                                            ->maxLength(100)
                                            ->helperText('E.g., heroicon-o-star, heroicon-o-fire (Heroicon name)'),

                                        Forms\Components\TextInput::make('position')
                                            ->label('Position')
                                            ->numeric()
                                            ->required()
                                            ->default(0)
                                            ->helperText('Lower numbers appear first (0, 1, 2, ...)'),

                                        Forms\Components\Select::make('status')
                                            ->label('Status')
                                            ->options([
                                                'active' => 'Active (Show on homepage)',
                                                'inactive' => 'Inactive (Hidden)',
                                            ])
                                            ->default('active')
                                            ->required(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Banner Image')
                                    ->description('Banner image for section detail page')
                                    ->schema([
                                        Forms\Components\FileUpload::make('banner_image')
                                            ->label('Banner Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('section-banners')
                                            ->imageEditor()
                                            ->helperText('Recommended size: 1920x600px or similar wide format'),

                                        Forms\Components\TextInput::make('banner_image_alt')
                                            ->label('Banner Alt Text (SEO)')
                                            ->maxLength(200)
                                            ->helperText('Describe the banner image for SEO and accessibility'),
                                    ]),
                            ]),

                        // TAB 2: PACKAGES IN SECTION
                        Forms\Components\Tabs\Tab::make('Packages')
                            ->icon('heroicon-o-map')
                            ->schema([
                                Forms\Components\Section::make('Add Packages to Section')
                                    ->description('Select packages to display in this section')
                                    ->schema([
                                        Forms\Components\Select::make('packages')
                                            ->label('Packages in this Section')
                                            ->relationship('packages', 'title')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->title} ({$record->destination->name})")
                                            ->helperText('Select packages to display in this section')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: SEO
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Section::make('SEO Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(60)
                                            ->helperText('60 characters max'),

                                        Forms\Components\TextInput::make('meta_description')
                                            ->label('Meta Description')
                                            ->maxLength(160)
                                            ->helperText('160 characters max'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('Banner')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl(url('/images/placeholder.png')),

                Tables\Columns\TextColumn::make('position')
                    ->label('Position')
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Section Title')
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
                    ->tooltip(fn ($record) => $record->description),

                Tables\Columns\TextColumn::make('packages_count')
                    ->label('Packages')
                    ->counts('packages')
                    ->badge()
                    ->color('success'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'secondary' => 'inactive',
                    ]),

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
            ->defaultSort('position', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackageSections::route('/'),
            'create' => Pages\CreatePackageSection::route('/create'),
            'edit' => Pages\EditPackageSection::route('/{record}/edit'),
        ];
    }
}
