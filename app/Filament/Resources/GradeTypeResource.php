<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeTypeResource\Pages;
use App\Filament\Resources\GradeTypeResource\RelationManagers;
use App\Models\GradeType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeTypeResource extends Resource
{
    protected static ?string $model = GradeType::class;

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
            'index' => Pages\ListGradeTypes::route('/'),
            'create' => Pages\CreateGradeType::route('/create'),
            'edit' => Pages\EditGradeType::route('/{record}/edit'),
        ];
    }
}
