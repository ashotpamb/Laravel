<?php

namespace App\Http\Middleware;

use App\Services\middleware\CheckLanguageService;
use Closure;
use Illuminate\Http\Request;

class CheckLanguage
{
    private CheckLanguageService $checkLanguageService;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __construct(CheckLanguageService $checkLanguageService)
    {

        $this->checkLanguageService = $checkLanguageService;
    }

    public function handle(Request $request, Closure $next)
    {
        // как дела"
        $text = $request->input('search');
        if (!$this->checkLanguageService->checkLanguage($text)) {
            return redirect('/')->with(['message' => 'Only English']);
        }
        return $next($request);
    }
}
