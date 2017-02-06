@extends('main')

@section('title', 'Contact')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Contact Me</h2>
            <hr>
            <form >
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input type="text"  name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label name="Message">Message:</label>
                    <textarea type="textbox" name="Message" id="Message" class="form-control"></textarea> 
                </div>
                <input type="submit" name="" value="Submit" class="btn btn-success">
            </form>
         </div>
     </div>
 @endsection