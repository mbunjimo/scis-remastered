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
                    ->placeholder('2025-F5-PCM-A')
                    ->required()
                    ->maxLength(255), // classId should be like 2025-F5-PCM-A
                Forms\Components\Select::make('year')
                    ->label('Year')
                    ->options([
                        '2020' => '2020',
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->placeholder('F5')
                    ->label('Level')
                    ->maxLength(255),
                Forms\Components\Select::make('combination')
                    ->label('Combination')
                    ->options([
                        'PCM' => 'PCM',
                        'PCB' => 'PCB',
                        'EGM' => 'EGM',
                        'PGM' => 'PGM',
                        'ECA' => 'ECA',
                        'PMC' => 'PMC',
                        'HKL' => 'HKL',
                        'HGK' => 'HGK',
                        'HGL' => 'HGL',
                    ]),
                Forms\Components\Select::make('stream')
                    ->label('Stream')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'E' => 'E',
                        'F' => 'F',
                        'G' => 'G',
                    ]),
                
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
