@extends ('layout.app-login')
@section('title', 'Registrer')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    
    <div class="row">
      <div class="col-lg">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
          </div>
          @if(session('gagal'))
              <div class="alert alert-danger" role="alert">
                {{session('gagal')}}
              </div>
              @endif
          @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form class="user" method="POST" action="{{ url('register')}}">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control form-control-user {{$errors->has('name') ? 'is-invalid': ''}}" id="name" name="name" placeholder="Full Name" value="{{ old ('name')}}">
              @if($errors->has('name'))
                     <div class="invalid-feedback">{{$errors->first('name')}}</div>
              @endif

            </div>
            <div class="form-group">
              <input type="email" class="form-control form-control-user {{$errors->has('email1') ? 'is-invalid': ''}}" id="email1" name="email1" placeholder="Email Address" value="{{ old ('email1')}}">
              @if($errors->has('email1'))
                     <div class="invalid-feedback">{{$errors->first('email1')}}</div>
              @endif
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user {{$errors->has('pass') ? 'is-invalid': ''}}" id="pass" name="pass" placeholder="Password">
                @if($errors->has('pass'))
                     <div class="invalid-feedback">{{$errors->first('pass')}}</div>
                @endif
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user {{$errors->has('konPass') ? 'is-invalid': ''}}" id="konPass" name="konPass" placeholder="Repeat Password">
                @if($errors->has('konPass'))
                     <div class="invalid-feedback">{{$errors->first('konPass')}}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
            @if (session('login'))
              @if(Auth::guard('admin')->check() && !Auth::guard('user')->check())
               <input type="text" class="form-control form-control-user" id="level" name="level" placeholder="Role Login" value="Admin" readonly>
  
              @elseif(Auth::guard('user')->check() && !Auth::guard('admin')->check())
              <input type="text" class="form-control form-control-user" id="level" name="level" placeholder="Role Login" value="User" readonly>
              @endif 
            @elseif(!session('login'))
              <input type="text" class="form-control form-control-user" id="level" name="level" placeholder="Role Login" value="User" readonly>
            @endif
              
              
              <!-- <select name="level" id="level" class="form-control form-control-user">
                <option value="">Pilih Level</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </div> -->
            <button type="submit" class="btn btn-primary btn-user btn-block">
            Register Account
            </button>
            <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
              <i class="fab fa-google fa-fw"></i> Register with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
          </div>
          <div class="text-center">
            <a class="small" href="{{ route('login')}}">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection