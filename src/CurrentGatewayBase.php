<?php

namespace JJSoftwareLtd\CurrentGateway;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrentGatewayBase
{
    public function __construct(
        protected string $subdomain,
        protected string $key,
        protected string $endpoint,
    )
    {
    }

    public function get(string $resource, array $parameters = []): array
    {
        $parameters = array_merge(['per_page' => 100], $parameters);

        return $this->callCurrentApi('get', $resource, $parameters);
    }

    public function cachedGet(string $resource, array $parameters = [], int $minutes = 5): array
    {
        $key = 'current-gateway-' . $resource . json_encode($parameters);

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $response = $this->get($resource, $parameters);

        Cache::put($key, $response, Carbon::now()->addMinutes($minutes));

        return $response;
    }

    public function post(string $resource, array $data = []): array
    {
        return $this->callCurrentApi('post', $resource, $data);
    }

    public function put(string $resource, array $data = []): array
    {
        return $this->callCurrentApi('put', $resource, $data);
    }

    public function delete(string $resource): array
    {
        return $this->callCurrentApi('delete', $resource);
    }

    public function callCurrentApi(string $method, string $path, array $data = []): array
    {
        return $this->getBaseHttp()
            ->$method($path, $data)
            ->throw()
            ->json() ?? [];
    }

    public function getBaseHttp(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::withHeaders([
            'X-SUBDOMAIN' => $this->subdomain,
            'X-AUTH-TOKEN' => $this->key,
        ])
            ->baseUrl($this->endpoint);
    }

    public function beforeLastPage(array $meta): bool
    {
        return ceil($meta['total_row_count'] / $meta['per_page']) > $meta['page'];
    }
}
