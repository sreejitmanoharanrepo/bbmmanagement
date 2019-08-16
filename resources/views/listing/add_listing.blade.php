@extends('layouts.master')

@section('content')
<section class="content">
<div class="row">
<div class="col-sm-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Listing Details</h3>
        </div>
    
   
        <div class="container">
            <div class="card-body">           
                <div class="row">
                    <div class="col-sm-1">
                        <label for="title" class="form-label">Title</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-1">
                        <label for="subtitle" class="form-label">Subtitle</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                    </div>
                </div>    
                <br>
                 <div class="row">
                    <div class="col-sm-1">
                        <label for="subtitle" class="form-label">category</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                    </div>
                </div>  
                <br>
                 <div class="row">
                    <div class="col-sm-1">
                        <label for="subtitle" class="form-label">Condition</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                    </div>
                </div>  
                <br>
                 <div class="row">
                    <div class="col-sm-1">
                        <label for="subtitle" class="form-label">Style Metal</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                    </div>
                </div>  
                <br>
                 <div class="row">
                    <div class="col-sm-1">
                        <label for="subtitle" class="form-label">Main stone</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                    </div>
                    <br>
                </div>         
            </div>
        </div>
    </div>

    
</div>
</div>
</section>
@endsection