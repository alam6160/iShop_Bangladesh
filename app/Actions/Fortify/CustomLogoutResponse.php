<?php
namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class CustomLogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        return redirect()->route('admin.login.view');
    }
}
