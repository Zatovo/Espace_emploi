<?php

namespace App\Filament\Resources\OffreResource\Pages;

use App\Filament\Resources\OffreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ListOffres extends ListRecords
{
    protected static string $resource = OffreResource::class;

    // Définir les colonnes à afficher dans la liste
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('entreprise')
                ->label('Entreprise')
                ->searchable(),  // Recherche sur l'entreprise
            Tables\Columns\TextColumn::make('contrat')
                ->label('Type de contrat')
                ->sortable(),  // Trier par contrat
            Tables\Columns\TextColumn::make('date_limit')
                ->label('Date limite')
                ->date('d/m/Y')  // Format de la date limite
                ->sortable(),  // Trier par date limite
            Tables\Columns\TextColumn::make('description')
                ->limit(50)  // Limiter la description à 50 caractères
                ->label('Description'),
            Tables\Columns\TextColumn::make('recruteur.name')
                ->label('Recruteur') // Afficher le nom du recruteur (relation avec 'users')
                ->searchable(),  // Recherche sur le recruteur
        ];
    }

    // Ajouter des filtres (facultatif)
    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('Contrat')
                ->options([
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Freelance' => 'Freelance',
                ])
                ->query(fn (Builder $query, array $data) => $query->where('contrat', $data['value'])),
        ];
    }

    // Configurer l'ordre et la pagination
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->orderBy('date_limit', 'desc');  // Trier par date limite, décroissant
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
