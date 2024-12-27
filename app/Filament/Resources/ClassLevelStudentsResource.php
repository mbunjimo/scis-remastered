<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassLevelStudentsResource\Pages;
use App\Filament\Resources\ClassLevelStudentsResource\RelationManagers;
use App\Models\ClassLevel;
use App\Models\ClassLevelStudent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassLevelStudentsResource extends Resource
{
    protected static ?string $model = ClassLevelStudent::class;

    protected static ?string $navigationLabel = 'Students';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Students management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                // Forms\Components\Select::make('class_level_id')
                //     ->relationship('classLevel', 'classId')
                //     ->searchable()
                //     ->required(),

                // Forms\Components\Select::make('student_id')
                //     ->multiple()
                //     ->options(
                //         User::query()
                //             ->whereNotNull('userId')
                //             ->get()
                //             ->mapWithKeys(fn ($user) => [$user->id => $user->userId . ' - ' . $user->name])
                //     )
                //     ->searchable()
                //     ->required()
                //     ->default([]) cure
                //     ->live(),

                Select::make('class_level_id')
                    ->relationship('classLevel', 'classId')
                    ->searchable()
                    ->required(),

                // Multi-select for Inspectors
                Select::make('student_id')
                    ->multiple()
                    // ->relationship('student', 'userId')
                    ->options(
                        User::query()
                            ->whereNotNull('userId')
                            ->get()
                            ->mapWithKeys(fn($user) => [$user->id => $user->userId . ' - ' . $user->name])
                    )
                    ->label('Select Students'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('classLevel.classId')
                    ->label('Class ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Students Names')
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
            'index' => Pages\ListClassLevelStudents::route('/'),
            'create' => Pages\CreateClassLevelStudents::route('/create'),
            'edit' => Pages\EditClassLevelStudents::route('/{record}/edit'),
        ];
    }
}
