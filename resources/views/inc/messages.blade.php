@if (count($errors) > 0)
<div class="alert alert-danger border-0 alert-dismissible">
  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
  <p><span class="font-weight-semibold">Error:</span> Revisa los siguientes errores</p>
  <p>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
  </p>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success border-0 alert-dismissible">
  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
<p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger border-0 alert-dismissible">
  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
<p>{{ $message }}</p>
</div>
@endif
