<?php

namespace App\View\Components;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\AgentFetcher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    private AgentFetcher $agentFetcher;

    /**
     * Create a new component instance.
     */
    public function __construct(AgentFetcher $agentFetcher)
    {
        //
        $this->agentFetcher = $agentFetcher;
    }

    /**
     * @throws InvalidRequestException
     */
    public function render(): View|Closure|string
    {
        return view('components.status', [
            'myAgent' => $this->agentFetcher->fetchMyAgent()
        ]);
    }
}
