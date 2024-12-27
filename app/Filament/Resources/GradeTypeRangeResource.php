<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeTypeRangeResource\Pages;
use App\Filament\Resources\GradeTypeRangeResource\RelationManagers;
use App\Models\GradeTypeRange;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeTypeRangeResource extends Resource
{
    protected static ?string $model = GradeTypeRange::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Grades management';

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
            'index' => Pages\ListGradeTypeRanges::route('/'),
            'create' => Pages\CreateGradeTypeRange::route('/create'),
            'edit' => Pages\EditGradeTypeRange::route('/{record}/edit'),
        ];
    }
}
