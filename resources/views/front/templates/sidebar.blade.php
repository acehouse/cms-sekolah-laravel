<div class="col-md-3">
    <aside class="sidebar">
        <h4 class="center">KEPALA SEKOLAH SMAN1</h4>
        <p class="center">
            <img class="center" src="http://localhost/smanjo/system/application/views/main-web/images/kepala-sekolah.jpg">
            <br>
            Drs. Istu Handono
            <br>
            NIP. 19641229198903 1 011 
        </p>
        <hr>
        @if (!is_null($polling))
        <h4>Polling</h4>
        <p>{{$polling->soal_poll}} <br /></p>
        @if(Request::cookie('polling') != 'sudah')
        <form action="{{url('tambahpoll')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="id_soal_poll" value="{{ $polling->id_soal_poll}}">
            @foreach($polling->jawaban as $jawaban)

            <div class="radio">
                <label>
                    <input type="radio" name="jawaban" id="optionsRadios1" value="{{$jawaban->jawaban}}" required>
                    {{$jawaban->jawaban}}
                </label>
            </div>
            @endforeach
            <div class="form-group center">
                <button class="btn btn-default btn-squared" type="submit"> Pilih </button>
                <a class="btn btn-warning btn-squared" type="button" href="{{url('lihatpoll')}}"> Lihat Polling </a>
            </div>
        </form>
        @else
        <p>
        <a class="btn btn-warning btn-squared" type="button" href="{{url('lihatpoll')}}"> Lihat Polling </a>
        </p>
        @endif

        @endif
        <div class="tabs">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#popularPosts"> Pengumuman</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#recentPosts">
                        Agenda Sekolah
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="popularPosts" class="tab-pane active">
                    <ul class="post-list">
                        @foreach($pengumuman as $umum)
                        <li>
                            <div class="post-info">
                                <a href="{{url('pengumuman',$umum->id_pengumuman)}}">
                                    {{$umum->judul_pengumuman}}
                                </a>
                                <div class="post-meta">
                                    {{date('d F Y',strtotime($umum->tanggal))}};
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{url('pengumuman')}}" class="btn btn-blue btn-block">
                        Lihat Semua Pengumuman <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div id="recentPosts" class="tab-pane">
                    <ul class="post-list">
                        @foreach($agenda as $ag)
                        <li>
                            <div class="post-info">
                                <a href="#">
                                    {{$ag->tema_agenda}}
                                </a>
                                <div class="post-meta">
                                    {{date('d F Y',strtotime($ag->tgl_posting))}};
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{url('agenda')}}" class="btn btn-blue btn-block">
                        Lihat Semua Agenda <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    </aside>
</div>