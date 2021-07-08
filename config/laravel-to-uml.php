<?php

return [
    /**
     * Default route to see the UML diagram.
     */
    'route' => '/uml',

    /**
     * You can turn on or off the indexing of specific types
     * of classes. By default, LTU processes only controllers
     * and models.
     */
    'core'          => true,
    'casts'         => false,
    'channels'      => false,
    'commands'      => false,
    'components'    => false,
    'controllers'   => true,
    'events'        => false,
    'exceptions'    => false,
    'jobs'          => false,
    'listeners'     => false,
    'mails'         => false,
    'middlewares'   => false,
    'models'        => false,
    'notifications' => false,
    'observers'     => false,
    'policies'      => false,
    'providers'     => false,
    'requests'      => false,
    'resources'     => false,
    'rules'         => false,
    'repository'    => true,
    'service'       => false,
    'trait'         => false,
    'validator'     => false,
    'core_contract'   => false,
    'core_entity'     => true,
    'core_exception'  => false,
    'core_controller' => true,
    'core_observer'   => false,
    'core_repository' => true,
    'core_support'    => false,
    'core_trait'      => false,
    'core_validator'  => true,
    'core_filter'     => false,

    /**
     * You can define specific nomnoml styling.
     * For more information: https://github.com/skanaar/nomnoml
     */
    'style' => [
        'background' => '#071013',
        'stroke'     => '#EBEBEB',
        'arrowSize'  => 1,
        'bendSize'   => 0.3,
        'direction'  => 'down',
        'gutter'     => 5,
        'edgeMargin' => 0,
        'gravity'    => 1,
        'edges'      => 'rounded',
        'fill'       => '#3A6EA5',
        'fillArrows' => false,
        'font'       => 'Calibri',
        'fontSize'   => 12,
        'leading'    => 1.25,
        'lineWidth'  => 3,
        'padding'    => 8,
        'spacing'    => 40,
        'title'      => 'Filename',
        'zoom'       => 1,
        'acyclicer'  => 'greedy',
        'ranker'     => 'longest-path'
    ],

    /**
     * Specific files can be excluded if need be.
     * By default, all default Laravel classes are ignored.
     */
    'excludeFiles' => [
        'Http/Kernel.php',
        'Console/Kernel.php',
        'Exceptions/Handler.php',
        'Http/Controllers/Controller.php',
        'Http/Controllers/HomeController.php',
        'Http/Middleware/Authenticate.php',
        'Http/Middleware/EncryptCookies.php',
        'Http/Middleware/PreventRequestsDuringMaintenance.php',
        'Http/Middleware/RedirectIfAuthenticated.php',
        'Http/Middleware/TrimStrings.php',
        'Http/Middleware/TrustHosts.php',
        'Http/Middleware/TrustProxies.php',
        'Http/Middleware/VerifyCsrfToken.php',
        'Providers/AppServiceProvider.php',
        'Providers/AuthServiceProvider.php',
        'Providers/BroadcastServiceProvider.php',
        'Providers/EventServiceProvider.php',
        'Providers/RouteServiceProvider.php',
        'Http/Controllers/ApprovalApiToken',
        'Http/Controllers/Auth',
        'Http/Controllers/BusinessPlan',
        'Http/Controllers/Company',
        'Http/Controllers/Deploy',
        'Http/Controllers/LogActivity',
        'Http/Controllers/LogRelease',
        'Http/Controllers/RoleHasFeatureApi',
        'Http/Controllers/Role',
        'Http/Controllers/System',
        'Http/Controllers/UserManagementForAppChat',
        'Http/Controllers/User',
        'Http/Controllers/Version',
        'Repositories/BusinessPlan',
        'Repositories/Company',
        'Repositories/FeatureApi',
        'Repositories/LogActivity',
        'Repositories/LogRelease',
        'Repositories/RoleHasFeatureApi',
        'Repositories/Role',
        'Repositories/User',
        'Repositories/MyRepository',
    ],

    /**
     * In case you changed any of the default directories
     * for different classes, please amend below.
     */
    'directories' => [
        'core'          => 'Core/',
        'casts'         => 'Casts/',
        'channels'      => 'Broadcasting/',
        'commands'      => 'Console/Commands/',
        'components'    => 'View/Components/',
        'controllers'   => 'Http/Controllers/',
        'events'        => 'Events/',
        'exceptions'    => 'Exceptions/',
        'jobs'          => 'Jobs/',
        'listeners'     => 'Listeners/',
        'mails'         => 'Mail/',
        'middlewares'   => 'Http/Middleware/',
        'models'        => 'Models/',
        'notifications' => 'Notifications/',
        'observers'     => 'Observers/',
        'policies'      => 'Policies/',
        'providers'     => 'Providers/',
        'requests'      => 'Http/Requests/',
        'resources'     => 'Http/Resources/',
        'rules'         => 'Rules/',
        'repository'    => 'Repositories/',
        'service'       => 'Services/',
        'trait'         => 'Traits/',
        'validator'     => 'Validations/',
        'core_contract' => 'Core/Contracts/',
        'core_entity'   => 'Core/Entities/',
        'core_exception' => 'Core/Exceptions/',
        // 'core_controller' => 'Core/Http/',
        'core_observer' => 'Core/Observers/',
        // 'core_repository'=> 'Core/Repositories/',
        'core_support'  => 'Core/Support/',
        'core_trait'    => 'Core/Traits/',
        // 'core_validator' => 'Core/Validators/',
        'core_filter'   => 'Core/Repositories/FilterQueryString/'
    ],
];
