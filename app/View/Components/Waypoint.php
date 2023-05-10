<?php

namespace App\View\Components;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityFetcher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Waypoint as WaypointModel;

class Waypoint extends Component
{
    private string $symbol;
    private EntityFetcher $entityFetcher;

    /**
     * Create a new component instance.
     */
    public function __construct(string $symbol, EntityFetcher $entityFetcher)
    {
        //
        $this->symbol = $symbol;
        $this->entityFetcher = $entityFetcher;
    }

    /**
     * Get the view / contents that represent the component.
     * @throws InvalidRequestException
     */
    public function render(): View|Closure|string
    {
        $symbolParts = explode('-', $this->symbol);

        if (sizeof($symbolParts) !== 3) {
            throw new InvalidRequestException('Invalid symbol');
        }

        $systemSymbol = $symbolParts[0] . '-' . $symbolParts[1];
        $url = sprintf('systems/%s/waypoints/%s', $systemSymbol, $this->symbol);

        return view('components.waypoint', [
            'waypoint' => $this->entityFetcher->fetchEntity($url, WaypointModel::class),
        ]);
    }
}
