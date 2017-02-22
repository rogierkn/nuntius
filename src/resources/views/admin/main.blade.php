@extends('nuntius::template')


@section('content')

    <div class="container nuntius-container">
        <h1 class="title is-1">Nuntius Blogging</h1>
        <div class="router">
            <router-link to="/home">Home</router-link>
        </div>

        <router-view></router-view>

    </div>


@endsection
