@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <p style="float: right;">
                    <a href="/needs/add"><button type="button" class="btn btn-primary btn-hg">මෙතනින් අවශ්‍යතා එකතු කරන්න</button></a>
                </p>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>නම</th>
                        <th>අවශ්‍යතා</th>
                        <th>ලිපිනය</th>
                        <th>නගරය</th>
                        <th>දුරකථන</th>
                        <th>පිරිස</th>
                        <th>ඇතුල්කලේ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($needs as $need)
                        <tr>
                            <th scope="row">{{ $need->id }}</th>
                            <td>{{ $need->name }}</td>
                            <td>{{ str_limit($need->needs, 150) }}</td>
                            <td>{{ str_limit($need->address, 200) }}</td>
                            <td>{{ $need->city }}</td>
                            <td>{{ $need->telephone }}</td>
                            <td>{{ $need->heads }}</td>
                            <td>{{ $need->created_at }}</td>
                            <td><button type="button" class="btn btn-primary read-needs" data-id="{{ $need->id }}">Read full</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" style="text-align: center">
                @if($needs && $needs->links())
                    {{ $needs->links() }}
                @endif
            </div>
        </div>

    </div><!-- /.container -->

    <div class="modal fade"  id="needsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title"></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>නම</dt>
                        <dd id="name"></dd>
                        <dt>අවශ්‍යතා</dt>
                        <dd id="needs"></dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address"></dd>
                        <dt>නගරය</dt>
                        <dd id="city"></dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone"></dd>
                        <dt>පිරිස</dt>
                        <dd id="heads"></dd>
                        <dt>ඇතුල්කලේ</dt>
                        <dd id="added"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection