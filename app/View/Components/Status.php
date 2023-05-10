<?php

namespace App\View\Components;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityFetcher;
use App\Models\Agent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    private EntityFetcher $fetcher;

    public function __construct(EntityFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * @throws InvalidRequestException
     */
    public function render(): View|Closure|string
    {
        return view('components.status', [
            'agent' => $this->fetcher->fetchEntity('/my/agent', Agent::class),
        ]);
    }
}
