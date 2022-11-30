<?php

namespace JJSoftwareLtd\CurrentGateway;

use Illuminate\Support\Facades\Http;

class CurrentGatewayBase
{
    public function __construct(
        protected string $subdomain,
        protected string $key,
        protected string $endpoint,
    ) {
    }

    public function get(string $resource, array $parameters = []): array
    {
        $parameters = array_merge(['per_page' => 100], $parameters);

        return $this->callCurrentApi('get', $resource, $parameters);
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
        return Http::withHeaders([
            'X-SUBDOMAIN' => $this->subdomain,
            'X-AUTH-TOKEN' => $this->key,
        ])
            ->$method($this->endpoint.$path, $data)
            ->throw()
            ->json();
    }

    public function beforeLastPage(array $meta) : bool
    {
        return ceil($meta['total_row_count'] / $meta['per_page']) > $meta['page'];
    }
}
