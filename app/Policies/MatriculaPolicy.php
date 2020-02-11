<?php

namespace App\Policies;

use App\Matricula;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatriculaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any matriculas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function view(User $user, Matricula $matricula)
    {
        //
    }

    /**
     * Determine whether the user can create matriculas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Matricula $matricula)
    {
        $user = Auth::user();
        $grupo = $matricula->grupoObject;
        return ( $user->isCoordinadorCentro($centro) || $user->isCreadorGrupo($grupo) || $user->isTutorGrupo($grupo))
        ? Response::allow()
        : Response::deny('Usted no tiene permisos para esta acción');
    }

    /**
     * Determine whether the user can update the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function update(User $user, Matricula $matricula)
    {
        $user = Auth::user();
        $grupo = $matricula->grupoObject;
        return ( $user->isCoordinadorCentro($centro) || $user->isCreadorGrupo($grupo) || $user->isTutorGrupo($grupo))
        ? Response::allow()
        : Response::deny('Usted no tiene permisos para esta acción');
    }

    /**
     * Determine whether the user can delete the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function delete(User $user, Matricula $matricula)
    {
        $user = Auth::user();
        $grupo = $matricula->grupoObject;
        return ( $user->isCoordinadorCentro($centro) || $user->isCreadorGrupo($grupo) || $user->isTutorGrupo($grupo))
        ? Response::allow()
        : Response::deny('Usted no tiene permisos para esta acción');
    }

    /**
     * Determine whether the user can restore the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function restore(User $user, Matricula $matricula)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function forceDelete(User $user, Matricula $matricula)
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
