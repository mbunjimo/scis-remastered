<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssessmentTypeResource\Pages;
use App\Filament\Resources\AssessmentTypeResource\RelationManagers;
use App\Models\AssessmentsType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssessmentsTypeResource extends Resource
{
    protected static ?string $model = AssessmentsType::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Assessments management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('assessmentTypeId')
                    ->label('Assessment Type ID')
                    ->placeholder('2024-TERMINAL-1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->placeholder('2025 Test 1, 2025 Midterm, 2025 Final, etc.')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('assessmentTypeId')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description')->wrap(),
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
            'index' => Pages\ListAssessmentTypes::route('/'),
            // 'create' => Pages\CreateAssessmentType::route('/create'),
            // 'edit' => Pages\EditAssessmentType::route('/{record}/edit'),
        ];
    }
}
