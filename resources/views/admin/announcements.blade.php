@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Annonces</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Annonces</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">La table des annonces</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Designation</th>
                                    <th>Vendeur</th>
                                    <th>Catégorie</th>
                                    <th>Type</th>
                                    <th>Statut </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>

                                <tr >
                                    <td>1</td>
                                    <td>STUDIO TOULOUSE</td>
                                    <td>Atik Romaissa</td>
                                    <td>Studio</td>
                                    <td>location </td>
                                    <td><span class="badge bg-warning text-dark">En attente</span></td>
                                    <td>
                                        <form action="" method="post">
                                         <div class="d-flex">
                                            <a href="" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                 </tr>
                                 <tr >
                                    <td>1</td>
                                    <td>STUDIO TOULOUSE</td>
                                    <td>Atik Romaissa</td>
                                    <td>Studio</td>
                                    <td>Vendre </td>
                                    <td><span class="badge bg-warning text-dark">En attente</span></td>
                                    <td>
                                        <form action="" method="post">
                                         <div class="d-flex">
                                            <a href="" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                 </tr>
                                 <tr >
                                    <td>1</td>
                                    <td>STUDIO TOULOUSE</td>
                                    <td>Atik Romaissa</td>
                                    <td>Studio</td>
                                    <td>Vendre</td>
                                    <td><span class="badge bg-warning text-dark">En attente</span></td>
                                    <td>
                                        <form action="" method="post">
                                         <div class="d-flex">
                                            <a href="" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                 </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
