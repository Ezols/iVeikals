@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Please fill in order details</h2>
                </div>

                <div class="card-body">
                  <form action="{{ route('order.submit') }}" method='post'>
                  {{ csrf_field()}}

                    @include('partials.inputs.text', ['name' => 'name', 'label' => 'Name'])
                    @include('partials.inputs.text', ['name' => 'surname', 'label' => 'Surname'])
                    @include('partials.inputs.text', ['name' => 'city', 'label' => 'City'])
                    @include('partials.inputs.text', ['name' => 'postalCode', 'label' => 'Postal code'])
                    @include('partials.inputs.text', ['name' => 'address', 'label' => 'Streeet address'])
                    @include('partials.inputs.text', ['name' => 'homeNumber', 'label' => 'Home number'])
                    @include('partials.inputs.number', ['name' => 'phoneNumber', 'label' => 'Phone number'])


                <div class="form-check">
                    <input type="checkbox" class="form-check-input form-check-inline" id="shop">
                    <label class="form-check-label">Pick up from shop</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="home" value="home" onclick="hideCheckboxes()">
                    <label class="form-check-label" for="inlineCheckbox1">Deliver to home</label>
                </div>

                    <div id="hideCheckboxes">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cash" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">By cash</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="creditCard" value="option3">
                            <label class="form-check-label" for="inlineCheckbox3">Credit card</label>
                        </div>
                    </div>

                    <script>
                            function hideCheckboxes() 
                            {
                                var checkBox = document.getElementById("home");
                                var text = document.getElementById("hideCheckboxes");
                                
                                if (checkBox.checked == true)
                                {
                                    text.style.display = "block";
                                } 
                                else 
                                {
                                    text.style.display = "none";
                                }
                            }

                    hideCheckboxes()
                            
                    </script>
                    

                  <div class="col-xs-12"><hr></div>     
                  <button class="btn btn-outline-success my-2 my-sm-0 float-center" type="submit" name="submit">
                    Accept Order
                  </button>
                  </form>
                </div>           
            </div>
        </div>
    </div>
</div>   

     
@endsection



