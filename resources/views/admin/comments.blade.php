@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Commentaires</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Commentaires</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">La table des commentaires</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Annonce</th>
                                    <th>Commentaire </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                             @foreach($comments as $comment)
                                <tr >
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->user->first_name}} {{ $comment->user->last_name}}</td>
                                    <td>{{ $comment->property->designation }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        <form action="{{ asset('admin/comments/'.$comment->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         <div class="d-flex">
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                 </tr>
                             @endforeach
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
