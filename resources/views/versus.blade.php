@extends('layout')

@section('content')
<div id="app" >
    <div class="header clearfix">
        <h3><img src="{{ URL::asset('imgs/header.png') }}" alt="Logo" class="" width="50"/> Versus</h3>
        <a href="{{ route('ladder') }}" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i> Classement</a>
    </div>

    <div class="jumbotron vote">
        <div class="row">
            @include('student', ['id' => 0])
            <div class="col-xs-6 col-xs-pull-3 col-sm-4 col-md-4 absolute">
                <img src="{{ URL::asset('imgs/vs.png') }}" alt="Versus" class="vs"/>
            </div>
            @include('student', ['id' => 1])
        </div>
        <div :class="'ui dimmer ' + (loader ? 'active' : '')">
            <div class="ui text loader">Vote en cours...</div>
        </div>
    </div>

    <div class="panel panel-default filters">
        <div class="panel-heading">
            Filtres
            <button @click="filters" class="btn btn-default pull-right">Afficher</button>
        </div>
        <div class="panel-body">
            <h3>Sexes</h3>
            <label><input type="checkbox" v-model="selectAllSexes"> Tout cocher</label>
            <table class="table table-bordered table-striped">
                <tr v-for="sex in sexes">
                    <td>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="selectedSex" :id="sex" :value="sex" v-on:change="loadStudents"> @{{ sex }}
                            </label>
                        </div>
                    </td>
                </tr>
            </table>
            <h3>Promotions</h3>
            <label><input type="checkbox" v-model="selectAllPromotions"> Tout cocher</label>
            <div class="row">
                <div class="col-xs-12 col-sm-4" v-for="promotionsGroup in promotions">
                    <table class="table table-bordered table-striped">
                        <tr v-for="promotion in promotionsGroup">
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" v-model="selectedPromotions" :id="promotion" :value="promotion" v-on:change="loadStudents"> @{{ promotion }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
