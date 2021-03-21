<?php

namespace Modules\Core\Traits;

trait SendResponse
{
    /**
     * @param Boolean $status
     * @param array   $error
     * @param array   $message
     * @param array   $data
     * @param Integer $code
     *
     * @return \Illuminate\Http\JsonResponse
     * @author hoang_son
     */
    public function sendResponse(bool $status,  $error = null, $message = null,  $data = null, int $code)
    {
        return response()->json(
            ['success' => $status, 'error' => $error, 'message' => $message, 'data' => $data],
            $code
        );
    }

    /**
     * send ok response
     *
     * @param string $message
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseOk($data, $message = null)
    {
        return $this->sendResponse(true, [], $message, $data, 200);
    }

    /**
     * send a not found response
     *
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseNotFound($message = [])
    {
        if (!$message) {
            $message = trans('common.resource_not_found');
        }
        return $this->sendResponse(false, [], $message, [], 404);
    }

    /**
     * send a bad request response
     *
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseBadRequest($message = [])
    {
        if (!$message) {
            $message = trans('common.request_failed');
        }
        return $this->sendResponse(false, [], $message,[],404);
    }

    /**
     * send created response
     *
     * @param string $message
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseCreated($data, $message = [])
    {
        if (!$message) {
            $message = trans('common.create_new_success');
        }
        return $this->sendResponse(true, [], $message, $data, 201);
    }

    /**
     * send updated response
     *
     * @param string $message
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseUpdated($data, $message = [])
    {
        if (!$message) {
            $message = trans('common.edit_successfully');
        }
        return $this->sendResponse(true, [], $message, $data, 201);
    }

    /**
     * send deleted response
     *
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseDeleted($message = [])
    {
        if (!$message) {
            $message = trans('common.successfully_deleted');
        }
        return $this->sendResponse(true, [], $message, [], 201);
    }

    /**
     * send forbidden response
     *
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    public function sendResponseForbidden($message = [])
    {
        if (!$message) {
            $message = trans('common.action_forbidden');
        }
        return $this->sendResponse(true, [], $message, [], 403);
    }

    /**
     * send no content
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponseNoContent()
    {
        return response(null, 204);
    }
}
