<?php

namespace App\Providers;

use App\Models\Empleados;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Fortify\Fortify;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Fortify::authenticateUsing(function (Request $request) {

            if ($request->curp ==  'DEBP030305HJCLRDA8' or 'admin') {

                Auth::attempt([
                    'curp'    => $request->curp,
                    'password' => $request->password
                ]);
            }

            $ldap_enabled = env('ENABLE_LDAP');
            if ($ldap_enabled) {
                $ldap_connect = ldap_connect(env('LDAP_HOST'));

                ldap_set_option($ldap_connect, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ldap_connect, LDAP_OPT_REFERRALS, 0);

                $ldap_bind = @ldap_bind($ldap_connect, $request->curp, $request->password);

                if ($ldap_bind) {
                    $user = Empleados::firstWhere('curp', $request->curp);
                    if (is_null($user)) {

                        $user = Empleados::create([
                            'curp'       => $request->curp,
                            //'nombre'    => $nombre,
                            'password'  => bcrypt($request->password)
                        ]);
                    }

                    return $user;
                } else {

                    return null;
                }
            }
            if (Auth::attempt([
                'curp' => $request->curp,
                'password' => $request->password
            ])) {
                $user = Empleados::firstWhere('curp', $request->curp);
                return $user;
            } else {
                return 0;
            }
        });
    }
}
