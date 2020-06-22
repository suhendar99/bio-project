<div class="row">
    @foreach($ruangan as $r)
    <div class="col-md-4"  style="width:20rem;">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-white">
                {{ $r->nama }}
            </div>            
            <div class="card-body bg-dark text-white rounded">
                {{ $s->monitoring->tekanan }} 
            </div>            
            <div class="d-flex justify-content-center bg-dark">
            </div>
        </div>
    </div>
 @endforeach
</div>