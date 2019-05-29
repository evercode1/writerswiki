<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        switch ($exception) {


            case $exception instanceof AlreadyConfirmedException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Already Confirmed'], 500);
                }

                return response()->view('errors.already-confirmed-exception', compact('exception'), 500);
                break;


            case $exception instanceof AlreadySyncedException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Already Synced'], 500);
                }

                return response()->view('errors.already-synced-exception', compact('exception'), 500);
                break;

            case $exception instanceof ConnectionNotAcceptedException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Connection Not Accepted'], 500);
                }

                return response()->view('errors.connection-not-accepted-exception', compact('exception'), 500);
                break;

            case $exception instanceof CredentialsDoNotMatchException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Credentials Do Not Match'], 500);
                }

                return response()->view('errors.credentials-do-not-match-exception', compact('exception'), 500);
                break;

            case $exception instanceof EmailAlreadyInSystemException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Email Already In System'], 500);
                }

                return response()->view('errors.email-already-in-system-exception', compact('exception'), 500);
                break;

            case $exception instanceof EmailNotProvidedException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Email Not Found'], 500);
                }

                return response()->view('errors.email-not-provided-exception', compact('exception'), 500);
                break;

            case $exception instanceof FileAlreadyExistsException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'FileAlready Exists'], 500);
                }

                return response()->view('errors.file-already-exists-exception', compact('exception'), 500);
                break;

            case $exception instanceof NameException:

                if ($request->ajax()) {
                    return response()->json(['error' => 'Name Exception'], 500);
                }

                return response()->view('errors.name-exception', compact('exception'), 500);
                break;

            case $exception instanceof NoActiveAccountException:

                if ($request->ajax()) {
                    return response()->json(['error' => 'No Active Account'], 500);
                }

                return response()->view('errors.no-active-account-exception', compact('exception'), 500);
                break;

            case $exception instanceof NoMoonsException:

                if ($request->ajax()) {
                    return response()->json(['error' => 'No Moons'], 500);
                }

                return response()->view('errors.no-moons-exception', compact('exception'), 500);
                break;

            case $exception instanceof TokenMismatchException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'operation failed'], 500);
                }

                return response()->view('errors.token-mismatch-exception', compact('exception'), 500);
                break;

            case $exception instanceof TransactionFailedException :

                if ($request->ajax()) {
                    return response()->json(['error' => 'Transaction Failed'], 500);
                }

                return response()->view('errors.transaction-failed-exception', compact('exception'), 500);
                break;

            case $exception instanceof UnauthorizedException:

                if ($request->ajax()) {
                    return response()->json(['error' => 'Unauthorized'], 500);
                }

                return response()->view('errors.unauthorized-exception', compact('exception'), 500);
                break;

            default:

                return parent::render($request, $exception);

        }

    }
}
