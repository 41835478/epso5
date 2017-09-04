{!! 
    
    Menu::new()
    ->brand([
        'title' => 'Agroepso v5.4',
        'url' => route('dashboard'),
    ])

    //Left menu container
    ->openContainer()

        //Admin submenu
        ->dropdown([
            'title' => icon('admin', trans('navbar.admin')),
            'role' => 'admin',
            'active' => true,
        ], 
            Menu::new()
            ->subMenuItem([
                'title' => icon('users', trans('navbar.admin:clients')),
                'url' => route('dashboard.admin.clients.index'),
            ])->subMenuItem([
                'title' => icon('crops', trans('navbar.admin:crops')),
                'url' => route('dashboard.admin.crops.index'),
            ])->subMenuItem([
                'title' => icon('biocides', trans('navbar.admin:biocides')),
                'url' => route('dashboard.admin.biocides.index'),
            ])->subMenuItem([
                'title' => icon('world', trans('navbar.admin:countries')),
                'url' => route('dashboard.admin.cities.index'),
            ])->output()
        )

        //Tools submenu
        ->dropdown([
            'title' => icon('tools', trans('navbar.tools')),
            'active' => true,
            'tools' => true,
        ], 
            Menu::new()
            ->subMenuItem([
                'title' => trans('navbar.tools:roles:title'),
            ])->divider()
            ->subMenuItem([
                'title' => icon('assign', trans('selects.roles.god')),
                'url' => route('dashboard.user.tools.role', 0),
            ])->subMenuItem([
                'title' => icon('assign', trans('selects.roles.admin')),
                'url' => route('dashboard.user.tools.role', 1),
            ])->subMenuItem([
                'title' => icon('assign', trans('selects.roles.editor')),
                'url' => route('dashboard.user.tools.role', 2),
            ])->subMenuItem([
                'title' => icon('assign', trans('selects.roles.user')),
                'url' => route('dashboard.user.tools.role', 3),
            ])->output()
        )
        ->separator()

        //Users menu
       ->item([
            'title' => icon('user', trans('navbar.users')),
            'url' => route('dashboard.user.users.index'),
            'active' => true,
            'role' => 'editor',
        ])->separator()

       //Agronomics submenu
       ->dropdown([
           'title' => icon('file', trans('navbar.agronomics')),
           'active' => true,
       ], 
           Menu::new()
           ->subMenuItem([
               'title' => icon('harvests', trans('navbar.agronomics:harvests')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('incidents', trans('navbar.agronomics:incidents')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('biocides', trans('navbar.agronomics:biocides')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('culturals', trans('navbar.agronomics:culturals')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('pests', trans('navbar.agronomics:pests')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('irrigations', trans('navbar.agronomics:irrigations')),
               'url' => 'http://',
           ])->output()
       )

        //Equipment menu
       ->item([
            'title' => icon('equipment', trans('navbar.equipment')),
            'url' => '',
            'active' => true,
        ])

       //Plots submenu
       ->dropdown([
           'title' => icon('plots', trans('navbar.plots')),
           'active' => true,
       ], 
           Menu::new()
           ->subMenuItem([
               'title' => icon('list', trans('navbar.plots:list')),
               'url' => 'http://',
           ])->subMenuItem([
               'title' => icon('add', trans('navbar.plots:new')),
               'url' => 'http://',
           ])->divider()
           ->subMenuItem([
               'title' => icon('assign', trans('navbar.plots:assign')),
               'url' => 'http://',
               'role' => 'editor',
           ])->output()
       )

        //Workers menu
       ->item([
            'title' => icon('workers', trans('navbar.workers')),
            'url' => '',
            'active' => true,
        ])

    //End Container
    ->closeContainer() 

    //Open new right container: Profile         
    ->openContainer('navbar-profile')
        ->getProfile()
        ->logout()
    //End Container
    ->closeContainer()

    //Final output
    ->render()

!!}