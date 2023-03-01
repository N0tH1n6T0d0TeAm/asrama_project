@extends('navbar')
@section('konten')

<style>
   .card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.card {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 30px;
  max-width: 500px;
}
.kelas_10{
  background: #bc7575;
}
.kelas_11{
  background: #877373bf;
}
.kelas_12{
  background: #de0f0fb0;
}

.card-link {
  color: #333;
  text-decoration: none;
  display: block;
}

.card-link:hover {
  color: #000;
  text-decoration: underline;
}

.card-title {
  font-size: 30px;
  margin-top: 0;
}

.card-description {
  font-size: 14px;
  margin-bottom: 0;
}


</style>

<div class="card-container">
  <div class="card kelas_10">
    <a href="/kelas_10" rel="nofollow" class="card-link">
      <h3 class="card-title">Kelas 10</h3>
      <p class="card-description">Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </a>
  </div>
  <div class="card kelas_11">
    <a href="/kelas_11" rel="nofollow" class="card-link">
      <h3 class="card-title">Kelas 11</h3>
      <p class="card-description">Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </a>
  </div>
  <div class="card kelas_12">
    <a href="/kelas_12" rel="nofollow" class="card-link">
      <h3 class="card-title">Kelas 12</h3>
      <p class="card-description">Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </a>
  </div>
</div>


@endsection