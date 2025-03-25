<?php

namespace App\Filament\Resources\CandidatureResource\Pages;

use App\Filament\Resources\CandidatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListCandidatures extends ListRecords
{
    protected static string $resource = CandidatureResource::class;

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('Niveau')
                ->options([
                    'Bac' => 'Bac',
                    'Bac+2' => 'Bac+2',
                    'Bac+5' => 'Bac+5',
                    'Doctorat' => 'Doctorat',
                ])
                ->label('Filtrer par niveau'),

            Tables\Filters\SelectFilter::make('candidat_id')
                ->relationship('candidat', 'name')
                ->searchable()
                ->label('Filtrer par candidat'),
        ];
    }
}
