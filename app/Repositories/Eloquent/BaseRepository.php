<?php

namespace App\Repositories\Eloquent;

class BaseRepository
{
    protected function retryQuery($query)
    {
        $retry_count = 0;
        $loop_default_num = config('constants.loop_default');
        while ($retry_count <= $loop_default_num) {
            try {
                $value = $query->get();
                break;
            } catch (\Exception $e) {
                $retry_count++;
                if ($retry_count <= $loop_default_num) {
                    continue;
                }
                return false;
            }
        }
        return $value;
    }

    protected function retryCreate($query, $data)
    {
        $retry_count = 0;
        $loop_default_num = config('constants.loop_default');
        while ($retry_count <= $loop_default_num) {
            try {
                $value = $query->create($data);
                break;
            } catch (\Exception $e) {
                $retry_count++;
                if ($retry_count <= $loop_default_num) {
                    continue;
                }
                return false;
            }
        }
        return $value;
    }

    protected function retryUpdate($query, $data)
    {
        $retry_count = 0;
        $loop_default_num = config('constants.loop_default');
        while ($retry_count <= $loop_default_num) {
            try {
                $value = $query->update($data);
                break;
            } catch (\Exception $e) {
                $retry_count++;
                if ($retry_count <= $loop_default_num) {
                    continue;
                }
                return false;
            }
        }
        return $value;
    }
}
