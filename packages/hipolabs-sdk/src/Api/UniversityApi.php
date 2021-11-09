<?php

declare(strict_types=1);

namespace HipoLabs\Api;

use HipoLabs\Model\University;

final class UniversityApi extends Api
{
    /**
     * @return University[]
     */
    public function get(string $country = null, string $name = null): array
    {
        $response = $this->http->get(self::resource(), '/search', [
            'country' => $country,
            'name'    => $name,
        ]);

        return $this->transformCollection($response, University::class);
    }

    /**
     * @return University[]
     */
    public function fromMorocco(string $name = null): array
    {
        return $this->get('morocco', $name);
    }

    protected function resource(): string
    {
        return 'universities';
    }
}
