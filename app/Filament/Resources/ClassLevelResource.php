<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassLevelResource\Pages;
use App\Filament\Resources\ClassLevelResource\RelationManagers;
use App\Models\ClassLevel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassLevelResource extends Resource
{
    protected static ?string $model = ClassLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Classrooms management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('classId')
                    ->label('Class ID')
                    ->required()
                    ->maxLength(255), // classId should be like 2025-F5-PCM-A
                Forms\Components\TextInput::make('year')
                    ->label('Year')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('level')
                    ->label('Level')
                    ->maxLength(255),
                Forms\Components\TextInput::make('combination')
                    ->label('Combination')
                    ->maxLength(255),
                Forms\Components\TextInput::make('stream')
                    ->label('Stream')
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('classId')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('year')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('level')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('combination')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('stream')->searchable()->sortable(),
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
            'index' => Pages\ListClassLevels::route('/'),
            // 'create' => Pages\CreateClassLevel::route('/create'),
            // 'edit' => Pages\EditClassLevel::route('/{record}/edit'),
        ];
    }
}
