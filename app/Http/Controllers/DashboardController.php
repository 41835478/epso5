<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Eliminate a list of items from storage.
     * @return \Illuminate\Http\Response
     */
    public function eliminate()
    {
        $delete = $this->controller->eliminate();
            return $delete 
                ? redirect()->back()->withStatus(__('The items has been deleted successfuly'))
                : redirect()->back()->withErrors([
                    __('An error occurred during the delete process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }
}
