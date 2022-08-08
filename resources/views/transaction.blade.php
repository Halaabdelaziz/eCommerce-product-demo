<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<div class="container">
    <div class="row">
        @foreach($res as $key => $valu)
   
            <div class="col-md-4 p-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img class="w-25" src="{{$valu['logoURL']}}">
                        <h5 class="card-title">{{$valu['gateway']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$valu['name_en']}}</h6>
                        <p class="card-text">{{$valu['name_ar']}}</p>
                        <form action="{{ route('pay',['gateway' =>$valu['gateway']])}}" method="post">
                            @csrf
                            <input type="hidden" name="refid" value='{{$refid}}'>
                            <input type="hidden" name="subPaymentId" @isset($valu['subPaymentId']) value='{{$valu["subPaymentId"]}}' @endisset>
                            <button type="submit" class="btn btn-info text-light">initiatePayment</button>
                        </form>
                    </div>
                </div>
            </div>
           
        @endforeach
    </div>
</div>