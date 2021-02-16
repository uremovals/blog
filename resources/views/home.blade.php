@extends('layouts.home')

@section('content')

<div class="container">
    Toy: 1 - Ele: 2 - Boo: 3 - Fas: 4 - Mov: 5 - Car: 6 - Foo: 7 - Hom: 8 - Spo: 9 - Hea: 10 - ind: 11

<div class="row">

<div class="m-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#catModal">Add</button>
</div>

<div class="row">
@foreach ($data as $d)
<div class="col-1 mt-2">
<input class="form-control" value="{{ $d->parent_id}}">
</div>
<div class="col-11 mt-2">
<input class="form-control" value="{{ $d->category_name }}">
</div>
@endforeach
</div>
</div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="catModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="catModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="catForm">
                @csrf
                <div class="form-group">
                  <label for="category_name">Category name</label>
                  <input type="text" name="categoryname" class="form-control homeinput" value=""/>
                  <script>
                    $(document).ready(function () {
                        $("input[type=text]").keyup(function () {
                            $(this).val($(this).val().toLowerCase());
                        });
                    });
                </script>
              </div>
              <div class="form-group">
                  <label for="parent_id">Parent id</label>
                  <input type="text" name="parent_id" class="form-control"/>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script>

$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

      $('#catForm').submit(function(e) {
          e.preventDefault();
          var categoryname = $("input[name=categoryname]").val();
          var parent_id = $("input[name=parent_id]").val();

          $.ajax({
              type: 'POST',
              url: '/home/update',
              data:{
                  "category_name" : categoryname,
                  "parent_id" : parent_id
              },
              success:function(response){
                  console.log(response)
                  $('#catModal').modal('toggle');
              }
          });
      })
    </script>

@endsection
