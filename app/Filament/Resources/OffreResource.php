<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OffreResource\Pages;
use App\Filament\Resources\OffreResource\RelationManagers;
use App\Models\Offre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OffreResource extends Resource
{
    protected static ?string $model = Offre::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Offres';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('entreprise')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('id_recru')
                    ->label('Recruteur')
                    ->relationship('recruteur', 'name') // Relation avec User
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('date_limit')
                    ->label('Date limite')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(500),
                Forms\Components\Select::make('contrat')
                    ->label('Type de contrat')
                    ->options([
                        'CDI' => 'CDI',
                        'CDD' => 'CDD',
                        'Freelance' => 'Freelance',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entreprise')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('recruteur.name')->label('Recruteur')->searchable(),
                Tables\Columns\TextColumn::make('contrat')->sortable(),
                Tables\Columns\TextColumn::make('date_limit')->date('d/m/Y')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('contrat')
                    ->options([
                        'CDI' => 'CDI',
                        'CDD' => 'CDD',
                        'Freelance' => 'Freelance',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOffres::route('/'),
            'create' => Pages\CreateOffre::route('/create'),
            'edit' => Pages\EditOffre::route('/{record}/edit'),
        ];
    }
}
