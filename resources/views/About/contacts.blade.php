@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Contact information</h2>                 
                </div>
                <div class="card-body">                     
                    <div class="row">                        
                        <div class="col-sm">  
                            <strong>Working hours (Product pickup)</strong><br>                              
                            <div class="row">
                                <div class="col-sm">
                                    Mondays - Friday<br>
                                    Saturdays<br>
                                    Sundays<br>
                                </div>
                                <div class="col-sm">
                                    <strong>09:00 - 20:00</strong><br>
                                    <strong>10:00 - 15:00</strong><br>
                                    <strong>Closed</strong><br>
                                </div>
                            </div>    
                         </div>                   
                        <div class="col-sm">
                            <strong>Contacts</strong><br>
                            <strong>Address: </strong>
                                Streen name 2000, Rīga, LV-1004                                
                            <div class="row">
                                <div class="col-sm">
                                    <strong>Phone nr: </strong><br>
                                     +371 22847736
                                </div>
                                <div class="col-sm">
                                    <strong>E-mail</strong><br>
                                    info@iveikals.com
                                </div>
                            </div>
                        </div>
                    </div>                             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
