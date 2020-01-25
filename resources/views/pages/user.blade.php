@extends ('layout.app')
@section('title', 'Dashboard page')
@section('content')
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
      	<h1>ini page user</h1>
      	<h2>halo {{ Auth::guard('user')->user()->name }}</h2>
    </div>
</div>


@endsection