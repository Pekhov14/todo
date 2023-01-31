<?php

namespace Core;

class Pagination
{
    public function create(array $queryData, $pages): array
    {
        $data = [];

        for($i = 1; $i <= $pages; $i++) {
            if (!array_key_exists('page', $queryData)) {
                $queryData['page'] = 1;
            }

            if ($queryData['page'] > $pages) {
                abort();
            }

            $queryData['page'] = $i;

            $data[] = [
                'url'   => (!empty($queryData)) ? '?' . http_build_query($queryData) : '',
                'value' => $i
            ];
        }

        return $data;
    }
}