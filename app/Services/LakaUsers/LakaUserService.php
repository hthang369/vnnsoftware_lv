<?php

namespace App\Services\LakaUsers;

use App\Events\sendConfirmEmail;
use App\Facades\Common;
use Illuminate\Support\Facades\Auth;

class LakaUserService
{
    public function sendCode($id)
    {
        $dataContentConfirm = $this->getConfirmDeleteUser($id);
        $contentConfirm = $this->warningExpired(config('laka.time_expired_code'));
        $contentConfirm .= $this->reformatEmailContent($dataContentConfirm);
        (event(new sendConfirmEmail(Auth::user(), ($contentConfirm))));
    }

    public function getConfirmDeleteUser($id)
    {
        return $this->getReponseApiData(Common::callApi('post', '/api/v1/user/check-status-delete-user', ['user_id' => $id]));
    }

    private function warningExpired($config)
    {
        return __('common.expired_code', ['time' => (int)$config / 60]);
    }

    /**
     * @param $dataContentConfirm
     *
     * @return string
     */
    private function reformatEmailContent($dataContentConfirm)
    {
        $stringReturn = '';
        $dataContentConfirm['delete-rooms'];
        $dataContentConfirm['delete-contact'];

        $stringReturn .= '<h2 style="color:red;">' . __('common.confirm_delete') . '</h2>';
        $stringReturn .= '<hr>';
        $stringReturn .= '<h3>Room delete</h3>';
        if (sizeof($dataContentConfirm['delete-rooms']) === 0) {
            $stringReturn .= 'No data <br>';
        } else {
            foreach ($dataContentConfirm['delete-rooms'] as $v) {
                $stringReturn .= $v . '<br>';
            }
        }
        $stringReturn .= '<hr>';
        $stringReturn .= '<h3>Contact delete</h3>';
        if (sizeof($dataContentConfirm['delete-contact']) === 0) {
            $stringReturn .= 'No data <br>';
        } else {
            foreach ($dataContentConfirm['delete-contact'] as $v) {
                $stringReturn .= $v . '<br>';
            }
        }

        return $stringReturn;

    }

    public function resetPassword($userId)
    {
        return Common::callApi('post', '/api/v1/user/force-reset-password', ['user_id' => $userId]);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function approvalToken($id)
    {
        Common::callApi('post', '/api/v1/api-token/approve-token', ['id' => $id]);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function stopToken($id)
    {
        Common::callApi('post', '/api/v1/api-token/stop-token', ['id' => $id]);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function reopenToken($id)
    {
        Common::callApi('post', '/api/v1/api-token/reopen-token', ['id' => $id]);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteToken($id)
    {
        Common::callApi('post', '/api/v1/api-token/delete-token', ['id' => $id]);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('deleted', true);
    }

    private function getReponseApiData($result)
    {
        if (!data_get($result, 'error_code')) {
            return data_get($result, 'data');
        }
        return [];
    }
}
