
<header class='menu d-flex justify-content-between'>
      <div class="logo">
         <a href="{{ route('home') }}"><img src="{{settings('logo')}}" alt="website name" /></a>
      </div>
      <div class="date">
          <div class="ico ">
              <img src="{{ asset('images/web/date.png') }}" alt="today date" />
          </div>
          <div class="date-show">
              <div class="hdate"></div>
              <div class="mdate"></div>
          </div>
      </div>
      <div class="sm-menu-ico d-flex align-items-center" >
          <i class="fas fa-bars mni"></i>
          <i class="fas fa-times close" style="display: none;"></i>
      </div>
</header>

