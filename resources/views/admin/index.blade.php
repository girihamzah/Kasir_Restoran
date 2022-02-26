@extends('layouts.app', ['titlePage' => 'User', 'activePage' => 'user-admin'])

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">User table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <div class="text-end px-4">
                <a href={{ route('admin.user.create') }}><button class="btn btn-primary text-uppercase" type="button">Create</button></a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td class="text-capitalize">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->username }}</td>
                    <td class="text-center">{{ $user->pass }}</td>
                    <td class="text-center">{{ $user->role }}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.user.destroy',$user->username) }}" method="POST">

                          <a class="btn btn-primary" href="{{ route('admin.user.edit',$user->username) }}">Edit</a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <div class="text-center">
                  {{-- {!! $users->link() !!} --}}
                </div>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection