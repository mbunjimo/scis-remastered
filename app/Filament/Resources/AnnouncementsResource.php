<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementsResource\Pages;
use App\Filament\Resources\AnnouncementsResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Announcement;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class AnnouncementsResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationGroup = 'Announcements';

    protected static ?string $navigationLabel = 'Announcements';

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\DatePicker::make('expiry_date'),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'draft' => 'Draft',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active'),
                Forms\Components\Select::make('priority')
                    ->options([
                        1 => 'High',
                        2 => 'Medium',
                        3 => 'Low',
                    ])
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\BadgeColumn::make('priority')
                    ->sortable()
                    ->formatStateUsing(fn($state) => match ($state) {
                        1 => 'High',
                        2 => 'Medium',
                        3 => 'Low',
                    })
                    ->color(fn($state) => match ($state) {
                        1 => 'danger',
                        2 => 'warning',
                        3 => 'success',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                //
                Components\Section::make('Announcement Details')
                    ->schema([
                        Components\Group::make([
                            Components\TextEntry::make('title')
                                ->label('Title')
                                ->size('lg')
                                ->weight('bold'),
                            Components\TextEntry::make('description')
                                ->label('Description')
                                ->size('md')
                                ->weight('semibold'),
                            Components\ImageEntry::make('image')
                                ->label('Image')
                                ->width('100%')
                                ->height('100%')
                                ->extraImgAttributes(['class' => 'rounded-xl']),
                        ])->columns(2),

                    ]),

                Components\Section::make('Announcement Status')
                    ->schema([
                        Components\TextEntry::make('expiry_date')
                            ->badge()
                            ->label('Expiry Date'),
                        Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn($state) => match ($state) {
                                'active' => 'success',
                                'draft' => 'warning',
                                'inactive' => 'danger',
                            }),
                        Components\TextEntry::make('priority')
                            ->badge()
                            ->color(fn($state) => match ($state) {
                                1 => 'danger',
                                2 => 'warning',
                                3 => 'success',
                            }),
                    ])->columns(3),
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
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncements::route('/create'),
            'edit' => Pages\EditAnnouncements::route('/{record}/edit'),
            'view' => Pages\ViewAnnouncements::route('/{record}'),
        ];
    }
}
