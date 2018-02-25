@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Internet-klientu reģistrācijas un apkalpošanas sistēma. Internet-lielveikals atļauj veikt pirkumus ar piegādi uz mājām. Veikala klientiem tiek nodrošināta pieeja pārdodamo   preču katalogam. Katalogā preces ir sadalītas pēc nodalījumiem. Par katru preci ir pieejama pilna informācija (nosaukums, svars, cena, attēls, izgatavošanas datums un derīguma termiņš). Klientu ērtībai ir paredzēta sistēma preču meklēšanai katalogā. Līdz ar informāciju par precēm, klientiem arī ir jāsaņem informāciju par pirkumu apmaksāšanas un  piegādāšanas nosacījumiem. Kad klienti izvēlas preces, ir jātiek atbalstītiem virtuāliem „tirdzniecības ratiņiem”. Jebkurš preces nosaukums var tikt pievienots „ratiņos” vai atsavināts jebkura momenta pēc pircēja vēlēšanas, ar sekojošo kopīgas pirkuma vērtības pārrēķināšanu. Ir arī nepieciešams, lai tekošais ratiņu saturs pastāvīgi tiktu attēlots uz klienta ekrāna. Pēc izvēles beigas tiek veikta pasūtījuma noformēšana un pircēja reģistrācija. Pasūtījumi tiek nodoti apstrādāšanai tirdzniecības automatizācijas sistēmā. Preču atrašanas noliktavā pārbaudīšanu un to rezervēšanu Internet-veikals neveic. 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
