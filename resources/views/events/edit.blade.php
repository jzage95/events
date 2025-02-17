@extends('layouts/main')

@section('title', 'Editando: '. $event->title) 

@section('content')

    <div class="container d-flex justify-content-center align-items-center"
        style="min-width: 200vh; margin-top: -100px; margin-bottom: 10px;">
        <div id="event-create-container" class="col-md-6">
            <h1>Crie o seu evento</h1>
            <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image">Imagem do Evento:</label>
                    <input type="file" id="image" name="image" class="form control-file">
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
                </div>
                <div class="form-group">
                    <label for="title">Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
                </div>

                <div class="form-group">
                    <label for="date">Data do evento:</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $event->getFormattedDate() }}">
                </div>
                
                <div class="form-group">
                    <label for="title">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}">
                </div>
                <div class="form-group">
                    <label for="title">O evento é privado?</label>
                    <select class="form-control" id="private" name="private">
                        <option value="0">Não</option>
                        <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="title">Adicione itens de infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Open Food"> Open food
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Brindes"> Brindes
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg mt-3" value="Editar Evento">
            </form>
        </div>
    </div>

@endsection
