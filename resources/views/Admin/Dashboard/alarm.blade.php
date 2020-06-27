                    <!-- ============================================================== -->
                    <!-- timeline  -->
                    <!-- ============================================================== -->
                
                    <span>*Hanya Menampilkan 10 Kejadian Terakhir</span>
                    <section class="cd-timeline js-cd-timeline">
                        <div class="cd-timeline__container" id="alarmReal">
                            <!-- cd-timeline__block -->
                            @foreach($alarm as $a)
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                    <img src="{{ asset('svg/alarm.svg') }}" alt="Movie" width="40px" height="40px">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Alarm</h3>
                                    <p>Alarm ON : {{ $a->time }}</p>
                                    @foreach($a->alert as $q)
                                    @if($q->time == $a->time)
                                    @if($q->status == "Hight presure")
                                            <p class="text-danger">{{ $q->status }}</p>
                                            @elseif($q->status == "Low presure")
                                            <p class="text-primary">{{ $q->status }}</p>
                                        @endif
                                        
                                        <p>Keterangan : {{ $q->keterangan }} </p>
                                    @endif
                                    @endforeach
                                    <span class="cd-timeline__date">{{ $a->date }}</span>
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- cd-timeline -->
               
                  <!-- ============================================================== -->
                    <!-- end timeline  -->
                    <!-- ============================================================== -->