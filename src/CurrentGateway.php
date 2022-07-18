<?php

namespace JJSoftwareLtd\CurrentGateway;

use Illuminate\Support\Facades\Http;

class CurrentGateway
{
    protected string $subdomain;

    protected string $key;

    protected string $endpoint;

    public function __construct()
    {
        $this->subdomain = config('current-gateway.subdomain');
        $this->key = config('current-gateway.key');
        $this->endpoint = config('current-gateway.endpoint');
    }

    public function get(string $resource, ?int $id = null, array $parameters = [])
    {
        $parameters = collect(['per_page' => 100])
            ->merge($parameters)
            ->toArray();

        $path = is_null($id) ? $resource : "{$resource}/{$id}";

        return $this->callCurrentApi('get', $path, $parameters);
    }

    public function post(string $resource, array $data = [])
    {
        return $this->callCurrentApi('post', $resource, $data);
    }

    public function put(string $resource, int $id, array $data = [])
    {
        return $this->callCurrentApi('put', "{$resource}/{$id}", $data);
    }

    public function delete(string $resource, int $id)
    {
        return $this->callCurrentApi('delete', "{$resource}/{$id}");
    }

    public function callCurrentApi(string $method, string $path, array $data = [])
    {
        return Http::withHeaders([
            'X-SUBDOMAIN' => $this->subdomain,
            'X-AUTH-TOKEN' => $this->key,
        ])
            ->$method($this->endpoint.$path, $data)
            ->throw()
            ->json();
    }
}
