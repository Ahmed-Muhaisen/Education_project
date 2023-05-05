

<style>

    * {
        font-family: 'frutiger';

    }

    .barcode {
        padding: 2.5mm;
        margin: 0;
        vertical-align: top;
        color: #000;
    }

    .barcodecell {
        float: right;
        text-align: center;
        vertical-align: middle;
    }
.certificate-content *{
    padding:10px 0;

}


</style>
<div style="position: relative; margin-top: 0">
<img style=" width: 100%; "src="{{ asset('certificate.PNG') }} ">
</div>
<div class="certificate-content" style="margin:auto; position: absolute; top: 30%;   width: 100%; ">
    <div style="text-align: center;">
        <h5 style="font-size: 30px;color: #5b5b5b;margin: 0;padding: 5px 70px 120px 70px;">
{{ $Course->L_Name }}     </h5>
        <h3 style="font-size: 30px;color: #5b5b5b;">
           {{ $user->name }}    </h3>
        <p style="margin-bottom: 5px;margin-top: 50px;font-size: 16px;font-weight: 300;color: #707070;">has successfully
            completed {{$sum_time}} contact video in Education Center
        </p>


    </div>

</div>
<div style="position: absolute; top:80%; left: 10%;">
<img width="100" height="100" src="{{ $Course->image }}" alt="">
</div>

<div style="position: absolute; top:80%; right: 20%;">
    <barcode code="{{ $qrcode }}" type="QR" class="barcode" size="0.9" error="L"
    disableborder="I" />
    </div>


