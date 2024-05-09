@extends('template.main')
@section('title', 'Add Appoinment')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('title')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/barang">Appoinment</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <a href="/barang" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>
            <form class="needs-validation" novalidate action="/barang" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name " value="{{old('name')}}" required>
                      @error('name')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
				  
				  
				  
			   <div class="col-lg-6">
                    <div class="form-group">
                      <label for="category">Health Care Professional</label>
					  <select name='healthcare_professional_id' required class="form-control ">
					   @foreach ($professional as $data)
					   <option value='{{ $data->id_user }}'>{{ $data->name }} ( {{ $data->specialities }} ) </option>
					     @endforeach
					  </select>
                    
                    </div>
                  </div>	  
				  
				  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="category">Appoinment Start  Time</label>
                      <input type="datetime-local" name="appointment_start_time" class="form-control @error('appointment_start_time') is-invalid @enderror" id="appointment_start_time" placeholder="Date Start Time" value="{{old('appointment_start_time')}}" required>
                      @error('appointment_start_time')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
				  <input type='hidden' name='user_id' value="{{ $uid }}">
			    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="category">Appoinment End  Time</label>
                      <input type="datetime-local" name="appointment_end_time" class="form-control @error('appointment_end_time') is-invalid @enderror" id="appointment_end_time" placeholder="Date End Time" value="{{old('appointment_end_time')}}" required>
                      @error('appointment_end_time')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
					  
				  
                </div>
                <div class="row">
                 
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="note">Note</label>
                      <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" cols="10" rows="5" placeholder="note">{{old('note')}}</textarea>
                      @error('note')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                  Reset</button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                  Save</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>

@endsection