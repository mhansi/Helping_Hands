@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            <div class="profile">
                <div>
                    <img src="../images/Land2.jpg !important" class="img" alt="...">
                </div>
                <div>
                    <h4>My name</h4>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card" style="width: 18rem;">
                <img src="url('../images/Land2.jpg') !important" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- <div class="card">
             

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                  

                </div> -->
            <form>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Write your post here"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control-file" type="file">
                </div>
                <div class="form-group">
                    <label>Type:</label>
                    <select>
                        <option value="getHelp">Get help</option>
                        <option value="doHelp">Do help</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category:</label>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Kidney</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Blood</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Eyes</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>



            </form>



        </div>
    </div>
</div>

</div>

@endsection