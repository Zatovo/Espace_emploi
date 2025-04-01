<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Offre;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Offres d\'emploi', Offre::count())
                ->description('Total des offres publiées')
                ->icon('heroicon-o-briefcase')
                ->color('warning'),

            Card::make('Recruteurs', User::where('role', 'recruteur')->count())
                ->description('Nombre total de recruteurs')
                ->icon('heroicon-o-briefcase')
                ->color('warning'),

            Card::make('Candidats', User::where('role', 'candidat')->count())
                ->description('Nombre total de candidats')
                ->icon('heroicon-o-user')
                ->color('success'),
        ];
    }
}
