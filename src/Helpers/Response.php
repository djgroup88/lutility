<?php

namespace Rakhasa\LaravelUtility\Helpers;

class Response
{
    /**
     * Route Redirect
     *
     * @var string
     */
    private static string $route;

    /**
     * Route Params
     *
     * @var mixed
     */
    private static $param;

    /**
     * Call Route
     *
     * @param string $route
     * @param mixed $param
     * @return static
     */
    public static function route(string $route, $param = []): static
    {
        self::$route = $route;
        self::$param = $param;

        return new static();
    }

    /**
     * Success Response
     *
     * @param string $message
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public static function success(string $message = ''): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $message = $message ?: __('utility::response.success');

        return redirect()->route(self::$route, self::$param)->with('status', 'success')->with('message', $message);
    }

    /**
     * Error Reponse
     *
     * @param string $message
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public static function error(string $message = ''): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $message = $message ?: __('utility::response.error');

        return redirect()->route(self::$route, self::$param)->with('status', 'error')->with('message', $message);
    }
}
