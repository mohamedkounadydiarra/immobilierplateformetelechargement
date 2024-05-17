@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="card">
    <div class="card-body wizard-content">
      <h4 class="card-title">Ajouter un article</h4>
      <br>
      <a href="{{ route('article.index') }}"><input type="submit" class="btn btn-info" value="Liste"></a><br><br>
      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <form id="example-form" action="{{route('article.store')}}" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
          <section class="row">
            <div class="col-md-4">
              <label for="">Titre *</label>
              <input id="" name="title" type="text" class="required form-control" />
              @error('title')
              <p style="color:red;">{{ $message }}</p>
              @enderror
            </div>


            <div class="col-md-4">
              <label for="">Description *</label>
              <textarea name="description"  cols="30" rows="1" class="required form-control"></textarea>
              @error('description')
              <p style="color:red;">{{ $message }}</p>
              @enderror
            </div>


            <div class="col-md-4">
              <label for="">Video</label>
              <input  name="video" type="file" class="required form-control" />
              @error('video')
              <p style="color:red;">{{ $message }}</p>
              @enderror
            </div>


            <div class="col-md-4">
                <label for="">Couverture *</label>
                <input  name="image" type="file" class="required form-control" />
                @error('image')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="password">Status *</label>
                <select name="status" class="form-control">
                    <option value="0" selected disabled>selectionner</option>
                    <option value="Gratuit">Gratuit</option>
                    <option value="Premium">Premium</option>
                </select>
                @error('status')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

          
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Enregistrer">
            </div>

          </section>
        </div>
      </form>
    </div>
  </div>

@endsection
