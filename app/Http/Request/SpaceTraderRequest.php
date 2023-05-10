<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\IRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class SpaceTraderRequest implements IRequest
{
    const QUERY_SELECT = '_fields';

    private ConsoleOutput $out;

    public function __construct()
    {
        $this->out = new ConsoleOutput();
    }

    /**
     * @throws InvalidRequestException
     */
    public function post(string $url, array $params = []): Response
    {
        if (App::environment('local', 'staging')) {
            $prefix = 'WooCommerce POST Request';
            $requestLog = sprintf(
                '%s/%s BODY %s',
                config('api.wc_host'),
                $url,
                json_encode($params)
            );
            Log::channel('requests')->info($prefix, [$requestLog]);
            $this->out->writeln($prefix . " " . $requestLog);
        }

        $response = Http::timeout(config('api.timeout'))->withBasicAuth(...
            $this->buildBasicAuth())->post(config('api.wc_host') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check username and/or password for WooCommerce API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        if (App::environment('local', 'staging')) {
            Log::channel('requests')->info('WooCommerce POST Response', [$response->body()]);
        }

        return $response;
    }

    /**
     * @throws InvalidRequestException
     */
    public function get(string $url, array $params = []): array
    {
        if (App::environment('local', 'staging')) {
            $prefix = 'WooCommerce GET Request';
            $requestLog = sprintf(
                '%s/%s?%s',
                config('api.wc_host'),
                $url,
                Arr::query($params)
            );
            Log::channel('requests')->info($prefix, [$requestLog]);
            $this->out->writeln($prefix . " " . $requestLog);
        }

        $response = Http::timeout(config('api.timeout'))->withBasicAuth(...
            $this->buildBasicAuth())->get(config('api.wc_host') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check username and/or password for WooCommerce API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        if (App::environment('local', 'staging')) {
            Log::channel('requests')->info('WooCommerce GET Response: ', [$response->body()]);
        }

        return $response->json();
    }

    private function buildBasicAuth(): array
    {
        return [config('api.wc_auth_key'), config('api.wc_auth_secret')];
    }
}
