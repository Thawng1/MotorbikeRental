@extends('layouts.app')
@section('title', 'Details for ID ')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <p><a href="{{ route('owners.index') }}">Back to all owners</a></p>
      <table class="table table-striped">
        <tbody>
          <tr>
            <th>ID</th>
            <td>{{ $owner->id }}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{ $owner->name }}</td>
          </tr>
          <tr>
            <th>Idcard</th>
            <td>{{ $owner->idcard}}</td>
          </tr>
          <tr>
            <th>Room</th>
            <td>{{ $owner->room}}</td>
          </tr>
          <tr>
            <th>Birth</th>
            <td>{{ $owner->birth }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection