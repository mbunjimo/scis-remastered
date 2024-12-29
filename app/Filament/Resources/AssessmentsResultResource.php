<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssessmentsResultResource\Pages;
use App\Filament\Resources\AssessmentsResultResource\RelationManagers;
use App\Models\AssessmentsResult;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssessmentsResultResource extends Resource
{
    protected static ?string $model = AssessmentsResult::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->disabled()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('assessment_id')
                    ->label('Assessment')
                    ->relationship('assessment', 'assessmentType.name')
                    ->searchable()
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('marks')
                    ->label('Marks')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('grade_type_id')
                    ->label('Grade Type')
                    ->relationship('gradeType', 'gradeTypeName'),
                Forms\Components\Select::make('grade_type_range_id')
                    ->label('Grade Type Range')
                    ->relationship('gradeTypeRange', 'grade_mark'),
                Forms\Components\Textarea::make('remarks')
                    ->label('Remarks'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->searchable(),
                Tables\Columns\TextColumn::make('assessment.assessmentType.name')
                    ->label('Assessment Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assessment.subject.name')
                    ->label('Subject')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marks')->searchable()->numeric(),
                Tables\Columns\TextColumn::make('gradeType.name')->searchable()->hidden(),
                Tables\Columns\TextColumn::make('gradeTypeRange.name')->searchable()->hidden(),
                Tables\Columns\TextColumn::make('remarks')->searchable()->hidden(),
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
            'index' => Pages\ListAssessmentsResults::route('/'),
            // 'create' => Pages\CreateAssessmentsResult::route('/create'),
            // 'edit' => Pages\EditAssessmentsResult::route('/{record}/edit'),
        ];
    }

    // This is to prevent a create button or in other words prevent the user from creating a new assessment result
    public static function canCreate(): bool
    {
        return false;
    }

    // This is to prevent a delete button or in other words prevent the user from deleting an assessment result
    // public static function canDelete(): bool
    // {
    //     return false;
    // }
}
