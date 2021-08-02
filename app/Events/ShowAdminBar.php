<?php

namespace Tenbajt\Events;

use Closure;

class ShowAdminBar
{
    /**
     * Whether to show the admin bar on the front-end.
     * 
     * @var bool
     */
    protected $show = false;

    /**
     * Create a new event instance.
     * 
     * @param  bool  $default
     * @return void
     */
    public function __construct(bool $show = false)
    {
        $this->show = $show;
    }

    /**
     * Hook given listener for the event.
     * 
     * @param  Closure  $listener
     * @return void
     */
    public static function hook(Closure $listener): void
    {
        $priority = 10;
        $parameters = collect((new ReflectionFunction($listener))->getParameters());
        $parametersCount = $parameters->count();

        if ($parameters->contains('name', 'priority')) {
            $priority = $parameters->where('name', 'priority')->getDefaultValue();
            $parametersCount = $parametersCount - 1;
        }

        add_filter('show_admin_bar', function () use ($listener): bool {
            $event = new static(...func_get_args());

            return App::call($listener, ['event' => $event]);
        }, $priority, $parametersCount);
    }
}