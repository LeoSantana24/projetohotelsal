<section class="section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
        <p data-aos="fade-up" data-aos-delay="100">
          Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
          Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
        </p>
      </div>
    </div>

    <div class="row">
      @foreach($room as $rooms)
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="#" class="room">
            <figure class="img-wrap">
              <img src="room/{{$rooms->image}}" alt="Room Image" class="img-fluid mb-3" style="height: 200px; width: 100%; object-fit: cover; border-radius: 10px;">
            </figure>
            <div class="p-3 text-center room-info">
              <h2 style="font-size:26px;">{{$rooms->room_title}}</h2>
              <span class="text-uppercase letter-spacing-1">{{$rooms->price}}€ / Per night</span>
              <p style="color:black; font-size: 18px; padding:10px;">{!! Str::limit($rooms->description, 100) !!}</p>

              <a class="btn btn-primary me-2" href="
              {{url('room_details' ,$rooms->id)}}">Detalhes Quarto</a>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

    