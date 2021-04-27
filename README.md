<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/logovermelha.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorias
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ação</a>
                <a class="dropdown-item" href="#">Aventura</a>
                <a class="dropdown-item" href="#">Comédia</a>
                <a class="dropdown-item" href="#">Fantasia</a>
                <a class="dropdown-item" href="#">Romance</a>
                <a class="dropdown-item" href="#">Drama</a>
                <a class="dropdown-item" href="#">Terror</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Serie
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Ação</a>
                  <a class="dropdown-item" href="#">Aventura</a>
                  <a class="dropdown-item" href="#">Comédia</a>
                  <a class="dropdown-item" href="#">Fantasia</a>
                  <a class="dropdown-item" href="#">Romance</a>
                  <a class="dropdown-item" href="#">Drama</a>
                  <a class="dropdown-item" href="#">Terror</a>
                  </div>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Destaque</a>
              </li>
          </ul>

              <ul class="navbar-nav ml-auto">
                <form class="form-inline my-3 my-lg-3" id="frm-search">
                    <div class="col-auto ">
                         <div class="input-group mb-0" >
                         <div class="input-group-prepend" onclick="alert('Sem acesso as pesquisas no momento')">
                          <i class="fas fa-search btn btn-dark"></i>
                         </div>
                         <input type="text" class="form-control btn btn-dark" id="inlineFormInputGroup" placeholder="O que quer assitir agora?....">
                       </div>

                     </div>
                   </form>
                  <button class="btn btn-outline-danger btn-lg mt-3 mr-3" title="Adicionar Video"  data-toggle="modal" data-target="#mdAddVideo">
                    <i class="fas fa-cloud-upload-alt"></i>
                  </button>

                <button class="btn btn-outline-secondary btn-sm mt-3 mr-2" type="submit" >
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Sair da Conta') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </button>
            </ul>
          </form>
        </div>
      </nav>
<!--fim da nav bar -->

<span class="small-text text-light "  >vejas nossos filmes de:
    @foreach ($categories as $category )
    <a href="" class="text-light">{{$category->name}}</a>&nbsp;

    @endforeach
</span>
</span> <br/><br/><br/><br/>


<h3>ADICIONADO RECENTEMENTE</h3>
<div class="row align-self-center mb-5 d-flex">
    @foreach (range(1,5) as $item)
       <div class="col-md-2 p-5 m-1 bg-white my-2"> >
           <img src="{{asset('images/player.png')}}" class="img-responsive" >
       </div>
    @endforeach
</div>
<h3>SUA LISTA</h3>
<div class="row align-self-center mb-5 d-flex ">
    @foreach (range(1,5) as $item )
       <div class="col-md-2 p-5 m-1 bg-white my-2 " >
           <img src="{{asset('images/player.png')}}" class="img-responsive video-image">
       </div>
    @endforeach
</div>
<h3>DESTAQUE</h3>
<div class="row align-self-center mb-5 d-flex ">
    @foreach ($featureds as $item )
       <div class="col-md-2 p-5 m-1 bg-white my-3">
           <img src="{{$item->image}}" class="img-responsive video-image" title="{{$item->title}}">
       </div>
    @endforeach
</div>


<!-- Modal adicionar video -->
<div class="modal fade" id="mdAddVideo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header btn-dark">
          <h5 class="modal-title" id="TituloModalLongoExemplo">Adicionar videos</h5>
          </div>
        <div class="modal-body">
            <form method="post" action="{{action('VideosController@store')}}">
                @csrf
                <form>
  <div class="form-group">
    <label >video</label>
    <input type="text" name="url" class="form-control" placeholder="https://www.youtube.com/watch?########" required>
    <small  class="form-text text-muted">Adicione seu video do youtube para teste</small>
  </div>
  <div class="form-group">
    <label>Titulo</label>
    <input type="text" name="title" class="form-control" placeholder="Nome do video" required>
  </div>
  <div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" name="description" id="" cols="10" rows="5" placeholder="Fale um pouco sobre o video...." required></textarea>
  </div>
  <div class="form-group">
    <label>Categorias</label>
   <select name="category"class="form-control" required>
       <{{-- option >Selecione a categoria</option> --}}
       <option value="">Selecione a categoria</option>
    @foreach ( \App\Category::all() as $categories)
    <option value="{{ $categories->id}}" >{{ $categories->name}}</option>
    @endforeach
   </select>
  </div>
  <div class="form-group">

    <input type="file" name="image" required/>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="featured" class="form-check-input" required>
    <label class="form-check-label">Destaque?</label>
  </div>
<div class="button" style="text-align: right">
  <button type="submit" class="btn btn-outline-danger">salvar</button>
  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
</div>
  </form>

        </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </body>
</html>
