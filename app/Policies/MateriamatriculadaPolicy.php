<?php

namespace App\Policies;

use App\Materiamatriculada;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MateriamatriculadaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any materiamatriculadas.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the materiamatriculada.
     *
     * @param  \App\User  $user
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function view(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can create materiamatriculadas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return Response::allow();
        }else{
            return Response::deny('No tienes permiso.');
        }
    }

    /**
     * Determine whether the user can update the materiamatriculada.
     *
     * @param  \App\User  $user
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function update(User $user, Materiamatriculada $materiamatriculada)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return Response::allow();
        }else{
            return Response::deny('No tienes permiso.');
        }
    }
    /**
     * Determine whether the user can delete the materiamatriculada.
     *
     * @param  \App\User  $user
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return mixed
     */

    public function delete(User $user, Materiamatriculada $materiamatriculada)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return Response::allow();
        }else{
            return Response::deny('No tienes permiso.');
        }
    }

    /**
     * Determine whether the user can restore the materiamatriculada.
     *
     * @param  \App\User  $user
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function restore(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the materiamatriculada.
     *
     * @param  \App\User  $user
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function forceDelete(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }
}
