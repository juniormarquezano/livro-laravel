@extends('layouts.master')

@section('content')
<h1>Create Tasks</h1>

<!-- TODO Capítulo 5 - Componentes frontend - Utilizado para exibir os errors de validação -->
@include('partials.errors')

<div class="col-md-6">
    <form action="{{ route('tasks.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- form-group name -->
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name" class="control-label">Name Task: <span class="text-danger">(*)</span></label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <!-- /form-group name -->

        <!-- form-group description -->
        <div class="col-sm-12">
            <div class="form-group">
                <label for="description" class="control-label">Description: <span class="text-danger">(*)</span></label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>
        <!-- /form-group description -->

        <h4>Entrada de Array</h4>
        <!-- form-group employees[0][firstName] -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="employees[0][firstName]" class="control-label">First Name[0]: <span class="text-danger">(*)</span></label>
                <input id="employees[0][firstName]" type="text" class="form-control" name="employees[0][firstName]">
            </div>
        </div>
        <!-- /form-group employees[0][firstName] -->

        <!-- form-group employees[0][lastName] -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="employees[0][lastName]" class="control-label">Last Name[0]: <span class="text-danger">(*)</span></label>
                <input id="employees[0][lastName]" type="text" class="form-control" name="employees[0][lastName]">
            </div>
        </div>
        <!-- /form-group employees[0]lastName] -->
        
        <!-- form-group employees[1][firstName] -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="employees[1][firstName]" class="control-label">First Name[1]: <span class="text-danger">(*)</span></label>
                <input id="employees[1][firstName]" type="text" class="form-control" name="employees[1][firstName]">
            </div>
        </div>
        <!-- /form-group employees[1][firstName] -->
        
        <!-- form-group employees[1][lastName] -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="employees[1][lastName]" class="control-label">Last Name[1]: <span class="text-danger">(*)</span></label>
                <input id="employees[1][lastName]" type="text" class="form-control" name="employees[1][lastName]">
            </div>
        </div>
        <!-- /form-group employees[1][lastName] -->

        <h4>Upload de Arquivos</h4>
        <!-- form-group profile_picture -->
        <div class="col-sm-12">
            <div class="form-group">
                <label for="profile_picture" class="control-label">Profile Picture <span class="text-danger">(*)</span></label>
                <input id="profile_picture" type="file" class="form-control" name="profile_picture">
            </div>
        </div>
        <!-- /form-group profile_picture -->

        <div class="col-sm-12">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>

    </form>
</div>

@endsection