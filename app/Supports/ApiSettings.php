<?php

namespace App\Supports;

use Dingo\Api\Http\Request;
use App\Http\Resources\EmptyResource;

trait ApiSettings
{

    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $request
     */
    public function with($request)
    {
        return [
            'status' => $this->appData,
        ];
    }

    /**
     * @return mixed
     */
    public function prepareAppData(Request $request, $subData = array(), $status = array())
    {

        $appData = collect([]);

        $data = collect([
            'status'                               => isset($status['status']) ? $status['status'] : 'success',
            'error_code'                           => isset($status['error_code']) ? $status['error_code'] : '',
            'message'                              => isset($status['message']) ? $status['message'] : '',
        ])
            ->each(function ($item, $key) use ($appData) {
                $appData->put($key, $item);
            });

        return $appData;
    }

    /**
     * @param $error_message
     */
    public function failedAppData($error_message, $error_code)
    {
        return [
            'status'     => 'failed',
            'error_code' => $error_code,
            'message'    => $error_message,
        ];
    }

    /**
     * @param $request
     * @param $message
     */
    public function failedResponse($request, $message, $error_code = 999999)
    {
        $status = $this->failedAppData($message, $error_code);

        $emptyData = collect();
        $emptyData->appData = $this->prepareAppData($request, $this->data, $status);

        return new EmptyResource($emptyData);
    }

}
