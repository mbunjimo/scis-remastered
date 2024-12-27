<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectsAssessmentResource\Pages;
use App\Filament\Resources\SubjectsAssessmentResource\RelationManagers;
use App\Models\SubjectsAssessment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectsAssessmentResource extends Resource
{
    protected static ?string $model = SubjectsAssessment::class;

    protected static ?string $navigationLabel = 'Assessments';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Assessments management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('subject_id')
                    ->label('Subject ID')
                    ->relationship('subject', 'subjectId')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('assessment_type_id')
                    ->label('Assessment Type ID')
                    ->relationship('assessmentType', 'assessmentTypeId')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('class_level_id')
                    ->label('Class Level ID')
                    ->relationship('classLevel', 'classId')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('total_marks')
                    ->label('Total Marks')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('weight')
                    ->label('Weight')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('assessment_date')
                    ->label('Assessment Date')
                    ->required(),
                Forms\Components\TimePicker::make('assessment_time')
                    ->label('Assessment Time')
                    ->required(),
                Forms\Components\Select::make('assessment_duration')
                    ->label('Assessment Duration')
                    ->required()
                    ->options(['30 minutes' => '30 minutes', '1 hour' => '1 hour', '2 hours' => '2 hours', '3 hours' => '3 hours']),
                Forms\Components\Select::make('assessment_status')
                    ->label('Assessment Status')
                    ->required()
                    ->options(['pending' => 'Pending', 'in_progress' => 'In Progress', 'marking' => 'Marking', 'completed' => 'Completed']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('subject_id')
                    ->label('Subject ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('assessment_type_id')
                    ->label('Assessment Type ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('class_level_id')
                    ->label('Class Level ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('assessment_date')
                    ->label('Assessment Date')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('assessment_status')
                    ->label('Assessment Status')
                    ->sortable(),
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
            'index' => Pages\ListSubjectsAssessments::route('/'),
            'create' => Pages\CreateSubjectsAssessment::route('/create'),
            'edit' => Pages\EditSubjectsAssessment::route('/{record}/edit'),
        ];
    }
}
