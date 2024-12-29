<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradesTypesRangeResource\Pages;
use App\Filament\Resources\GradesTypesRangeResource\RelationManagers;
use App\Models\GradesType;
use App\Models\GradesTypesRange;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradesTypesRangeResource extends Resource
{
    protected static ?string $model = GradesTypesRange::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Grades management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('grade_type_id')
                    ->label('Grade Type')
                    ->relationship('gradeType', 'gradeTypeName')
                    ->required(),
                Forms\Components\Select::make('grade_mark')
                    ->label('Grade Mark')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'E' => 'E',
                        'F' => 'F',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('lower_limit')
                    ->label('Lower Limit')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('upper_limit')
                    ->label('Upper Limit')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('gradeType.gradeTypeName')
                    ->label('Grade Type Name')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
                Tables\Columns\TextColumn::make('grade_mark')
                    ->label('Grade Mark')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
                Tables\Columns\TextColumn::make('lower_limit')
                    ->label('Lower Limit')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
                Tables\Columns\TextColumn::make('upper_limit')
                    ->label('Upper Limit')
                    ->sortable()
                    ->searchable()
                    ->width('20%'),
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
            'index' => Pages\ListGradesTypesRange::route('/'),
            'create' => Pages\CreateGradesTypesRange::route('/create'),
            'edit' => Pages\EditGradesTypesRange::route('/{record}/edit'),
        ];
    }
}
