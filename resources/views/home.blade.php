<!-- TODO Etendre le layout "app" -->
@extends('layouts.app')


<!-- TODO Dans la séction "content", ajouter un container, et dans ce container faire une liste des users et de leur nombre de contacts-->

@section('content')

    <div class="container">

        @auth

        @forelse($users as $user)
            <p>L'utilisateur {{$user->name}}  à {{$user->contacts->count()}} contact(s)</p>
        @empty
            <p>Il n'y a pas encore d'utilisateur</p>
        @endforelse



        @endauth

            @guest
                <p>La liste des contacts est accessible aux personnes possédants un compte</p>

            @endauth


                <!-- OU -->

    </div>








@endsection

