<?php

namespace App\Http\Controllers\Dashboard\God;

use App\Http\Controllers\Controller;
use App\Repositories\Users\User;
use Credentials;

class ToolsController extends Controller
{
    /**
     * Change the user role.
     *
     * @return \Illuminate\Http\Response
     */
    public function role($id)
    {
        //Get the role
        switch ($id) {
            case 0:
                $role = [
                    'is_god'            => true,
                    'is_admin'          => true,
                    'is_editor'         => true,
                    'is_user'           => true,
                ];
                break;
            case 1:
            $role = [
                'is_god'            => false,
                'is_admin'          => true,
                'is_editor'         => true,
                'is_user'           => true,
            ];
                break;
            case 2:
            $role = [
                'is_god'            => false,
                'is_admin'          => false,
                'is_editor'         => true,
                'is_user'           => true,
            ];
                break;
            default:
            $role = [
                'is_god'            => false,
                'is_admin'          => false,
                'is_editor'         => false,
                'is_user'           => true,
            ];
        }

        //Only God can use this feature
        if(Credentials::id() === 1) {
            $update = User::where('id', Credentials::id())
                ->update($role);

            return redirect()->back();
        }

        return Credentials::accessError();
    }

    /**
     * Change the user client.
     *
     * @return \Illuminate\Http\Response
     */
    public function client($id, UsersInterface $user)
    {
        $update = $user->updateField('client_id', $id, Credentials::user('id'));

        return redirect()->back();
    }
}
