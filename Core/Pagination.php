<?php

namespace Core;

class Pagination
{
    public function create(array $queryData, $pages): array
    {
        $data = [];

        for($i = 1; $i <= $pages; $i++) {
            if (isset($queryData['page'])) {
                if ($queryData['page'] > $pages) {
                    abort();
                }

                $queryData['page'] = $i;
            } else {
                $queryData['page'] = 1;
            }

            $data[] = [
                'url'   => '?' . http_build_query($queryData),
                'value' => $i
            ];
        }

        return $data;
    }
}