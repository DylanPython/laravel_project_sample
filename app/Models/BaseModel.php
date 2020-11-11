<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Exceptions\InternalServerErrorException;
use Illuminate\Support\Facades\Log;

class BaseModel
{
    /**
     * 插入语句
     *
     * @param $sql
     * @param array $parameter
     * @throws InternalServerErrorException
     * @return void
     */
    public function insert($sql, $parameter = array())
    {
        try {
            DB::insert($sql, $parameter);
        } catch (\Exception $exception) {
            Log::error("insert error", array($sql, $parameter));
            throw new InternalServerErrorException('Insert Failed', 40201);
        }
    }

    /**
     * 更新语句
     *
     * @param $sql
     * @param array $parameter
     * @throws InternalServerErrorException
     * @return void
     */
    public function update($sql, $parameter = array())
    {
        try {
            DB::update($sql, $parameter);
        } catch (\Exception $exception) {
            Log::error("update error", array($sql, $parameter));
            throw new InternalServerErrorException('Update Failed', 40202);
        }
    }
}
