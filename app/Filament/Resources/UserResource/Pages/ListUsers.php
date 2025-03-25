<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    // Définir les colonnes à afficher dans la liste
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label('Nom')
                ->searchable(),  // Permet de rendre cette colonne recherchable
            Tables\Columns\TextColumn::make('lastname')
                ->label('Prénom')
                ->searchable(),  // Permet de rendre cette colonne recherchable
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),  // Permet de rendre cette colonne recherchable
            Tables\Columns\TextColumn::make('tel')
                ->label('Téléphone')
                ->limit(15),  // Limite le nombre de caractères affichés
            Tables\Columns\TextColumn::make('role')
                ->label('Rôle')
                ->sortable(),  // Permet de trier par rôle
            Tables\Columns\TextColumn::make('created_at')
                ->label('Date d\'inscription')
                ->dateTime('d/m/Y'),  // Formater la date d'inscription
        ];
    }

    // Ajouter des filtres (facultatif)
    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('Rôle')
                ->options([
                    'admin' => 'Admin',
                    'recruteur' => 'Recruteur',
                    'candidat' => 'Candidat',
                ])
                ->query(fn (Builder $query, array $data) => $query->where('role', $data['value'])),
        ];
    }

    // Configurer l'ordre et la pagination
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->orderBy('created_at', 'desc');  // Trier par date d'inscription, décroissant
    }

    // Actions disponibles sur chaque ligne (comme modifier, supprimer)
    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
