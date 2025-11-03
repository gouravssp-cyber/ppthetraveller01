<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageVariantResource\Pages;
use App\Filament\Resources\PackageVariantResource\RelationManagers;
use App\Models\PackageVariant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageVariantResource extends Resource
{
    protected static ?string $model = PackageVariant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPackageVariants::route('/'),
            'create' => Pages\CreatePackageVariant::route('/create'),
            'edit' => Pages\EditPackageVariant::route('/{record}/edit'),
        ];
    }
}
