<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradesTypeResource\Pages;
use App\Filament\Resources\GradesTypeResource\RelationManagers;
use App\Models\GradesType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradesTypeResource extends Resource
{
    protected static ?string $model = GradesType::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Grades management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('gradeTypeId')
                    ->label('Grade Type ID')
                    ->placeholder('O-level-NECTA, A-level-NECTA, etc')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('gradeTypeName')
                    ->label('Grade Type Name')
                    ->placeholder('O-level Necta, A-level Necta, Cambridge grades etc')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->placeholder('This is the description of the grade type')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('gradeTypeId')
                    ->label('Grade Type ID')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
                Tables\Columns\TextColumn::make('gradeTypeName')
                    ->label('Grade Type Name')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListGradesTypes::route('/'),
            'create' => Pages\CreateGradesType::route('/create'),
            'edit' => Pages\EditGradesType::route('/{record}/edit'),
        ];
    }
}
