<?php

namespace Tests\Feature;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\BrowserKitTestCase;

class MenuTest extends BrowserKitTestCase
{
    private $menuFieldForAdmin;
    private $menuFieldForPlotsAssign;
    private $menuFieldForTools;
    private $menuFieldForUsers;

    public function setUp()
    {
        parent::setUp();
        
        //Texts
        $this->menuFieldForAdmin        = icon('admin', trans('navbar.admin'));
        $this->menuFieldForPlotsAssign  = icon('assign', trans('navbar.plots:assign'));
        $this->menuFieldForTools        = icon('tools', trans('navbar.tools'));
        $this->menuFieldForUsers        = icon('user', trans('navbar.users'));
    }

/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
*/
   
    /**
     * Admin see the menu fields only for "God or Admin: Administración"
     */
    public function test_admin_see()
    {
        $response = $this->actingAs($this->createAdmin())
            ->get(route('dashboard'))
            ->see($this->menuFieldForAdmin);
    }

    /**
     * Editor cant see the menu fields only for "God or Admin: Administración"
     */
    public function test_editor_dont_see()
    {
        $response = $this->actingAs($this->createEditor())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForAdmin);
    }

    /**
     * User cant see the menu fields only for "God or Admin: Administración"
     */
    public function test_user_dont_see()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForAdmin);
    }

/*
|--------------------------------------------------------------------------
| Plots
|--------------------------------------------------------------------------
*/
   
    /**
     * Admin see the menu field "Asignar" inside the "Plots" submenu
     */
    public function test_admin_see_plot_submenu_field()
    {
        $response = $this->actingAs($this->createAdmin())
            ->get(route('dashboard'))
            ->see($this->menuFieldForPlotsAssign);
    }

    /**
     * Editor see the menu field "Asignar" inside the "Plots" submenu
     */
    public function test_editor_see_plot_submenu_field()
    {
        $response = $this->actingAs($this->createEditor())
            ->get(route('dashboard'))
            ->see($this->menuFieldForPlotsAssign);
    }

    /**
     * User don't see the menu field "Asignar" inside the "Plots" submenu
     */
    public function test_user_dont_see_plot_submenu_field()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForPlotsAssign);
    }

/*
|--------------------------------------------------------------------------
| Tools
|--------------------------------------------------------------------------
*/
   
    /**
     * God see the menu field "Herramientas"
     */
    public function test_god_see_tools_field()
    {
        $response = $this->actingAs($this->createGod())
            ->get(route('dashboard'))
            ->see($this->menuFieldForTools);
    }

    /**
     * Admin don't see the menu field "Herramientas"
     */
    public function test_admin_dont_see_tools_field()
    {
        $response = $this->actingAs($this->createAdmin())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForTools);
    }

    /**
     * Editor don't see the menu field "Herramientas"
     */
    public function test_editor_dont_see_tools_field()
    {
        $response = $this->actingAs($this->createEditor())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForTools);
    }

    /**
     * User don't see the menu field "Herramientas"
     */
    public function test_user_dont_see_tools_field()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForTools);
    }

/*
|--------------------------------------------------------------------------
| Users see his name
|--------------------------------------------------------------------------
*/
    /**
     * User see his name on the menu bar
     */
    public function test_user_see_his_name_in_the_menu_bar()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route('dashboard'))
            ->see($this->createUser()->name)
            ->see(route('dashboard.user.users.edit', $this->createUser()->id));
    }

/*
|--------------------------------------------------------------------------
| Users menu field
|--------------------------------------------------------------------------
*/
    /**
     * Editor see the menu field "users"
     */
    public function test_editor_see_users_menu_field()
    {
        $response = $this->actingAs($this->createEditor())
            ->get(route('dashboard'))
            ->see($this->menuFieldForUsers);
    }

    /**
     * User don't see the menu field "users"
     */
    public function test_user_dont_see_users_menu_field()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route('dashboard'))
            ->dontSee($this->menuFieldForUsers);
    }
}
