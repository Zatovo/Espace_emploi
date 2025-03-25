<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidatureResource\Pages;
use App\Filament\Resources\CandidatureResource\RelationManagers;
use App\Models\Candidature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CandidatureResource extends Resource
{
    protected static ?string $model = Candidature::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Candidatures';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_cand')
                    ->label('Candidat')
                    ->relationship('candidat', 'name') // Relation avec la table users
                    ->searchable()
                    ->required(),
                Forms\Components\FileUpload::make('cv')
                    ->label('CV')
                    ->disk('public') // Assure-toi que 'public' est bien configuré dans filesystems.php
                    ->directory('cvs')
                    ->downloadable()
                    ->required(),
                Forms\Components\Textarea::make('lm')
                    ->label('Lettre de motivation')
                    ->required(),
                Forms\Components\TextInput::make('adresse')
                    ->label('Adresse')
                    ->maxLength(50)
                    ->required(),
                Forms\Components\TextInput::make('niveau')
                    ->label('Niveau d\'études')
                    ->maxLength(20)
                    ->required(),
                Forms\Components\Textarea::make('exp')
                    ->label('Expérience')
                    ->required(),
                Forms\Components\DatePicker::make('date_naiss')
                    ->label('Date de naissance')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('candidat.name')->label('Candidat')->searchable(),
                Tables\Columns\TextColumn::make('adresse')->searchable(),
                Tables\Columns\TextColumn::make('niveau')->sortable(),
                Tables\Columns\TextColumn::make('exp')->limit(50),
                Tables\Columns\TextColumn::make('date_naiss')->date('d/m/Y')->sortable(),
                Tables\Columns\TextColumn::make('cv')
                    ->label('CV')
                    ->formatStateUsing(fn ($state) => $state !== 'N/A' ? '✅ Disponible' : '❌ Non fourni'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('niveau')
                    ->options([
                        'Bac' => 'Bac',
                        'Bac+2' => 'Bac+2',
                        'Bac+5' => 'Bac+5',
                        'Doctorat' => 'Doctorat',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCandidatures::route('/'),
            'create' => Pages\CreateCandidature::route('/create'),
            'edit' => Pages\EditCandidature::route('/{record}/edit'),
        ];
    }
}
